<?php

namespace Micayael\PHPExtras\Tests;

use Micayael\PHPExtras\Functions\ArrayFunctions;

/**
 * @author Juan Ardissone (micayael) <micayael@gmail.com>
 */
class ArrayFilterRecursiveTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayEnumerado()
    {
        $data = ArrayFunctions::ArrayFilterRecursive(
            array(
                0 => 'foo',
                1 => false,
                2 => -1,
                3 => null,
                4 => '',
            )
        );

        $expectedData = array(
            0 => 'foo',
            2 => -1,
        );

        $this->assertEquals($data, $expectedData);
    }

    public function testArrayAsociativo()
    {
        $data = ArrayFunctions::ArrayFilterRecursive(
            array(
                'k0' => 'foo',
                'k1' => false,
                'k2' => -1,
                'k3' => null,
                'k4' => '',
            )
        );

        $expectedData = array(
            'k0' => 'foo',
            'k2' => -1,
        );

        $this->assertEquals($data, $expectedData);
    }

    public function testArrayMixto()
    {
        $data = ArrayFunctions::ArrayFilterRecursive(
            array(
                0 => 'foo',
                1 => false,
                2 => -1,
                3 => null,
                4 => '',
                'k0' => 'foo',
                'k1' => false,
                'k2' => -1,
                'k3' => null,
                'k4' => '',
            )
        );

        $expectedData = array(
            0 => 'foo',
            2 => -1,
            'k0' => 'foo',
            'k2' => -1,
        );

        $this->assertEquals($data, $expectedData);
    }

    public function testArrayMultidimensional()
    {
        $data = ArrayFunctions::ArrayFilterRecursive(
            array(
                0 => 'foo',
                1 => false,
                2 => -1,
                3 => null,
                4 => '',
                5 => array(
                    'k0' => 'foo',
                    'k1' => false,
                    'k2' => -1,
                    'k3' => null,
                    'k4' => '',
                    'k5' => array(
                        0 => 'foo',
                        1 => false,
                        2 => -1,
                        3 => null,
                        4 => '',
                    ),
                ),
                'k0' => 'foo',
                'k1' => false,
                'k2' => -1,
                'k3' => null,
                'k4' => '',
                'k5' => array(
                    0 => 'foo',
                    1 => false,
                    2 => -1,
                    3 => null,
                    4 => '',
                    5 => array(
                        'k0' => 'foo',
                        'k1' => false,
                        'k2' => -1,
                        'k3' => null,
                        'k4' => '',
                    ),
                ),
            )
        );

        $expectedData = array(
            0 => 'foo',
            2 => -1,
            5 => array(
                'k0' => 'foo',
                'k2' => -1,
                'k5' => array(
                    0 => 'foo',
                    2 => -1,
                ),
            ),
            'k0' => 'foo',
            'k2' => -1,
            'k5' => array(
                0 => 'foo',
                2 => -1,
                5 => array(
                    'k0' => 'foo',
                    'k2' => -1,
                ),
            ),

        );

        $this->assertEquals($data, $expectedData);
    }
}
