<?php

namespace App\Game\Domain\Exceptions;

use RuntimeException;

final class UnsupportedActionException extends DomainException
{
    public function __construct()
    {
        parent::__construct('Unsupported action.');
    }

    public function message(): string
    {
        return $this->getMessage();
    }
}
