<?php declare(strict_types=1);

namespace tests\screen;

use PHPUnit\Framework\TestCase;
use screen\Screen;
use screen\ScreenFactory;

final class ScreenFactoryTest extends TestCase
{
    public function testCreate()
    {
        $screen = ScreenFactory::createScreen();

        $this->assertInstanceOf(Screen::class, $screen);
    }
}