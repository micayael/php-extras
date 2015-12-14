<?php

namespace Micayael\PHPExtras\Functions;

class DateFunctions
{
    public static function getSanitizedDate($date)
    {
        return getSanitizedDate($date);
    }

    public static function getSanitizedTime($time)
    {
        return getSanitizedTime($time);
    }

    public static function getSanitizedDateTime($date)
    {
        return getSanitizedDateTime($date);
    }

    public static function getNextEndOfMonth($date = 'now')
    {
        return getNextEndOfMonth($date);
    }

    public static function getNextSaturday()
    {
        return getNextSaturday();
    }

    public static function getEndOfYear()
    {
        return getEndOfYear();
    }

    public static function getRemainingDays($futureDate)
    {
        return getRemainingDays($futureDate);
    }

    public static function isFutureDate($date)
    {
        return isFutureDate($date);
    }

    public static function isPastDate($date)
    {
        return isPastDate($date);
    }
}
