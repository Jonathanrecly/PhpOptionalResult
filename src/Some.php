<?php

namespace Jonathanr\PhpOptionalResult;

class Some extends Option
{
    private mixed $value;

    /**
     * @param mixed $value
     */
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function isSome(): bool
    {
        return true;
    }

    public function isNone(): bool
    {
        return false;
    }

    public function get(): mixed
    {
        return $this->value;
    }
}
