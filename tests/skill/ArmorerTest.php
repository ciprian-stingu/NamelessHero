<?php declare(strict_types=1);


namespace tests\skill;

use PHPUnit\Framework\TestCase;
use skill\Armourer;
use skill\ISkill;

final class ArmorerTest extends TestCase
{
    protected Armourer $_skill;

    protected function setUp() : void
    {
        $this->_skill = new Armourer();
    }

    public function testArmourerShouldHaveGreaterThanZeroValue()
    {
        $this->assertGreaterThan(0, $this->_skill->getValue());
    }

    public function testArmourerShouldHaveValidProbabilityValue()
    {
        $probability = $this->_skill->getProbability();
        $this->assertGreaterThanOrEqual(0, $probability);
        $this->assertLessThan(100, $probability);
    }

    public function testArmourerShouldHaveNotEmptyName()
    {
        $this->assertNotEmpty($this->_skill->getValue());
    }

    public function testArmourerShouldHaveValidType()
    {
        $this->assertEquals(ISkill::DEFENCE, $this->_skill->getType());
    }
}