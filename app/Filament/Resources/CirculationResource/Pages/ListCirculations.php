<?php

namespace App\Filament\Resources\CirculationResource\Pages;

use App\Filament\Resources\CirculationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;


class ListCirculations extends ListRecords
{
    protected static string $resource = CirculationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'new' => Tab::make()->query(fn ($query) => $query->where('status', 'new')),
            'reserved' => Tab::make()->query(fn ($query) => $query->where('status', 'reserved')),
            'extended' => Tab::make()->query(fn ($query) => $query->where('status', 'extended')),
            'returned' => Tab::make()->query(fn ($query) => $query->where('status', 'returned')),
            'cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled')),
        ];
    }
}
