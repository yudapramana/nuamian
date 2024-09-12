<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ProcedureStatus: string implements HasColor, HasIcon, HasLabel
{
    case Waiting = 'waiting';

    case Accepted = 'Accepted';

    case Rejected = 'Rejected';

    public function getLabel(): string
    {
        return match ($this) {
            self::Waiting => 'Waiting',
            self::Accepted => 'Accepted',
            self::Rejected => 'Rejected',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Waiting => 'info',
            self::Accepted => 'success',
            self::Rejected => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Waiting => 'heroicon-m-sparkles',
            self::Accepted => 'heroicon-m-truck',
            self::Rejected => 'heroicon-m-x-circle',
        };
    }
}
