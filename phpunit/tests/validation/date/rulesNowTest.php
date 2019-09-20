<?php
namespace tests\backend\validation;

use anytizer\sanitize;
use PHPUnit\Framework\TestCase;

class rulesNowTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testNowReturnsDateTime()
    {
        $dirty = "garbage";
        $now = (new sanitize($dirty))->now;
        $this->assertEquals(strlen("2011-12-13 14:15:16"), strlen($now));
    }
}
