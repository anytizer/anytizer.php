<?php
namespace validation;

use PHPUnit\Framework\TestCase;
//use common\server_side_validator;
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
}
