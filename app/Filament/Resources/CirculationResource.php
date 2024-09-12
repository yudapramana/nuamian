<?php

namespace App\Filament\Resources;

use App\Enums\CirculationStatus;
use App\Filament\Resources\CirculationResource\Pages;
use App\Filament\Resources\CirculationResource\RelationManagers;
use App\Models\Book;
use App\Models\Circulation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Enums\FontWeight;


class CirculationResource extends Resource
{
    protected static ?string $model = Circulation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                            ->schema(static::getDetailsFormSchema())
                            ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                // Tables\Columns\Layout\Split::make([
                //     # Stack 1
                //     Tables\Columns\Layout\Stack::make([
                //         Tables\Columns\TextColumn::make('number')
                //             ->searchable()
                //             ->sortable()
                //             ->alignCenter()->grow(false),
                //     ])->alignment('center'),

                //     # Stack 2
                //     Tables\Columns\Layout\Stack::make([
                //         Tables\Columns\TextColumn::make('status')
                //             ->badge()->alignCenter()->grow(false),
                //     ])->alignment('center'),

                //     # Stack 3
                //     Tables\Columns\Layout\Stack::make([
                //         Tables\Columns\TextColumn::make('member.user.name')
                //             ->label('Member Name')
                //             ->searchable()
                //             ->sortable()
                //             ->weight(FontWeight::Bold)->grow(false)
                //             ->toggleable(),
                //         Tables\Columns\TextColumn::make('member.user.email')
                //             ->label('Member Email')
                //             ->searchable()
                //             ->sortable()
                //             ->color('gray')->grow(false)
                //             ->toggleable(),
                //     ]),

                //     # Stack 4
                //     Tables\Columns\Layout\Stack::make([
                //         Tables\Columns\TextColumn::make('book.title')
                //             ->label('Title')
                //             ->weight(FontWeight::Bold)->grow(false)
                //             ->searchable(),

                //         Tables\Columns\TextColumn::make('book.author.name')
                //             ->label('Author')
                //             ->searchable()
                //             ->icon('heroicon-o-user-circle')
                //             ->color('gray')->grow(false)
                //             ->alignLeft(),

                //         Tables\Columns\TextColumn::make('book.category.name')
                //             ->label('Category')
                //             ->searchable()
                //             ->icon('heroicon-o-bookmark')
                //             ->color('gray')->grow(false)
                //             ->alignLeft(),

                //         Tables\Columns\TextColumn::make('book.publication_year')
                //             ->label('Year')
                //             ->color('gray')->grow(false)
                //             ->icon('heroicon-o-calendar')
                //             ->searchable(),
                //     ]),

                //     # Stack 5
                //     Tables\Columns\Layout\Stack::make([
                //         Tables\Columns\TextColumn::make('reserve_date')
                //             ->label('Order Date')
                //             ->date()->grow(false)
                //             ->toggleable(),

                //         Tables\Columns\TextColumn::make('due_date')
                //             ->label('Due Date')
                //             ->date()->grow(false)
                //             ->toggleable(),

                //         Tables\Columns\TextColumn::make('return_date')
                //             ->label('Return Date')
                //             ->date()->grow(false)
                //             ->toggleable(),
                //     ]),

                    

                    

                    
                // ])->from('md'),

                Tables\Columns\TextColumn::make('number')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)->grow(false),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('member.user.name')
                    ->label('Member Name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('book.title')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('reserve_date')
                    ->label('Reserve Date')
                    ->date()->grow(false)
                    ->toggleable()
                    ->placeholder('No data.'),
                Tables\Columns\TextColumn::make('due_date')
                    ->label('Due Date')
                    ->date()->grow(false)
                    ->toggleable()
                    ->placeholder('No data.'),
                Tables\Columns\TextColumn::make('return_date')
                    ->label('Return Date')
                    ->date()->grow(false)
                    ->toggleable()
                    ->placeholder('No data.'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            RelationManagers\ProcedureRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCirculations::route('/'),
            'create' => Pages\CreateCirculation::route('/create'),
            'edit' => Pages\EditCirculation::route('/{record}/edit'),
        ];
    }

    /** @return Forms\Components\Component[] */
    public static function getDetailsFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('number')
                ->default('CI-' . random_int(100000, 999999))
                ->disabled()
                ->dehydrated()
                ->required()
                ->maxLength(32)->disabledOn('edit')
                ->unique(Circulation::class, 'number', ignoreRecord: true),

            Forms\Components\Select::make('member_id')
                ->relationship(
                    'member', 
                    'username',
                    fn (Builder $query) => $query->where('is_active', true),
                )
                ->searchable()
                ->preload()->disabledOn('edit')
                ->required(),

            Forms\Components\Select::make('book_id')
                ->relationship(
                    'book', 
                    'title',
                    fn (Builder $query) => $query->where('status', 'in_stock'),
                )
                ->searchable()
                ->required()->disabledOn('edit')
                ->columnSpanFull()
                ->getOptionLabelFromRecordUsing(fn (Book $record) => "{$record->title} - {$record->author->name} - ({$record->publication_year}) ") ,

            Forms\Components\ToggleButtons::make('status')
                ->inline()->disabledOn('edit')
                ->options(CirculationStatus::class)
                ->required()
                ->visibleOn('edit'),

            Forms\Components\MarkdownEditor::make('notes')->placeholder('Fill the Note.')
                ->columnSpan('full')->disabledOn('edit'),
        ];
    }
}
