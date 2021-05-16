<?php declare(strict_types=1);


namespace tests\actor;

use actor\Centaur;
use actor\IActor;
use PHPUnit\Framework\TestCase;

final class CentaurTest extends TestCase
{
    protected Centaur $_centaur;

    protected function setUp() : void
    {
        $this->_centaur = new Centaur();
    }

    public function testHasValidType()
    {
        $this->assertEquals(IActor::CENTAUR, $this->_centaur->getType());
    }

    public function testHasValidName()
    {
        $this->assertNotEmpty($this->_centaur->getName());
    }

    public function testHasValidHealth()
    {
        $health = $this->_centaur->getHealth();
        $this->assertLessThan(100, $health);
        $this->assertGreaterThan(0, $health);
    }

    public function testHasValidStrength()
    {
        $this->assertGreaterThanOrEqual(1, $this->_centaur->getStrength());
    }

    public function testHasValidDefence()
    {
        $this->assertGreaterThanOrEqual(1, $this->_centaur->getDefence());
    }

    public function testHasValidLuck()
    {
        $luck = $this->_centaur->getLuck();
        $this->assertLessThanOrEqual(100, $luck);
        $this->assertGreaterThanOrEqual(1, $luck);
    }
}