<?php

namespace Micayael\PHPExtras\Tests;

use Micayael\PHPExtras\Functions\ArrayFunctions;

/**
 * @author Juan Ardissone (micayael) <micayael@gmail.com>
 */
class ArrayFunctionsTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayFilterRecursive()
    {
        $data = array(
            0 => 'foo',
            1 => false,
            2 => -1,
            3 => null,
            4 => ''
        );

        print_r(ArrayFunctions::ArrayFilterRecursive($data));

        $this->assertTrue(true);
    }
}