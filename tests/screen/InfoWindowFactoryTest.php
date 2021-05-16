<?php declare(strict_types=1);


namespace tests\screen;

use PHPUnit\Framework\TestCase;
use screen\IInfoWindow;
use screen\InfoWindow;
use screen\InfoWindowFactory;

final class InfoWindowFactoryTest extends TestCase
{
    public function testActorWindow()
    {
        $info = InfoWindowFactory::getInfoWindow(IInfoWindow::ACTOR);

        $this->assertInstanceOf(InfoWindow::class, $info);
    }

    public function testMainWindow()
    {
        $info = InfoWindowFactory::getInfoWindow(IInfoWindow::MAIN);

        $this->assertInstanceOf(InfoWindow::class, $info);
    }

    public function testInvalidWindowType()
    {
        $this->expectException(\Exception::class);
        InfoWindowFactory::getInfoWindow(0);
    }
}