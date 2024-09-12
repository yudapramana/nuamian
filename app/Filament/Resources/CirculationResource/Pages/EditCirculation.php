<?php

namespace App\Filament\Resources\CirculationResource\Pages;

use App\Filament\Resources\CirculationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCirculation extends EditRecord
{
    protected static string $resource = CirculationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
