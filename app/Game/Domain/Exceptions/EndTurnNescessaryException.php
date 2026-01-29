<?php

namespace App\Game\Domain\Exceptions;

use RuntimeException;

final class EndTurnNescessaryException extends DomainException
{
    public function __construct()
    {
        parent::__construct('Your first card is turn card, finished your turn before other action.');
    }

    public function message(): string
    {
        return $this->getMessage();
    }
}
