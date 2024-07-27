<?php

namespace Jonathanr\PhpOptionalResult\Tests\Unit;

use Jonathanr\PhpOptionalResult\None;
use Jonathanr\PhpOptionalResult\NoneException;
use Jonathanr\PhpOptionalResult\Option;
use Jonathanr\PhpOptionalResult\Some;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class OptionTest extends TestCase
{
    #[Test]
    public function it_should_return_some_object()
    {
        // process
        $result = Option::some('a value');

        // test
        $this->assertInstanceOf(Some::class, $result);
    }

    #[Test]
    public function it_should_return_none_object()
    {
        // process
        $result = Option::none();

        // test
        $this->assertInstanceOf(None::class, $result);
    }

    #[Test]
    public function it_should_be_able_to_explain_if_its_some_object()
    {
        // process
        $some = Option::some('a value');

        // test
        $this->assertTrue($some->isSome());
        $this->assertFalse($some->isNone());

        $this->assertEquals('a value', $some->get());
    }

    #[Test]
    public function it_should_be_able_to_explain_if_its_none()
    {
        // prepare
        $this->expectException(NoneException::class);

        // process
        $none = Option::none();

        // test
        $this->assertFalse($none->isSome());
        $this->assertTrue($none->isNone());

        $none->get();
    }
}
