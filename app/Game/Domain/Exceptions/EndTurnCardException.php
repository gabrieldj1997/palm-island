<?php

namespace App\Game\Domain\Exceptions;

use RuntimeException;

final class EndTurnCardException extends DomainException
{
    public function __construct()
    {
        parent::__construct('You can only apply the next turn action when the first card is the turn card.');
    }

    public function message(): string
    {
        return $this->getMessage();
    }
}
