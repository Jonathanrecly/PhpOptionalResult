<?php

declare(strict_types=1);

namespace Jonathanr\PhpOptionalResult;

/**
 * @template T
 */
abstract class Result
{
    /**
     * @template U
     *
     * @param  U  $value
     * @return Ok<U>
     */
    public static function ok($value): Ok
    {
        return new Ok($value);
    }

    /**
     * @template U
     *
     * @param  U  $error
     * @return Err<U>
     */
    public static function err($error): Err
    {
        return new Err($error);
    }

    abstract public function isOk(): bool;

    abstract public function isErr(): bool;

    /**
     * @return T
     */
    abstract public function get(): mixed;
}
