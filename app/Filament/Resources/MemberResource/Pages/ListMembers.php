<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use App\Models\Member;


class ListMembers extends ListRecords
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'registered' => Tab::make()->query(fn ($query) => $query->where('is_active', 0)),
                        // ->badge(Member::query()->where('is_active', false)->count()),
            'member' => Tab::make()->query(fn ($query) => $query->where('is_active', 1)),
                        // ->badge(Member::query()->where('is_active', true)->count()),

        ];
    }
}
