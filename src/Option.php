<?php

declare(strict_types=1);

namespace Jonathanr\PhpOptionalResult;

/**
 * @template T
 */
abstract class Option
{
    /**
     * @template U
     *
     * @param  U  $value
     * @return Some<U>
     */
    public static function some($value): Some
    {
        return new Some($value);
    }

    /**
     * @return None<T>
     */
    public static function none(): None
    {
        return new None;
    }

    abstract public function isSome(): bool;

    abstract public function isNone(): bool;

    abstract public function get(): mixed;
}
