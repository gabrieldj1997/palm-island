<?php

namespace App\Game\Domain\Exceptions;

use RuntimeException;

final class FirstOrSecondCardException extends DomainException
{
    public function __construct()
    {
        parent::__construct('You can only activate action about first or second card your deck.');
    }

    public function message(): string
    {
        return $this->getMessage();
    }
}
