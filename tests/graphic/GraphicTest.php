<?php declare(strict_types=1);

namespace tests\graphic;

use graphic\Batman;
use graphic\Castle;
use graphic\Centaur;
use graphic\Griffin;
use graphic\Prompt;
use PHPUnit\Framework\TestCase;

final class GraphicTest extends TestCase
{
    public function testBatman()
    {
        $object = new Batman();

        $this->assertInstanceOf(Batman::class, $object);
        $this->assertNotEmpty($object->getData());
        $this->assertGreaterThan(0, $object->getWidth());
        $this->assertGreaterThan(0, $object->getHeight());
    }

    public function testCastle()
    {
        $object = new Castle();

        $this->assertInstanceOf(Castle::class, $object);
        $this->assertNotEmpty($object->getData());
        $this->assertGreaterThan(0, $object->getWidth());
        $this->assertGreaterThan(0, $object->getHeight());
    }

    public function testCentaur()
    {
        $object = new Centaur();

        $this->assertInstanceOf(Centaur::class, $object);
        $this->assertNotEmpty($object->getData());
        $this->assertGreaterThan(0, $object->getWidth());
        $this->assertGreaterThan(0, $object->getHeight());
    }

    public function testGriffin()
    {
        $object = new Griffin();

        $this->assertInstanceOf(Griffin::class, $object);
        $this->assertNotEmpty($object->getData());
        $this->assertGreaterThan(0, $object->getWidth());
        $this->assertGreaterThan(0, $object->getHeight());
    }

    public function testPrompt()
    {
        $object = new Prompt();

        $this->assertInstanceOf(Prompt::class, $object);
        $this->assertNotEmpty($object->getData());
        $this->assertGreaterThan(0, $object->getWidth());
        $this->assertGreaterThan(0, $object->getHeight());
    }
}