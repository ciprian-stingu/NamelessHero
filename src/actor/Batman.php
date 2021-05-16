<?php


namespace actor;


use utils\Utils;

/**
 * Class Batman - the hero
 * @package actor
 */
final class Batman extends BaseActor implements IActor
{
    public function __construct()
    {
        $this->_health = Utils::getRandomFloat();
        $this->_strength = Utils::getRandomInt(1, 100);
        $this->_defence = Utils::getRandomInt(1, 100);
        $this->_luck = Utils::getRandomInt(1, 100);
        $this->_skills = [];
        $this->_name = 'Batman';
    }

    public function getType(): int
    {
        return self::BATMAN;
    }

    /**
     * the hero can increase his defence in game
     * @return int
     */
    public function increaseDefence() : int
    {
        $additionalDefence = intval(Utils::getRandomInt() / 20);
        if($additionalDefence <= 0) {
            $additionalDefence = 1;
        }
        $this->_defence += $additionalDefence;

        if($this->_defence >= 100)
        {
            $this->_defence = 100;
            $this->updateStats();
            return 0;
        }

        $this->updateStats();
        return $additionalDefence;
    }
}