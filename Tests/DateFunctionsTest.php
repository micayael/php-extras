<?php

namespace Micayael\PHPExtras\Tests;

use Micayael\PHPExtras\Functions\DateFunctions;
use PHPUnit\Framework\TestCase;

/**
 * @author Juan Ardissone (micayael) <micayael@gmail.com>
 */
class DateFunctionsTest extends TestCase
{
    const NULL_VALUE = null;
    const EMPTY_STRING = '';
    const SOME_TEXT = 'some text';
    const SOME_NUMBER = 123;

    private $now;
    private $pastDate1;
    private $pastDate2;
    private $futureDate1;
    private $futureDate2;

    protected function setUp()
    {
        $this->now = date('Y-m-d');

        $this->futureDate1 = $this->addDaysFromNow(1);
        $this->futureDate2 = $this->addDaysFromNow(31);

        $this->pastDate1 = $this->addDaysFromNow(-1);
        $this->pastDate2 = $this->addDaysFromNow(-31);
    }

    private function addDaysFromNow($days)
    {
        $now = date('Y-m-d');
        $date = date_create($now);
        date_add($date, date_interval_create_from_date_string($days.' days'));

        return date_format($date, 'Y-m-d');
    }

    public function testGetSanitizedDate()
    {
        $this->assertFalse(DateFunctions::getSanitizedDate('01/01/2015'));
        $this->assertFalse(DateFunctions::getSanitizedDate('01-01-2015'));
        $this->assertFalse(DateFunctions::getSanitizedDate('2015/01/01'));
        $this->assertFalse(DateFunctions::getSanitizedDate('08:10:00'));
        $this->assertFalse(DateFunctions::getSanitizedDate(''));
        $this->assertFalse(DateFunctions::getSanitizedDate(null));

        $this->assertEquals(DateFunctions::getSanitizedDate('2015-01-01'), '2015-01-01');
        $this->assertEquals(DateFunctions::getSanitizedDate('now'), date('Y-m-d'));
        $this->assertEquals(DateFunctions::getSanitizedDate('2015-01-01 08:10:00'), '2015-01-01');
    }

    public function testGetSanitizedTime()
    {
        $this->assertFalse(DateFunctions::getSanitizedTime('2015-01-01'));
        $this->assertFalse(DateFunctions::getSanitizedTime(''));
        $this->assertFalse(DateFunctions::getSanitizedTime(null));

        $this->assertEquals(DateFunctions::getSanitizedTime('08:10:00'), '08:10:00');
        $this->assertEquals(DateFunctions::getSanitizedTime('now'), date('H:i:s'));
        $this->assertEquals(DateFunctions::getSanitizedTime('2015-01-01 08:10:00'), '08:10:00');
        $this->assertEquals(DateFunctions::getSanitizedTime('08:10:00.000'), '08:10:00.000');
    }

    public function testGetSanitizedDateTime()
    {
        $this->assertFalse(DateFunctions::getSanitizedDateTime('2015-01-01'));
        $this->assertFalse(DateFunctions::getSanitizedDateTime('08:10:00'));
        $this->assertFalse(DateFunctions::getSanitizedDateTime(''));
        $this->assertFalse(DateFunctions::getSanitizedDateTime(null));

        $this->assertEquals(DateFunctions::getSanitizedDateTime('now'), date('Y-m-d H:i:s'));
        $this->assertEquals(DateFunctions::getSanitizedDateTime('2015-01-01 08:10:00'), '2015-01-01 08:10:00');
    }

    public function testGetNextEndOfMonth()
    {
        $lastDayCurrentMonth = date('t', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $lastDateCurrentMonth = date('Y-m-').$lastDayCurrentMonth;

        $this->assertEquals(DateFunctions::getNextEndOfMonth('2015-08-27'), '2015-08-31');
        $this->assertEquals(DateFunctions::getNextEndOfMonth('2015-02-01'), '2015-02-28');
        $this->assertEquals(DateFunctions::getNextEndOfMonth('2012-02-16'), '2012-02-29');
        $this->assertEquals(DateFunctions::getNextEndOfMonth('now'), $lastDateCurrentMonth);
        $this->assertEquals(DateFunctions::getNextEndOfMonth(), $lastDateCurrentMonth);
    }

    public function testGetNextEndOfMonthQuiet()
    {
        $this->assertEquals(DateFunctions::getNextEndOfMonthQuiet(static::NULL_VALUE), static::NULL_VALUE);
        $this->assertEquals(DateFunctions::getNextEndOfMonthQuiet(static::EMPTY_STRING), static::EMPTY_STRING);
        $this->assertEquals(DateFunctions::getNextEndOfMonthQuiet(static::SOME_TEXT), static::SOME_TEXT);
        $this->assertEquals(DateFunctions::getNextEndOfMonthQuiet(static::SOME_NUMBER), static::SOME_NUMBER);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNextEndOfMonthExceptionNullValue()
    {
        $this->assertTrue(DateFunctions::getNextEndOfMonth(static::NULL_VALUE));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNextEndOfMonthExceptionEmptyString()
    {
        $this->assertTrue(DateFunctions::getNextEndOfMonth(static::EMPTY_STRING));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNextEndOfMonthExceptionSomeText()
    {
        $this->assertTrue(DateFunctions::getNextEndOfMonth(static::SOME_TEXT));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNextEndOfMonthExceptionSomeNumber()
    {
        $this->assertTrue(DateFunctions::getNextEndOfMonth(static::SOME_NUMBER));
    }

    public function testGetRemainingDays()
    {
        $this->assertEquals(DateFunctions::getRemainingDays($this->now), 0);

        $this->assertEquals(DateFunctions::getRemainingDays($this->futureDate1), 1);
        $this->assertEquals(DateFunctions::getRemainingDays($this->futureDate2), 31);

        $this->assertEquals(DateFunctions::getRemainingDays($this->pastDate1), -1);
        $this->assertEquals(DateFunctions::getRemainingDays($this->pastDate2), -31);
    }

    public function testGetRemainingDaysQuiet()
    {
        $this->assertEquals(DateFunctions::getRemainingDaysQuiet(static::NULL_VALUE), static::NULL_VALUE);
        $this->assertEquals(DateFunctions::getRemainingDaysQuiet(static::EMPTY_STRING), static::EMPTY_STRING);
        $this->assertEquals(DateFunctions::getRemainingDaysQuiet(static::SOME_TEXT), static::SOME_TEXT);
        $this->assertEquals(DateFunctions::getRemainingDaysQuiet(static::SOME_NUMBER), static::SOME_NUMBER);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetRemainingDaysExceptionNullValue()
    {
        $this->assertTrue(DateFunctions::getRemainingDays(static::NULL_VALUE));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetRemainingDaysExceptionEmptyString()
    {
        $this->assertTrue(DateFunctions::getRemainingDays(static::EMPTY_STRING));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetRemainingDaysExceptionSomeText()
    {
        $this->assertTrue(DateFunctions::getRemainingDays(static::SOME_TEXT));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetRemainingDaysExceptionSomeNumber()
    {
        $this->assertTrue(DateFunctions::getRemainingDays(static::SOME_NUMBER));
    }

    public function testIsFutureDate()
    {
        $this->assertTrue(DateFunctions::isFutureDate($this->futureDate1));
        $this->assertTrue(DateFunctions::isFutureDate($this->futureDate2));

        $this->assertFalse(DateFunctions::isFutureDate('now'));
        $this->assertFalse(DateFunctions::isFutureDate($this->now));
        $this->assertFalse(DateFunctions::isFutureDate($this->pastDate1));
        $this->assertFalse(DateFunctions::isFutureDate($this->pastDate2));
    }

    public function testIsFutureDateQuiet()
    {
        $this->assertEquals(DateFunctions::isFutureDateQuiet(static::NULL_VALUE), static::NULL_VALUE);
        $this->assertEquals(DateFunctions::isFutureDateQuiet(static::EMPTY_STRING), static::EMPTY_STRING);
        $this->assertEquals(DateFunctions::isFutureDateQuiet(static::SOME_TEXT), static::SOME_TEXT);
        $this->assertEquals(DateFunctions::isFutureDateQuiet(static::SOME_NUMBER), static::SOME_NUMBER);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsFutureDateExceptionNullValue()
    {
        $this->assertTrue(DateFunctions::isFutureDate(static::NULL_VALUE));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsFutureDateExceptionEmptyString()
    {
        $this->assertTrue(DateFunctions::isFutureDate(static::EMPTY_STRING));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsFutureDateExceptionSomeText()
    {
        $this->assertTrue(DateFunctions::isFutureDate(static::SOME_TEXT));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsFutureDateExceptionSomeNumber()
    {
        $this->assertTrue(DateFunctions::isFutureDate(static::SOME_NUMBER));
    }

    public function testIsPastDate()
    {
        $this->assertTrue(DateFunctions::isPastDate($this->pastDate1));
        $this->assertTrue(DateFunctions::isPastDate($this->pastDate2));

        $this->assertFalse(DateFunctions::isPastDate('now'));
        $this->assertFalse(DateFunctions::isPastDate($this->now));
        $this->assertFalse(DateFunctions::isPastDate($this->futureDate1));
        $this->assertFalse(DateFunctions::isPastDate($this->futureDate2));
    }

    public function testIsPastDateQuiet()
    {
        $this->assertEquals(DateFunctions::isPastDateQuiet(static::NULL_VALUE), static::NULL_VALUE);
        $this->assertEquals(DateFunctions::isPastDateQuiet(static::EMPTY_STRING), static::EMPTY_STRING);
        $this->assertEquals(DateFunctions::isPastDateQuiet(static::SOME_TEXT), static::SOME_TEXT);
        $this->assertEquals(DateFunctions::isPastDateQuiet(static::SOME_NUMBER), static::SOME_NUMBER);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsPastDateExceptionNullValue()
    {
        $this->assertTrue(DateFunctions::isPastDate(static::NULL_VALUE));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsPastDateExceptionEmptyString()
    {
        $this->assertTrue(DateFunctions::isPastDate(static::EMPTY_STRING));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsPastDateExceptionSomeText()
    {
        $this->assertTrue(DateFunctions::isPastDate(static::SOME_TEXT));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsPastDateExceptionSomeNumber()
    {
        $this->assertTrue(DateFunctions::isPastDate(static::SOME_NUMBER));
    }
}
