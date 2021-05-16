<?php declare(strict_types=1);


namespace tests\actor;

use actor\Batman;
use actor\IActor;
use PHPUnit\Framework\TestCase;

final class BatmanTest extends TestCase
{
    protected Batman $_batman;

    protected function setUp() : void
    {
        $this->_batman = new Batman();
    }

    public function testHasValidType()
    {
        $this->assertEquals(IActor::BATMAN, $this->_batman->getType());
    }

    public function testHasValidName()
    {
        $this->assertNotEmpty($this->_batman->getName());
    }

    public function testHasValidHealth()
    {
        $health = $this->_batman->getHealth();
        $this->assertLessThan(100, $health);
        $this->assertGreaterThan(0, $health);
    }

    public function testHasValidStrength()
    {
        $this->assertGreaterThanOrEqual(1, $this->_batman->getStrength());
    }

    public function testHasValidDefence()
    {
        $this->assertGreaterThanOrEqual(1, $this->_batman->getDefence());
    }

    public function testHasValidLuck()
    {
        $luck = $this->_batman->getLuck();
        $this->assertLessThanOrEqual(100, $luck);
        $this->assertGreaterThanOrEqual(1, $luck);
    }
}