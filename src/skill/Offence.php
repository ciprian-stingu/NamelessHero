<?php


namespace skill;

use utils\Utils;

/**
 * Class Offence - attack skill
 * @package skill
 */
final class Offence extends BaseSkill implements ISkill
{
    private const ATTACK_VALUE = 15;

    public function __construct()
    {
        $this->_name = 'Offence';
        $this->_probability = Utils::getRandomFloat();
        $this->_value = self::ATTACK_VALUE;
    }

    public function getType(): int
    {
        return self::ATTACK;
    }
}