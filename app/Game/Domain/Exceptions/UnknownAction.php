<?php

namespace App\Game\Domain\Exceptions;

use RuntimeException;

final class UnknownActionException extends DomainException
{
    public function __construct()
    {
        parent::__construct('Unknown action.');
    }

    public function message(): string
    {
        return $this->getMessage();
    }
}
