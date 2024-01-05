<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ExpenditureType: string implements HasLabel
{
    case infrastructure= 'infrastructure';
    case personal = 'personal';
    case legal = 'legal';
    case overhead = 'overhead';
    case other = 'other';
    case tax = 'tax';
    case marketing = 'marketing';

    public function getLabel(): string
    {
        return match ($this) {
            self::infrastructure => 'Infrastructure',
            self::personal => 'Personal',
            self::legal => 'Legal',
            self::overhead => 'Overhead',
            self::other => 'Other',
            self::tax => 'Tax',
            self::marketing => 'Marketing',
        };
    }
}
