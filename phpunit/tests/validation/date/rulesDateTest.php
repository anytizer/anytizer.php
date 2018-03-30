<?php
namespace tests\backend\validation;

use anytizer\sanitize;
use PHPUnit\Framework\TestCase;

class rulesDateTest extends TestCase
{
    public function setup()
    {
    }

    /**
     * @todo Date
     * @todo Date/Time (rare)
     * @todo Age, Number Rage
     */
    public function testDate()
    {
        $dirty = "2010-10-10";
        $data = (new sanitize($dirty))->date;
        $this->assertEquals("2010-10-10", $data);
    }
}