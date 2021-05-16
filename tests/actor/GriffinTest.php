<?php declare(strict_types=1);


namespace tests\actor;

use actor\Griffin;
use actor\IActor;
use PHPUnit\Framework\TestCase;

final class GriffinTest extends TestCase
{
    protected Griffin $_griffin;

    protected function setUp() : void
    {
        $this->_griffin = new Griffin();
    }

    public function testHasValidType()
    {
        $this->assertEquals(IActor::GRIFFIN, $this->_griffin->getType());
    }

    public function testHasValidName()
    {
        $this->assertNotEmpty($this->_griffin->getName());
    }

    public function testHasValidHealth()
    {
        $health = $this->_griffin->getHealth();
        $this->assertLessThan(100, $health);
        $this->assertGreaterThan(0, $health);
    }

    public function testHasValidStrength()
    {
        $this->assertGreaterThanOrEqual(1, $this->_griffin->getStrength());
    }

    public function testHasValidDefence()
    {
        $this->assertGreaterThanOrEqual(1, $this->_griffin->getDefence());
    }

    public function testHasValidLuck()
    {
        $luck = $this->_griffin->getLuck();
        $this->assertLessThanOrEqual(100, $luck);
        $this->assertGreaterThanOrEqual(1, $luck);
    }
}