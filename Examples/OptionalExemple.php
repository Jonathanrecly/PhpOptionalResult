<?php


use Jonathanr\PhpOptionalResult\Option;

function findNumber(array $arr, int $target): Option
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
    echo "Number found at index " . $result->get();
} else {
    echo "Number not found";
}
