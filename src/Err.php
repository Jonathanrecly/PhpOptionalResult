<?php

declare(strict_types=1);

namespace Jonathanr\PhpOptionalResult;

/**
 * @template T
 *
 * @extends Result<T>
 */
class Err extends Result
{
    private mixed $error;

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

    public function get(): mixed
    {
        return $this->error;
    }
}
