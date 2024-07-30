<?php

namespace Jonathanr\PhpOptionalResult\Tests\Unit;

use Jonathanr\PhpOptionalResult\None;
use Jonathanr\PhpOptionalResult\Option;
use Jonathanr\PhpOptionalResult\Some;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class OptionTest extends TestCase
{
    #[Test]
    public function it_should_return_some_object(): void
    {
        // process
        $result = Option::some('a value');

        // test
        $this->assertInstanceOf(Some::class, $result);
    }

    #[Test]
    public function it_should_return_none_object(): void
    {
        // process
        $result = Option::none();

        // test
        $this->assertInstanceOf(None::class, $result);
    }

    #[Test]
    public function it_should_be_able_to_explain_if_its_some_object(): void
    {
        // process
        $some = Option::some('a value');

        // test
        $this->assertTrue($some->isSome());
        $this->assertFalse($some->isNone());

        $this->assertEquals('a value', $some->get());
    }

    #[Test]
    public function it_should_be_able_to_explain_if_its_none(): void
    {
        // process
        $none = Option::none();

        // test
        $this->assertFalse($none->isSome());
        $this->assertTrue($none->isNone());
    }
}
