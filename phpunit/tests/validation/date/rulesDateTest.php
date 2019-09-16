<?php
namespace tests\backend\validation;

use anytizer\sanitize;
use PHPUnit\Framework\TestCase;

class rulesDateTest extends TestCase
{
    public function setup(): void
    {
    }

    /**
     * @todo Date
     * @todo Date/Time (rare)
     * @todo Age, Number Rage
     */
    public function testDate()
    {
        $dirty = "2011-12-13";
        $data = (new sanitize($dirty))->date;
        $this->assertEquals("2011-12-13", $data);
    }
}
