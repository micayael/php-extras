<?php

if (!function_exists('createTable')) {
    function createTable(array $data)
    {
        if (empty($data)) {
            return;
        }

        $ret = '<table border="1">';

        foreach ($data as $row) {
            $ret .= '<tr>';

            foreach ($row as $column) {
                $ret .= '<td>'.$column.'</td>';
            }

            $ret .= '</tr>';
        }

        $ret .= '</table>';

        return $ret;
    }
}

if (!function_exists('nl2p')) {
    function nl2p($txt)
    {
        if (!$txt) {
            return;
        }

        $paragraphs = '';

        foreach (explode(PHP_EOL, $txt) as $line) {
            if (trim($line)) {
                $paragraphs .= '<p>'.$line.'</p>';
            }
        }

        return $paragraphs;
    }
}
