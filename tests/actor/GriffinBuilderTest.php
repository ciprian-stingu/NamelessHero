<?php declare(strict_types=1);


namespace tests\actor;

use actor\ActorDirector;
use actor\Griffin;
use actor\GriffinBuilder;
use PHPUnit\Framework\TestCase;
use screen\InfoWindow;

final class GriffinBuilderTest extends TestCase
{
    public function testBuild()
    {
        $griffinBuilder = new GriffinBuilder();
        $this->assertInstanceOf(GriffinBuilder::class, $griffinBuilder);

        $actorDirector = new ActorDirector();
        $this->assertInstanceOf(ActorDirector::class, $actorDirector);

        $griffin = $actorDirector->build($griffinBuilder);
        $this->assertInstanceOf(Griffin::class, $griffin);
    }

    public function testExistenceOfBuildedAttributes()
    {
        $griffin = (new ActorDirector())->build(new GriffinBuilder());

        $this->assertInstanceOf(\graphic\Griffin::class, $griffin->getGraphic());
        $this->assertInstanceOf(InfoWindow::class, $griffin->getInfo());
        $this->assertIsArray($griffin->getSkills());
        $this->assertLessThanOrEqual(2, count($griffin->getSkills()));
    }
}