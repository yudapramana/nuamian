<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'management/users';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        $password = Forms\Components\TextInput::make('password')->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create');
        return $form
            ->schema([
                Forms\Components\Select::make('organization_id')
                ->relationship('organization', 'name')
                ->searchable()
                ->preload(),
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('email')->email(),
                Forms\Components\Select::make('role_id')
                ->relationship('role', 'name')
                ->searchable()
                ->preload()
                ->required(),
                $password,
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $orgID = $user->organization_id;
        if($orgID) {
            return parent::getEloquentQuery()->where('organization_id', $orgID);
        } else {
            return parent::getEloquentQuery();
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('organization.name')
                ->placeholder('No Organization'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('role.name'),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                // $user = auth()->user();
                // $orgID = $user->organization_id;
                // if($orgID) {
                //     # Where Query of User that Org ID is it
                //     return $query->where('organization_id', $orgID); 
                // } 
            }) 
            ->filters([
                //
            ])
            ->actions([
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
