<?php declare(strict_types=1);


namespace tests\screen;

use graphic\Griffin;
use PHPUnit\Framework\TestCase;
use screen\IScreen;
use screen\Screen;

final class ScreenTest extends TestCase
{
    protected Screen $_screen;

    protected function setUp() : void
    {
        $this->_screen = new Screen(40, 30);
    }

    public function testAddWithInvalidHeight()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(IScreen::INVALID_HEIGHT);

        $object = new Griffin();
        $this->_screen->add(1, 25, $object);
    }

    public function testAddWithInvalidWidth()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(IScreen::INVALID_WIDTH);

        $object = new Griffin();
        $this->_screen->add(30, 1, $object);
    }

    public function testValidAdd()
    {
        $object = new Griffin();
        $this->assertNull($this->_screen->add(1, 1, $object));
    }

    public function testOutput()
    {
        $object = new Griffin();
        $this->_screen->add(1, 1, $object);
        $this->_screen->update();

        $output = $this->getActualOutput();
        $this->assertGreaterThan(0, strpos($output, $object->getData()[2]));
    }
}