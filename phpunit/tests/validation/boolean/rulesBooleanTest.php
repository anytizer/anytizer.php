<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

/**
 * True, False
 */
class rulesBooleanTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testTCharacterIsTrue()
    {
        $dirty = " T";

        $clean = (new validation_rules($dirty))->boolean;

        $this->assertTrue($clean);
    }

    public function testYCharacterIsTrue()
    {
        $dirty = "Y ";

        $clean = (new validation_rules($dirty))->boolean;

        $this->assertTrue($clean);
    }

    public function testTextMultiCasedTrueIsTrue()
    {
        $dirty = "trUe";

        $clean = (new validation_rules($dirty))->boolean;

        $this->assertTrue($clean);
    }

    public function testNullIsFalse()
    {
        $dirty = null;
        $clean = (new validation_rules($dirty))->boolean;

        $this->assertFalse($clean);
    }

    public function testFalseTextIsFalse()
    {
        $dirty = " falSe ";

        $clean = (new validation_rules($dirty))->boolean;

        $this->assertFalse($clean);
    }

    public function testOtherTextsAreFalse()
    {
        $dirty = "unknown";

        $clean = (new validation_rules($dirty))->boolean;

        $this->assertFalse($clean);
    }
}
