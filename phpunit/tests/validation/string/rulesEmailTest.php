<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use common\validation_rules;

class rulesEmailTest extends TestCase
{
    public function setup()
    {
    }

    public function testEmailFormat()
    {
        $dirty = " email @ example .com";
        $expect = "email@example.com";

        $clean = (new validation_rules($dirty))->email;

        $this->assertEquals($expect,  $clean);
    }
}