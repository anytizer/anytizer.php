<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesTextTest extends TestCase
{
    public function setup()
    {
    }

    public function testPostalCode()
    {
        $dirty = " <a>b";
        $expect = "ab";
        $clean = (new validation_rules($dirty))->text;

        $this->assertEquals($expect,  $clean);
    }
}