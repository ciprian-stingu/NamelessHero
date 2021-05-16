<?php


namespace skill;

use utils\Utils;

/**
 * Class Armourer - defence skill
 * @package skill
 */
final class Armourer extends BaseSkill implements ISkill
{
    private const DEFENCE_VALUE = 10;

    public function __construct()
    {
        $this->_name = 'Armourer';
        $this->_probability = Utils::getRandomFloat();
        $this->_value = self::DEFENCE_VALUE;
    }

    public function getType(): int
    {
        return self::DEFENCE;
    }
}