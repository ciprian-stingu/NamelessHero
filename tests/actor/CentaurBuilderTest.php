<?php declare(strict_types=1);


namespace tests\actor;

use actor\ActorDirector;
use actor\Centaur;
use actor\CentaurBuilder;
use PHPUnit\Framework\TestCase;
use screen\InfoWindow;

final class CentaurBuilderTest extends TestCase
{
    public function testBuild()
    {
        $centaurBuilder = new CentaurBuilder();
        $this->assertInstanceOf(CentaurBuilder::class, $centaurBuilder);

        $actorDirector = new ActorDirector();
        $this->assertInstanceOf(ActorDirector::class, $actorDirector);

        $centaur= $actorDirector->build($centaurBuilder);
        $this->assertInstanceOf(Centaur::class, $centaur);
    }

    public function testExistenceOfBuildedAttributes()
    {
        $centaur = (new ActorDirector())->build(new CentaurBuilder());

        $this->assertInstanceOf(\graphic\Centaur::class, $centaur->getGraphic());
        $this->assertInstanceOf(InfoWindow::class, $centaur->getInfo());
        $this->assertIsArray($centaur->getSkills());
        $this->assertLessThanOrEqual(2, count($centaur->getSkills()));
    }
}