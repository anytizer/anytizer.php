<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testDigitsOnlyValidationRule()
    {
        $dirty = "Phone: +123-456-7890";
        $expect = "1234567890";

        $rule = new validation_rules($dirty);
        $clean = $rule->digits;

        $this->assertEquals($expect,  $clean);
    }
}
