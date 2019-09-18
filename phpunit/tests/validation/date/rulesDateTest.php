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
    public function testDate1()
    {
        $dirty = "2011-12-13";
        $data = (new sanitize($dirty))->date;
        $this->assertEquals("2011-12-13", $data);
    }

    public function testDate2()
    {
        $dirty = "2011/12/13";
        $data = (new sanitize($dirty))->date;
        $this->assertEquals("2011-12-13", $data);
    }

    public function testDateTime1()
    {
        $dirty = "2011-12-13 14:15:16";
        $data = (new sanitize($dirty))->datetime;
        $this->assertEquals("2011-12-13 14:15:16", $data);
    }

    public function testDateTime2()
    {
        $dirty = "2011/12/13 14:15:16";
        $data = (new sanitize($dirty))->datetime;
        $this->assertEquals("2011-12-13 14:15:16", $data);
    }
}
