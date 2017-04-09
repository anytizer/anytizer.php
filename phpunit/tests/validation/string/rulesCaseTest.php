<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use common\validation_rules;

/**
 * Case Test
 */
class rulesCaseTest extends TestCase
{
    public function setup()
    {
    }

    public function testLowerNotEqualUpper()
    {
        $lower = "Phone";
        $upper = "PHONE";

        $this->assertNotEquals($lower,  $upper);
    }

    public function testUpperCaseValidationRule()
    {
        $dirty = "Phone";
        $expect = "PHONE";

        $rule = new validation_rules($dirty);
        $clean = $rule->upper;

        $this->assertEquals($expect,  $clean);
    }

    public function testLowerCaseValidationRule()
    {
        $dirty = "Phone";
        $expect = "phone";

        $rule = new validation_rules($dirty);
        $clean = $rule->lower;

        $this->assertEquals($expect,  $clean);
    }
}