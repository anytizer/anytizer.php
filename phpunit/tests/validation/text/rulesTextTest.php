<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesTextTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testTextHtml()
    {
        $dirty = " <a>b ";
        $expect = "b";
        $clean = (new validation_rules($dirty))->text;

        $this->assertEquals($expect,  $clean);
    }

    public function testText()
    {
        $dirty = "b";
        $expect = "b";
        $clean = (new validation_rules($dirty))->text;

        $this->assertEquals($expect,  $clean);
    }
}
