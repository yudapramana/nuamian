<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use App\Models\Book;


class ListBooks extends ListRecords
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'draft' => Tab::make()->query(fn ($query) => $query->where('status', 'draft'))
                        ->badge(Book::query()->where('status', 'draft')->count())
                        ->icon('heroicon-m-sparkles'),
            'in_stock' => Tab::make()->query(fn ($query) => $query->where('status', 'in_stock'))
                        ->badge(Book::query()->where('status', 'in_stock')->count())
                        ->icon('heroicon-m-archive-box'),
            'borrowed' => Tab::make()->query(fn ($query) => $query->where('status', 'borrowed'))
                        ->badge(Book::query()->where('status', 'borrowed')->count())
                        ->icon('heroicon-m-hand-raised'),
        ];
    }
}
