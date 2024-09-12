<?php

namespace App\Filament\Resources\CirculationResource\RelationManagers;

use App\Enums\CirculationStatus;
use App\Enums\ProcedureStatus;
use App\Models\Procedure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Circulation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Enums\FontWeight;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;




class ProcedureRelationManager extends RelationManager
{
    protected static string $relationship = 'procedures';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options([
                        'reserved' => 'Reserved',
                        'extended' => 'Extended',
                        'returned' => 'Returned',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('circulation_id')
            ->columns([
                // Tables\Columns\TextColumn::make('circulation.number'),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'reserved' => 'info',
                        'extended' => 'warning',
                        'returned' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->icons([
                        'heroicon-m-arrow-right-start-on-rectangle' => 'reserved',
                        'heroicon-m-sparkles' => 'extended',
                        'heroicon-m-inbox-arrow-down' => 'returned',
                        'heroicon-m-x-circle' => 'cancelled',
                    ]),
                    // ->weight(FontWeight::Bold)->grow(false),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'waiting' => 'gray',
                        'accepted' => 'success',
                        'rejected' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created Date')
                    ->date()->grow(false)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('confirm_date')
                    ->label('Confirm Date')
                    ->date()->grow(false)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->label('Due Date')
                    ->date()->grow(false)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('assessor')->grow(false),
                
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->createAnother(false),
                // ->hidden(fn (Circulation $record) => $record->status == 'returned')
                // ->recordSelectOptionsQuery(fn (Builder $query) => $query->where('status', '!=', 'returned')),
            ])
            ->actions([
                Action::make('accept')
                    ->action(function (Procedure $record, array $data): void {
                        $days = 0;
                        $now = Carbon::now();
                        $dueDateProcedure = null;
                        $type = $record->type;
                        switch ($type) {
                            case 'reserved':
                                $days = 3;
                                $dueDateProcedure = $now->addDays(3)->toDateString();
                                $record->circulation->book()->update([
                                    'status' => 'borrowed'
                                ]);
                                break;

                            case 'extended':
                                $days = 3;
                                $circ_dueDate = Carbon::createFromFormat('Y-m-d', $record->circulation->due_date);
                                $dueDateProcedure = $circ_dueDate->addDays(3)->toDateString();
                                break;

                            case 'returned':
                                $dueDateProcedure = $record->circulation->due_date;
                                $record->circulation->book()->update([
                                    'status' => 'in_stock'
                                ]);
                                break;
                        }

                        $record->update([
                            'status' => 'accepted',
                            'confirm_date' => $now->toDateString(),
                            'assessor' => auth()->user()->name,
                            'total_days' => $days,
                            'due_date' => $dueDateProcedure,
                        ]);

                        $reserve_date = ($record->type == 'reserved') ? Carbon::now()->toDateString() : $record->circulation->reserve_date;
                        $return_date = ($record->type == 'returned') ? Carbon::now()->toDateString() : $record->circulation->return_date;
                        $dueDate = ($record->type == 'reserved' || $record->type == 'extended' || $record->type == 'returned') ? $dueDateProcedure : $record->circulation->dueDate;
                        $record->circulation()->update([
                            'status' => $record->type,
                            'reserve_date' => $reserve_date,
                            'return_date' => $return_date,
                            'due_date' => $dueDate,
                        ]);

                        Notification::make()
                            ->success()
                            ->title('Circulation Procedure has accepted!')
                            ->send();
                    })
                    ->color('success')
                    ->icon('heroicon-s-check-badge')
                    ->visible(fn ($record) => $record->status == 'waiting'),
                Action::make('reject')
                    ->action(function (Procedure $record, array $data): void {
                        $record->update([
                            'status' => 'rejected',
                            'confirm_date' => Carbon::now()->toDateString(),
                            'assessor' => auth()->user()->name
                        ]);

                        $record->circulation()->update([
                            'status' => $record->type
                        ]);

                        Notification::make()
                            ->success()
                            ->title('Circulation Procedure has rejected!')
                            ->send();
                    })
                    ->color('danger')
                    ->icon('heroicon-s-x-mark')
                    ->visible(fn ($record) => $record->status == 'waiting'),
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

}
