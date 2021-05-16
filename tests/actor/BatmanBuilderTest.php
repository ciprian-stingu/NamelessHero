<?php declare(strict_types=1);


namespace tests\actor;

use actor\ActorDirector;
use actor\Batman;
use actor\BatmanBuilder;
use PHPUnit\Framework\TestCase;
use screen\InfoWindow;

final class BatmanBuilderTest extends TestCase
{
    public function testBuild()
    {
        $batmanBuilder = new BatmanBuilder();
        $this->assertInstanceOf(BatmanBuilder::class, $batmanBuilder);

        $actorDirector = new ActorDirector();
        $this->assertInstanceOf(ActorDirector::class, $actorDirector);

        $batman = $actorDirector->build($batmanBuilder);
        $this->assertInstanceOf(Batman::class, $batman);
    }

    public function testExistenceOfBuildedAttributes()
    {
        $batman = (new ActorDirector())->build(new BatmanBuilder());

        $this->assertInstanceOf(\graphic\Batman::class, $batman->getGraphic());
        $this->assertInstanceOf(InfoWindow::class, $batman->getInfo());
        $this->assertIsArray($batman->getSkills());
        $this->assertLessThanOrEqual(2, count($batman->getSkills()));
    }
}