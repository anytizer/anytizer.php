<?php
namespace validation;

use PHPUnit\Framework\TestCase;
//use common\server_side_validator;
use anytizer\sanitize as validation_rules;

/**
 * Sanitize phone number
 */
class phonenumberTest extends TestCase
{
	public function setup()
	{
	}
	
    public function testPhoneNumberValidationRuleOne()
    {
        $dirty = "Phone: +123-456-7890";
        $expect = "+1234567890";

        $rule = new validation_rules($dirty);
        $clean = $rule->phone;

        $this->assertEquals($expect,  $clean);
    }

    public function testPhoneNumberValidationRuleTwo()
    {
        $dirty = "Phone: +123-456-7890#123+";
        $expect = "+1234567890123";

        $rule = new validation_rules($dirty);
        $clean = $rule->phone;

        $this->assertEquals($expect,  $clean);
    }

    public function testPhoneNumberValidationRuleThree()
    {
        $dirty = "+1-23-35463484";
        $expect = "+12335463484";

        $rule = new validation_rules($dirty);
        $clean = $rule->phone;

        $this->assertEquals($expect,  $clean);
    }

	/**
	 * Preserve the leading + sign
	 */
	public function testPhoneNumberIsTrimmed()
	{
		$value = "Phone: + 123 + 456 - 7890+ ext";
		
		$vr = new validation_rules($value);
		$phonenumber = $vr->phone;
		
		$this->assertEquals("+1234567890", $phonenumber);
	}

	/**
	 * Preserve the leading + sign
	 */
    public function testPhoneNumberIsTrimmedLeadingPlusSign()
    {
        $value = "+123 + 456";

        $vr = new validation_rules($value);
        $phonenumber = $vr->phone;

        $this->assertEquals("+123456", $phonenumber);
    }

    /**
     * Preserve the leading + sign
     */
    public function testPhoneNumberPlusSignNoRepeat()
    {
        $value = "++#+1+2+3+4+5+6+++";

        $vr = new validation_rules($value);
        $phonenumber = $vr->phone;

        $this->assertEquals("+123456", $phonenumber);
    }

	/**
	 * Non digits in middle of number
	 */
	public function testPhoneNumberIsTrimmedNonLeadingPlusSign()
	{
		$value = "#123 + 456, 7";

		$vr = new validation_rules($value);
		$phonenumber = $vr->phone;

		$this->assertEquals("1234567", $phonenumber);
	}
}
