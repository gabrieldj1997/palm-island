<?php

namespace App\Game\Domain\Exceptions;

use RuntimeException;

final class NotEnoughResourceException extends DomainException
{
    public function __construct()
    {
        parent::__construct('Not enough resources to purchase action purchase card.');
    }

    public function message(): string
    {
        return $this->getMessage();
    }
}
