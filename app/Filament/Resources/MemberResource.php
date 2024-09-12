<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

use Filament\Notifications\Notification;


class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $slug = 'manajemen/members';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('username'),
                Forms\Components\Select::make('gender')
                ->options([
                    'male' => 'Laki-laki',
                    'female' => 'Perempuan',
                ]),
                Forms\Components\DatePicker::make('date_of_birth')
                ->required()
                ->maxDate(now()),
                Forms\Components\TextArea::make('address'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->searchable(),
                Tables\Columns\TextColumn::make('number')->searchable(),
                Tables\Columns\TextColumn::make('username')->searchable(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('date_of_birth'),
                Tables\Columns\TextColumn::make('address'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('accept')
                    // ->url(fn (Member $record): string => route('member.accept', $record))
                    ->action(function (Member $record, array $data): void {
                        $record->update([
                            'is_active' => 1,
                            'assessor' => auth()->user()->name
                        ]);

                        $record->user()->update([
                            'role_id' => 5
                        ]);

                        Notification::make()
                            ->success()
                            ->title($record->user->name . ' has become a Member!')
                            ->send();
                    })
                    ->color('danger')
                    ->icon('heroicon-s-check-badge')
                    ->visible(fn ($record) => !$record->is_active),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }

    
}
