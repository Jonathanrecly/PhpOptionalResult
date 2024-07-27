<?php

declare(strict_types=1);

namespace Jonathanr\PhpOptionalResult;

use Exception;

class Ok extends Result
{
    private mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function isOk(): bool
    {
        return true;
    }

    public function isErr(): bool
    {
        return false;
    }

    public function get(): mixed
    {
        return $this->value;
    }

    /**
     * @throws Exception
     */
    public function getError(): mixed
    {
        throw new Exception('Cannot get error from Ok');
    }
}
