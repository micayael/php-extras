<?php

if (!function_exists('array_filter_recursive')) {

    function array_filter_recursive($data)
    {
        foreach ($data as &$value) {
            if (is_array($value)) {
                $value = array_filter_recursive($value);
            }
        }

        return array_filter($data);
    }

}