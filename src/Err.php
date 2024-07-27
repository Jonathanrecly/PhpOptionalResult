<?php

namespace Jonathanr\PhpOptionalResult;

use Exception;

class Err extends Result
{
    private mixed $error;

    /**
     * @param mixed $error
     */
    public function __construct(mixed $error)
    {
        $this->error = $error;
    }

    public function isOk(): bool
    {
        return false;
    }

    public function isErr(): bool
    {
        return true;
    }

    /**
     * @throws Exception
     */
    public function get(): mixed
    {
        throw new ErrException("Cannot get value from Err");
    }

    public function getError(): mixed
    {
        return $this->error;
    }
}
