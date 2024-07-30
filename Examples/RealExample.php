<?php

use Jonathanr\PhpOptionalResult\Err;
use Jonathanr\PhpOptionalResult\None;
use Jonathanr\PhpOptionalResult\Ok;
use Jonathanr\PhpOptionalResult\Option;
use Jonathanr\PhpOptionalResult\Result;
use Jonathanr\PhpOptionalResult\Some;





/**
 * @return string
 */
function askDomain(string $name): ?String
{
    try {
        $json = Http::get('myResolverApi?name='.$name)->json();
        if (isset($json['domain']) && ($json['domain'] !== null || $json['domain'] !== '')) {
            return $json['domain'];
        }
        return null;

    } catch (HttpException) {
        throw new Exception('API No respond');
    }
}

function isDomainExist(string $name): string
{
    try {
        $result = askDomain($name);

        if (!empty($result)) {
            return 'domain is'.$result;
        }


    } catch (Exception $e) {
        return '';
    }
}


echo isDomainExist('goooooooooooogle');








/**
 * @return Ok<Some<string>|None>|Err<None>
 */
function askDomain(string $name): Ok|Err
{
    try {
        $json = Http::get('myResolverApi?name='.$name)->json();
        if (isset($json['domain'])) {
            return Result::ok(Option::some($json['domain']));
        }

        return Result::ok(Option::none());

    } catch (HttpException) {
        return Result::Err(Option::none());
    }
}

function isDomainExist(string $name): string
{
    $result = askDomain($name);

    if ($result->isErr()) {
        return 'Not sure. API not respond';
    }

    if ($result->isOk() && $result->get()->isSome()) {
        return 'domain is'.$result->get()->isSome()->get();
    }

    return 'domain does not exist';
}


echo isDomainExist('goooooooooooogle');