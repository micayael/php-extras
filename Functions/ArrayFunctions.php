<?php

namespace Micayael\PHPExtras\Functions;

class ArrayFunctions
{
    static public function ArrayFilterRecursive($data)
    {
        foreach ($data as &$value) {
            if (is_array($value)) {
                $value = array_filter_recursive($value);
            }
        }

        return array_filter($data);
    }
}