<?php

namespace App\Game\Domain\Exceptions;

abstract class DomainException extends \RuntimeException
{
    public function code(): string
    {
        return static::class;
    }
}
