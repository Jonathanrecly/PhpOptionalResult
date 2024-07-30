<?php

declare(strict_types=1);

namespace Jonathanr\PhpOptionalResult;

/**
 * @template T
 *
 * @extends Option<T>
 */
class None extends Option
{
    public function __construct() {}

    public function isSome(): bool
    {
        return false;
    }

    public function isNone(): bool
    {
        return true;
    }

    public function get(): null
    {
        return null;
    }
}
