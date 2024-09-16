<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use App\Models\User;
use Auth;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
        
    }

    public function getTabs(): array
    {
        $roleID = Auth::user()->role_id;

        if($roleID == 2) {
            return [
                'unverified' => Tab::make()->query(fn ($query) => $query->where('role_id', 1)),
                            // ->badge(User::query()->where('role_id', 1)->count()),
                'SuAdmin' => Tab::make()->query(fn ($query) => $query->where('role_id', 2)),
                            // ->badge(User::query()->where('role_id', 2)->count()),
                'Admin' => Tab::make()->query(fn ($query) => $query->where('role_id', 3)),
                            // ->badge(User::query()->where('role_id', 3)->count()),
                'Librarian' => Tab::make()->query(fn ($query) => $query->where('role_id', 4)),
                            // ->badge(User::query()->where('role_id', 4)->count()),
                'Member' => Tab::make()->query(fn ($query) => $query->where('role_id', 5)),
                            // ->badge(User::query()->where('role_id', 5)->count()),
    
            ];
        }

        if($roleID == 3) {
            return [
                'unverified' => Tab::make()->query(fn ($query) => $query->where('role_id', 1)),
                            // ->badge(User::query()->where('role_id', 1)->count()),
                'Admin' => Tab::make()->query(fn ($query) => $query->where('role_id', 3)),
                            // ->badge(User::query()->where('role_id', 3)->count()),
                'Librarian' => Tab::make()->query(fn ($query) => $query->where('role_id', 4)),
                            // ->badge(User::query()->where('role_id', 4)->count()),
                'Member' => Tab::make()->query(fn ($query) => $query->where('role_id', 5)),
                            // ->badge(User::query()->where('role_id', 5)->count()),
    
            ];
        }

        if($roleID != 2 OR $roleID != 3) {
            return [
                'unverified' => Tab::make()->query(fn ($query) => $query->where('role_id', 1)),
                            // ->badge(User::query()->where('role_id', 1)->count()),
                'Admin' => Tab::make()->query(fn ($query) => $query->where('role_id', 3)),
                            // ->badge(User::query()->where('role_id', 3)->count()),
                'Librarian' => Tab::make()->query(fn ($query) => $query->where('role_id', 4)),
                            // ->badge(User::query()->where('role_id', 4)->count()),
                'Member' => Tab::make()->query(fn ($query) => $query->where('role_id', 5)),
                            // ->badge(User::query()->where('role_id', 5)->count()),
    
            ];
        }
        
    }
}
