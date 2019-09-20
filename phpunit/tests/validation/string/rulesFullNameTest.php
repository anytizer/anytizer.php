<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesFullNameTest extends TestCase
{
    public function setup(): void
    {
    }

	public function testFullNameInitialsCapitalized()
	{
		$dirty = "jane  doE"; // multi-spaced
        $expect = "Jane Doe";
        $clean = (new validation_rules($dirty))->fullname;

        # echo sprintf("Input: %s, Output: %s", $dirty, $expect);

        $this->assertEquals($expect,  $clean);
	}

    public function testFullNameNoExtraSpacesInNames()
    {
        $dirty = " 5 mrs.  jane   do E 6 "; // multi-spaced with numerals
        $expect = "Mrs. Jane Do E";
        $clean = (new validation_rules($dirty))->fullname;

        $this->assertEquals($expect,  $clean);
    }

    public function testFullNameCapitalizedMiddleWords()
    {
        $dirty = "pieter mc. philips";
        $expect = "Pieter Mc. Philips";
        $clean = (new validation_rules($dirty))->fullname;

        $this->assertEquals($expect,  $clean);
    }
}
