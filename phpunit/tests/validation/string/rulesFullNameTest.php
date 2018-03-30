<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesFullNameTest extends TestCase
{
    public function setup()
    {
    }

	public function testFullNameInitialsCapitalized()
	{
		$dirty = "jane  doE"; // multi-spaced

        $expect = "Jane Doe";

        #$rule = new validation_rules($dirty);
        #$clean = $rule->fullname;

        $clean = (new validation_rules($dirty))->fullname;

        # echo sprintf("Input: %s, Output: %s", $dirty, $expect);

        $this->assertEquals($expect,  $clean);
	}

    public function testFullNameNoExtraSpacesInNames()
    {
        $dirty = " 5 mrs. jane  do E 6 "; // multi-spaced
        $expect = "Mrs. Jane Do E";
        $clean = (new validation_rules($dirty))->fullname;

        $this->assertEquals($expect,  $clean);
    }
}