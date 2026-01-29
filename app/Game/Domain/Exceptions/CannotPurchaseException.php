<?php

namespace App\Game\Domain\Exceptions;

use RuntimeException;

final class CannotPurchaseException extends DomainException
{
    public function __construct()
    {
        parent::__construct("You can't purchase more cards, discard some card purchased.");
    }

    public function message(): string
    {
        return $this->getMessage();
    }
}
