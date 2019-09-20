<?php
namespace validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

/**
 * Sanitize phone number
 */
class exoticTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testUserNameRuleOne()
    {
        $dirty = "user@name.`example`.com";
        $expect = "user@name.example.com";

        $rule = new validation_rules($dirty);
        $clean = $rule->username;

        $this->assertEquals($expect,  $clean);
    }

    public function testSaltGeneration()
    {
        $dirty = "username";

        $rule = new validation_rules($dirty);
        $salt1 = $rule->salt;
        $salt2 = $rule->salt;

        /**
         * Salt should NOT be same when generated twice
         */
        $this->assertFalse($salt1 == $salt2);

        /**
         * Salt length meets the criteria
         */
        $this->assertEquals(10,  strlen($salt1));
    }
}
