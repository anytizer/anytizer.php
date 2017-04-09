<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use common\validation_rules;

/**
 * True, False
 */
class rulesBooleanTest extends TestCase
{
    public function setup()
    {
    }

    public function testCharacterTrue()
    {
        $dirty = "Y ";
        $clean = (new validation_rules($dirty))->boolean;

        $this->assertTrue($clean);
    }

    public function testTextTrue()
    {
        $dirty = "trUe";
        $clean = (new validation_rules($dirty))->boolean;

        $this->assertTrue($clean);
    }

    public function testTextFalse()
    {
        $dirty = " falSe ";
        $clean = (new validation_rules($dirty))->boolean;

        $this->assertFalse($clean);
    }

    public function testOthersFalse()
    {
        $dirty = "unknown";
        $clean = (new validation_rules($dirty))->boolean;

        $this->assertFalse($clean);
    }
}