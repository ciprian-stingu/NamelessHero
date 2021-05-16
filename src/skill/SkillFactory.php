<?php


namespace skill;


/**
 * Class SkillFactory
 * @package skill
 */
final class SkillFactory
{
    public static function getSkill(int $skillType) : ISkill
    {
        switch($skillType)
        {
            case ISkill::DEFENCE:
                return new Armourer();
            case ISkill::ATTACK:
                return new Offence();
            default:
                throw new \Exception("Unknown skill!");
        }
    }
}