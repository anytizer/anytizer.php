<?php
namespace tests\backend\validation;

use PHPUnit\Framework\TestCase;
use anytizer\sanitize as validation_rules;

/**
 * Yes No Rules
 */
class rulesYTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testYesNoSaysYes()
    {
        $dirty = "whatever";
        $expect = "Y";

        $clean = (new validation_rules($dirty))->Y;

        $this->assertEquals($expect,  $clean);
    }
}
