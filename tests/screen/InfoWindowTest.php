<?php declare(strict_types=1);


namespace tests\screen;

use graphic\IGraphicObject;
use PHPUnit\Framework\TestCase;
use screen\IInfoWindow;
use screen\InfoWindow;

final class InfoWindowTest extends TestCase
{
    protected IInfoWindow $_info;

    protected function setUp(): void
    {
        $this->_info = new InfoWindow(10, 5);
    }

    public function testWidth()
    {
        $this->assertEquals(10, $this->_info->getWidth());
    }

    public function testHeight()
    {
        $this->assertEquals(5, $this->_info->getHeight());
    }

    public function testData()
    {
        $this->assertNotEmpty($this->_info->getData());
    }

    public function testGraphicType()
    {
        $this->assertInstanceOf(IGraphicObject::class, $this->_info->getGraphic());
    }

    public function testClear()
    {
        $this->_info->clear();

        $data = join('', $this->_info->getData());
        $this->assertEquals("+--------+|        ||        ||        |+--------+", $data);
    }

    public function testAddLineAndScroll()
    {
        $this->_info->clear();
        for($i = 0; $i < 10; $i++) {
            $this->_info->addLine("1234567890");
        }
        $this->_info->addLine("9876543210");

        $data = join('', $this->_info->getData());
        $this->assertEquals("+--------+|12345678||12345678||98765432|+--------+", $data);
    }
}