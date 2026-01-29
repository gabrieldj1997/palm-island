<?php

namespace App\Game\Enums;

enum ActionEnum: int
{
    case Store = 1;
    case Rotate = 2;
    case Flip = 3;

    // Método auxiliar para pegar o nome formatado (opcional)
    public function label(): string
    {
        return match($this) {
            self::Store => 'Store',
            self::Rotate => 'Rotate',
            self::Flip => 'Flip',
        };
    }
}