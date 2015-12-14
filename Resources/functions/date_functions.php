<?php

define('DATE_REGEX', '/\d{4}-\d{2}-\d{2}/');
define('TIME_REGEX', '/\d{2}:\d{2}:\d{2}(\.{1}\d+)?/');
define('DATETIME_REGEX', '/(\d{4}-\d{2}-\d{2}){1}\ (\d{2}:\d{2}:\d{2}(\.{1}\d+)?){1}?/');

define('DATE_FORMAT', 'Y-m-d');
define('TIME_FORMAT', 'H:i:s');
define('DATETIME_FORMAT', 'Y-m-d H:i:s');

if (!function_exists('getSanitizedDate')) {
    function getSanitizedDate($date)
    {
        $date = $date === 'now' ? date(DATE_FORMAT) : $date;

        if (!preg_match(DATE_REGEX, $date, $matches)) {
            return false;
        } else {
            return $matches[0];
        }
    }
}

if (!function_exists('getSanitizedTime')) {
    function getSanitizedTime($date)
    {
        $date = $date === 'now' ? date(TIME_FORMAT) : $date;

        if (!preg_match(TIME_REGEX, $date, $matches)) {
            return false;
        } else {
            return $matches[0];
        }
    }
}

if (!function_exists('getSanitizedDateTime')) {
    function getSanitizedDateTime($date)
    {
        $date = $date === 'now' ? date(DATETIME_FORMAT) : $date;

        if (!preg_match(DATETIME_REGEX, $date, $matches)) {
            return false;
        } else {
            return $matches[0];
        }
    }
}

if (!function_exists('getNextEndOfMonth')) {
    function getNextEndOfMonth($date = 'now')
    {
        if (!($date = getSanitizedDate($date))) {
            throw new \InvalidArgumentException(
                sprintf('$date argument [%s] does not match correct format [%s]', $date, DATE_REGEX)
            );
        }

        return date('Y-m-t', strtotime($date));
    }
}

if (!function_exists('getNextSaturday')) {
    function getNextSaturday()
    {
        $ts = strtotime('next saturday');

        return date('Y-m-d', $ts);
    }
}

if (!function_exists('getEndOfYear')) {
    function getEndOfYear()
    {
        return date('Y').'-12-'.date('t');
    }
}

if (!function_exists('getRemainingDays')) {
    function getRemainingDays($futureDate)
    {
        if (!($date = getSanitizedDate($futureDate))) {
            throw new \InvalidArgumentException(
                sprintf('$date argument [%s] does not match correct format [%s]', $date, DATE_REGEX)
            );
        }

        $now = date('Y-m-d');
        $s = strtotime($date) - strtotime($now);
        $remaining = intval($s / 86400);

        return $remaining;
    }
}

if (!function_exists('isFutureDate')) {
    function isFutureDate($date)
    {
        if (!($date = getSanitizedDate($date))) {
            throw new \InvalidArgumentException(
                sprintf('$date argument [%s] does not match correct format [%s]', $date, DATE_REGEX)
            );
        }

        if (getRemainingDays($date) > 0) {
            return true;
        }

        return false;
    }
}

if (!function_exists('isPastDate')) {
    function isPastDate($date)
    {
        if (!($date = getSanitizedDate($date))) {
            throw new \InvalidArgumentException(
                sprintf('$date argument [%s] does not match correct format [%s]', $date, DATE_REGEX)
            );
        }

        if (getRemainingDays($date) < 0) {
            return true;
        }

        return false;
    }
}
