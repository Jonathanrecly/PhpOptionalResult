<?php

use Jonathanr\PhpOptionalResult\Result;

function divide(float $a, float $b): Result
{
    if ($b == 0.0) {
        return Result::err("Cannot divide by zero");
    } else {
        return Result::ok($a / $b);
    }
}

$result = divide(10.0, 2.0);

if ($result->isOk()) {
    echo "Result: " . $result->get();
} else {
    echo "Error: " . $result->getError();
}
