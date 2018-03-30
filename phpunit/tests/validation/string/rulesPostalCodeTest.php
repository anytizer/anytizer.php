<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesPostalCodeTest extends TestCase
{
    public function setup()
    {
    }

    public function testPostalCode()
    {
        $dirty = " opqr6 h";
        $expect = "OPQ R6H";
        $clean = (new validation_rules($dirty))->postalcode;

        $this->assertEquals($expect,  $clean);
    }

    public function testPostalCodeInvalidCharacters()
    {
        $dirty = ":opq-r6h";
        $expect = "OPQ R6H";
        $clean = (new validation_rules($dirty))->postalcode;

        $this->assertEquals($expect,  $clean);
    }

    public function testPostalCodeLong()
    {
        $dirty = "opqr6h4t";
        $expect = "OPQ R6H4T";
        $clean = (new validation_rules($dirty))->postalcode;

        $this->assertEquals($expect,  $clean);
    }
}