<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesCodeTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testCodeInUpperCaseAccess()
    {
        $dirty = " cat 07";
        $expect = "CAT07";
        $clean = (new validation_rules($dirty))->CODE; // CODE: upper cased

        $this->assertEquals($expect,  $clean);
    }

    public function testCodeInLowerCaseAccess()
    {
        $dirty = " id 0. 7 ";
        $expect = "ID0.7";
        $clean = (new validation_rules($dirty))->code; // code: lower cased

        $this->assertEquals($expect,  $clean);
    }
}
