<?php

use Jonathanr\PhpOptionalResult\None;
use Jonathanr\PhpOptionalResult\Option;
use Jonathanr\PhpOptionalResult\Some;

/**
 * @param  array<int>  $arr
 * @return Some<int>|None<mixed>
 */
function findNumber(array $arr, int $target): Some|None
{
    foreach ($arr as $index => $num) {
        if ($num === $target) {
            return Option::some($index);
        }
    }

    return Option::none();
}

$result = findNumber([1, 2, 3, 4, 5], 3);

if ($result->isSome()) {
    echo 'Number found at index '.$result->get();
} else {
    echo 'Number not found';
}
