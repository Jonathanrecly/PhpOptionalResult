<?php

declare(strict_types=1);

namespace Jonathanr\PhpOptionalResult;

abstract class Option
{
    /**
     * @template T
     *
     * @param  T  $value
     */
    public static function some($value): Some
    {
        return new Some($value);
    }

    public static function none(): None
    {
        return new None;
    }

    abstract public function isSome(): bool;

    abstract public function isNone(): bool;

    abstract public function get(): mixed;
}
