<?php

namespace Jonathanr\PhpOptionalResult;

use Exception;

class None extends Option
{

    public function isSome(): bool
    {
        return false;
    }

    public function isNone(): bool
    {
        return true;
    }

    /**
     * @throws Exception
     */
    public function get(): mixed
    {
        throw new NoneException("Cannot get value from None Object");
    }
}
