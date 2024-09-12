<?php

namespace App\Filament\Resources\CirculationResource\Pages;

use App\Models\Procedure;
use App\Filament\Resources\CirculationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class CreateCirculation extends CreateRecord
{
    protected static string $resource = CirculationResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $circulation = static::getModel()::create($data);

        $procedure = new Procedure();
        $procedure->circulation_id = $circulation->id;
        $procedure->type = 'reserved';
        $procedure->save();
        
        return $circulation;

    }
}
