<?php

namespace Micayael\PHPExtras\Functions;

class StringFunctions
{
    public static function highlight($text, $words, $class = 'highlight')
    {
        return highlight($text, $words, $class);
    }

    public static function lipsum($length)
    {
        return lipsum($length);
    }

    public static function slugify($string)
    {
        return slugify($string);
    }

    public static function sanitizeFilename($filename)
    {
        return sanitizeFilename($filename);
    }

    public static function hideEmail($email)
    {
        return hideEmail($email);
    }

    public static function hideEmailQuiet($email)
    {
        try {
            return hideEmail($email);
        } catch (\InvalidArgumentException $e) {
            return $email;
        }
    }
}
