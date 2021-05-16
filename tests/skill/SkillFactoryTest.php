<?php declare(strict_types=1);


namespace tests\skill;

use PHPUnit\Framework\TestCase;
use skill\Armourer;
use skill\ISkill;
use skill\Offence;
use skill\SkillFactory;

final class SkillFactoryTest extends TestCase
{
    public function testGetSkillArmourer()
    {
        $this->assertInstanceOf(Armourer::class, SkillFactory::getSkill(ISkill::DEFENCE));
    }

    public function testGetSkillOffence()
    {
        $this->assertInstanceOf(Offence::class, SkillFactory::getSkill(ISkill::ATTACK));
    }

    public function testCantCreateFromInvalidType()
    {
        $this->expectException(\Exception::class);
        SkillFactory::getSkill(0);
    }
}