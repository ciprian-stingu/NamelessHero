<?php declare(strict_types=1);


namespace tests\skill;

use PHPUnit\Framework\TestCase;
use skill\ISkill;
use skill\Offence;

final class OffenceTest extends TestCase
{
    protected Offence $_skill;

    protected function setUp() : void
    {
        $this->_skill = new Offence();
    }

    public function testOffenceShouldHaveGreaterThanZeroValue()
    {
        $this->assertGreaterThan(0, $this->_skill->getValue());
    }

    public function testOffenceShouldHaveValidProbabilityValue()
    {
        $probability = $this->_skill->getProbability();
        $this->assertGreaterThanOrEqual(0, $probability);
        $this->assertLessThan(100, $probability);
    }

    public function testOffenceShouldHaveNotEmptyName()
    {
        $this->assertNotEmpty($this->_skill->getValue());
    }

    public function testOffenceShouldHaveValidType()
    {
        $this->assertEquals(ISkill::ATTACK, $this->_skill->getType());
    }
}