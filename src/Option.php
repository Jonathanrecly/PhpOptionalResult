<?php

namespace Jonathanr\PhpOptionalResult;

abstract class Option
{
    /**
    * @template T
    * @param T $value
    * @return Some
    */
    public static function some($value): Some
    {
        return new Some($value);
    }

    /**
     * @return None
     */
    public static function none(): None
    {
        return new None();
    }

    abstract public function isSome(): bool;
    abstract public function isNone(): bool;

    /**
     * @return mixed
     */
    abstract public function get(): mixed;
}
