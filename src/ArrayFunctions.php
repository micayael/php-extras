<?php

namespace Micayael\PHPExtras;

class ArrayFunctions
{
    static public function ArrayFilterRecursive($array)
    {
        foreach ($data as &$value) {
            if (is_array($value)) {
                $value = array_filter_recursive($value);
            }
        }

        return array_filter($data);
    }
}