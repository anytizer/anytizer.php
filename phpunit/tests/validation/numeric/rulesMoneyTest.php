<?php
namespace validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

class rulesMoneyTest extends TestCase
{
	public function setup()
	{
	}
	
    public function testMoneyFormatMediumFloat()
    {
        $dirty = "$8,234.0950";
        $expect = 8234.09; // .10

        $clean = (new validation_rules($dirty))->money;

		$this->assertEquals($expect,  $clean);
    }

    public function testMoneyFormatSmallFloat()
    {
        $dirty = "$8,234.0930";
        $expect = 8234.09;

        $clean = (new validation_rules($dirty))->money;

        $this->assertEquals($expect,  $clean);
    }

    public function testMoneyFormatLargeFloat()
    {
        $dirty = "$8,234.0970";
        $expect = 8234.09; // .10

        $clean = (new validation_rules($dirty))->money;

        $this->assertEquals($expect,  $clean);
    }
	
	public function testMoneyFormatDecimal()
    {
        $dirty = "$8,234";
        $expect = 8234.00;

        $clean = (new validation_rules($dirty))->money;

        $this->assertEquals($expect,  $clean);
    }
}
