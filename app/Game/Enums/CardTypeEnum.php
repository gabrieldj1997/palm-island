<?php

namespace App\Game\Enums;

enum CardTypeEnum: int
{
    case Normal = 1;
    case Turn = 2;
    case Feat = 3;

    public function label(): string
    {
        return match($this) {
            self::Normal => 'normal',
            self::Turn => 'turn',
            self::Feat => 'feat',
        };
    }
}