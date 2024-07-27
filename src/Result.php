<?php

declare(strict_types=1);

namespace Jonathanr\PhpOptionalResult;

abstract class Result
{
    /**
     * @template T
     *
     * @param  T  $value
     */
    public static function ok($value): Result
    {
        return new Ok($value);
    }

    /**
     * @template E
     *
     * @param  E  $error
     */
    public static function err($error): Result
    {
        return new Err($error);
    }

    abstract public function isOk(): bool;

    abstract public function isErr(): bool;

    abstract public function get(): mixed;

    abstract public function getError(): mixed;
}
