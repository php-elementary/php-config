<?php

namespace elementary\config\Test\Loaders;

use PHPUnit\Framework\TestCase;
use UnexpectedValueException;
use elementary\config\Phpconfig\Phpconfig;

/**
 * @coversDefaultClass \elementary\config\Phpconfig\Phpconfig
 */
class PhpconfigTest extends TestCase
{
    /**
     * @test
     * @covers ::loadFile()
     */
    public function load()
    {
        fwrite(STDOUT, "\n". __METHOD__);

        $loader = new Phpconfig();
        $this->assertEquals(['test' => 1234], $loader->loadFile(__DIR__ . '/mocks/array.php'));
    }

    /**
     * @test
     * @expectedException UnexpectedValueException
     * @covers ::loadFile()
     */
    public function loadBad()
    {
        fwrite(STDOUT, "\n". __METHOD__);

        $loader = new Phpconfig();
        $loader->loadFile(__DIR__ . '/mocks/string.php');
    }

    /**
     * @test
     * @expectedException \elementary\config\Phpconfig\Exceptions\LoadException
     * @covers ::loadFile()
     */
    public function loadException()
    {
        fwrite(STDOUT, "\n". __METHOD__);

        $loader = new Phpconfig();
        $loader->loadFile(__DIR__ . '/mocks/exception.php');
    }
}
