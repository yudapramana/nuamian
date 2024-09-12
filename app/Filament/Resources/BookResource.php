<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\FontWeight;
use Joaopaulolndev\FilamentPdfViewer\Forms\Components\PdfViewerField;
use Joaopaulolndev\FilamentPdfViewer\Infolists\Components\PdfViewerEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;



class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $slug = 'journal/books';

    protected static ?string $navigationGroup = 'Journal';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('book_code')
                            ->required()
                            ->columnSpan('full'),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation !== 'create') {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            })
                            ->unique(Book::class, 'title', ignoreRecord: true),

                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\MarkdownEditor::make('description')
                            ->columnSpan('full'),

                        Forms\Components\TextInput::make('publication_year')
                            ->required(),

                        Forms\Components\TextInput::make('isbn')->label('ISBN'),
                        
                        Forms\Components\Toggle::make('is_visible')
                            ->label('Visible')
                            ->helperText('This product will be visible on Guests')
                            ->default(true),
                    ])
                    ->columns(2),

                    Forms\Components\Section::make('Metadata')
                    ->schema([
                        Forms\Components\Select::make('author_id')
                        ->relationship(name: 'author', titleAttribute: 'name')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                // ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                            Forms\Components\TextInput::make('email')->email(),
                        ]),

                        Forms\Components\Select::make('book_category_id')
                        ->relationship(name: 'category', titleAttribute: 'name')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                // ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        ]),

                        Forms\Components\Select::make('publisher_id')
                        ->relationship(name: 'publisher', titleAttribute: 'name')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                // ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                            Forms\Components\TextInput::make('email')->email(),
                        ]),
                    ])
                    ->columns(2),

                    Forms\Components\Section::make('Pdf File')
                    ->schema([
                        Forms\Components\FileUpload::make('book_source_url')
                            ->acceptedFileTypes(['application/pdf'])
                            ->preserveFilenames()
                            ->disk('public')
                            ->hiddenLabel(),

                        
                    ])
                    ->collapsible(),
                ])
                ->columnSpan(['lg' => 3]),

                // Forms\Components\Group::make()
                //     ->schema([
                //         PdfViewerField::make('book_source_url')
                //         ->label('View the PDF')
                //         ->minHeight('70svh')
                //     ])
                // ->columnSpan(['lg' => 3]),


            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('title')
                            ->label('Title')
                            ->weight(FontWeight::Bold)->grow(false)
                            ->searchable(),

                        Tables\Columns\TextColumn::make('author.name')
                            ->label('Author')
                            ->searchable()
                            ->icon('heroicon-o-user-circle')
                            ->color('gray')->grow(false)
                            ->alignLeft(),

                        Tables\Columns\TextColumn::make('category.name')
                            ->label('Category')
                            ->searchable()
                            ->icon('heroicon-o-bookmark')
                            ->color('gray')->grow(false)
                            ->alignLeft(),
                    ]),

                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('publisher.name')
                        ->label('Publisher')
                        ->color('gray')->grow(false)
                        ->searchable(),
                        Tables\Columns\TextColumn::make('isbn')
                            ->label('ISBN')
                            ->color('gray')->grow(false)
                            ->searchable(),
                        Tables\Columns\TextColumn::make('publication_year')
                            ->label('Year')
                            ->color('gray')->grow(false)
                            ->searchable(),

                       
                    ]),

                    
                ])->from('md'),

           

                


                
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('finalize')
                ->action(function (Book $record, array $data): void {
                    $record->status = 'in_stock';
                    $record->save();
                })
                ->color('success')
                ->icon('heroicon-s-check-badge')
                ->visible(fn ($record) => $record->status == 'draft'),
                
                Action::make('put_to_draft')
                ->action(function (Book $record, array $data): void {
                    $record->status = 'draft';
                    $record->save();
                })
                ->color('danger')
                ->icon('heroicon-s-x-mark')
                ->visible(fn ($record) => $record->status == 'in_stock'),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([

            Components\Section::make()
                    ->schema([
                        Components\Split::make([
                            Components\Grid::make(3)
                                ->schema([
                                    Components\Group::make([
                                        Components\TextEntry::make('title'),
                                        Components\TextEntry::make('book_code'),
                                        Components\TextEntry::make('created_at')
                                            ->badge()
                                            ->date()
                                            ->color('success'),

                                    ]),
                                    Components\Group::make([
                                        Components\TextEntry::make('author.name'),
                                        Components\TextEntry::make('category.name'),
                                        Components\TextEntry::make('publisher.name'),
                                    ]),

                                    Components\Group::make([
                                        Components\TextEntry::make('publication_year'),
                                        Components\TextEntry::make('isbn')->label('ISBN'),
                                    ]),
                                ]),
                        ])->from('lg'),
                    ]),
                Components\Section::make('Description')
                    ->schema([
                        Components\TextEntry::make('description')
                            ->prose()
                            ->markdown()
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),

            // \Filament\Infolists\Components\Section::make('Maindata')
            // ->collapsible()
            // ->schema([
            //     TextEntry::make('created_at')
            //     ->since()
            //     ->dateTimeTooltip(),
            //     TextEntry::make('title'),
            //     TextEntry::make('book_code'),
            //     TextEntry::make('description')->columnSpan(2),
            //     TextEntry::make('publication_year'),
            //     TextEntry::make('isbn'),
            // ]),
           
            // \Filament\Infolists\Components\Section::make('Metadata')
            // ->collapsible()
            // ->schema([
            //     TextEntry::make('author.name'),
            //     TextEntry::make('category.name'),
            //     TextEntry::make('publisher.name'),
            // ]),



            \Filament\Infolists\Components\Section::make('PDF Viewer')
            ->description('Prevent the PDF from being downloaded')
            ->collapsible()
            ->schema([
                PdfViewerEntry::make('book_source_url')
                    ->label('View the PDF')
                    ->minHeight('100svh')
                    ->columnSpanFull()
            ])
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
