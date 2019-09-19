<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesCodeTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testCode()
    {
        $dirty = " cat 07";
        $expect = "CAT07";
        $clean = (new validation_rules($dirty))->CODE;

        $this->assertEquals($expect,  $clean);
    }
}
