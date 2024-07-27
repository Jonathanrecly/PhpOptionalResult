<?php

namespace Jonathanr\PhpOptionalResult;

abstract class Result
{
    /**
     * @template T
     * @param T $value
     * @return Result
     */
    public static function ok($value): Result
    {
        return new Ok($value);
    }

    /**
     * @template E
     * @param E $error
     * @return Result
     */
    public static function err($error): Result
    {
        return new Err($error);
    }

    abstract public function isOk(): bool;
    abstract public function isErr(): bool;

    /**
     * @return mixed
     */
    abstract public function get(): mixed;

    /**
     * @return mixed
     */
    abstract public function getError(): mixed;
}