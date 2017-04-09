<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use common\validation_rules;

/**
 * Yes No Rules
 */
class rulesYesNoTest extends TestCase
{
    public function setup()
    {
    }

    public function testYesNoSaysYes()
    {
        $dirty = "yEs";
        $expect = "Y";

        $clean = (new validation_rules($dirty))->yn;

        $this->assertEquals($expect,  $clean);
    }

    public function testYesNoSaysNo()
    {
        $dirty = "no";
        $expect = "N";

        $clean = (new validation_rules($dirty))->yn;

        $this->assertEquals($expect,  $clean);
    }

    public function testYesNoUnidentifiedSaysNo()
    {
        $dirty = "";
        $expect = "N";

        $clean = (new validation_rules($dirty))->yn;

        $this->assertEquals($expect,  $clean);
    }
}