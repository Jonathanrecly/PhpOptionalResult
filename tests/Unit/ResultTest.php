<?php

namespace Jonathanr\PhpOptionalResult\Tests\Unit;

use Jonathanr\PhpOptionalResult\Err;
use Jonathanr\PhpOptionalResult\ErrException;
use Jonathanr\PhpOptionalResult\Ok;
use Jonathanr\PhpOptionalResult\Result;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ResultTest extends TestCase
{
    #[Test]
    public function it_should_return_ok_object(): void
    {
        // process
        $result = Result::ok('a value');

        // test
        $this->assertInstanceOf(Ok::class, $result);
    }

    #[Test]
    public function it_should_return_err_object(): void
    {
        // process
        $result = Result::err('some error');

        // test
        $this->assertInstanceOf(Err::class, $result);
    }

    #[Test]
    public function it_should_be_able_to_explain_if_its_ok_object(): void
    {
        // process
        $ok = Result::ok('a value');

        // test
        $this->assertTrue($ok->isOk());
        $this->assertFalse($ok->isErr());

        $this->assertEquals('a value', $ok->get());
    }

    //
    #[Test]
    public function it_should_be_able_to_explain_if_its_err(): void
    {
        // prepare
        $this->expectException(ErrException::class);

        // process
        $err = Result::err('some error');

        // test
        $this->assertFalse($err->isOk());
        $this->assertTrue($err->isErr());

        // throw Err exception
        $err->get();

        $this->assertEquals('some error', $err->getError());
    }
}
