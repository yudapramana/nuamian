<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum CirculationStatus: string implements HasColor, HasIcon, HasLabel
{
    case New = 'new';

    case Reserved = 'reserved';

    case Extended = 'extended';

    case Returned = 'returned';

    case Cancelled = 'cancelled';

    public function getLabel(): string
    {
        return match ($this) {
            self::New => 'New',
            self::Reserved => 'Reserved',
            self::Extended => 'Extended',
            self::Returned => 'Returned',
            self::Cancelled => 'Cancelled',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::New => 'info',
            self::Reserved => 'warning',
            self::Extended, self::Returned => 'success',
            self::Cancelled => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::New => 'heroicon-m-sparkles',
            self::Reserved => 'heroicon-m-arrow-path',
            self::Extended => 'heroicon-m-truck',
            self::Returned => 'heroicon-m-check-badge',
            self::Cancelled => 'heroicon-m-x-circle',
        };
    }
}
