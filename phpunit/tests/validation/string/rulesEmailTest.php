<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesEmailTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testEmailFormat()
    {
        $dirty = " email @ example .com";
        $expect = "email@example.com";

        $clean = (new validation_rules($dirty))->email;

        $this->assertEquals($expect,  $clean);
    }

    public function testEmailFormatNumerals()
    {
        $dirty = "contact7 @ example.com";
        $expect = "contact7@example.com";

        $clean = (new validation_rules($dirty))->email;

        $this->assertEquals($expect,  $clean);
    }
}
