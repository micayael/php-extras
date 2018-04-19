<?php

namespace Micayael\PHPExtras\Tests;

use Micayael\PHPExtras\Functions\HtmlFunctions;
use Micayael\PHPExtras\Functions\StringFunctions;
use PHPUnit\Framework\TestCase;

/**
 * @author Juan Ardissone (micayael) <micayael@gmail.com>
 */
class HtmlFunctionsTest extends TestCase
{
    public function testCreateTable()
    {
        $data = array(
            array('Nombre', 'Apellido', 'Edad'),
            array('Nick', 'Fury', '50'),
            array('Maria', 'Hill', '35'),
            array('Phill', 'Coulson', '50'),
        );

        $this->assertEquals(
            HtmlFunctions::createTable($data),
            '<table border="1"><tr><td>Nombre</td><td>Apellido</td><td>Edad</td></tr><tr><td>Nick</td><td>Fury</td><td>50</td></tr><tr><td>Maria</td><td>Hill</td><td>35</td></tr><tr><td>Phill</td><td>Coulson</td><td>50</td></tr></table>'
        );
    }

    public function testNl2p()
    {
        $txt1 = '';
        $txt2 = '';

        for ($i = 0; $i < 10; ++$i) {
            $txt1 .= StringFunctions::lipsum(10).PHP_EOL;
            $txt2 .= '<p>'.StringFunctions::lipsum(10).'</p>';
        }

        $this->assertEquals(HtmlFunctions::nl2p($txt1), $txt2);
    }
}
