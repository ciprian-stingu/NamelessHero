<?php


namespace actor;


use utils\Utils;

/**
 * Class Centaur - a monster
 * @package actor
 */
final class Centaur extends BaseActor implements IActor
{
    public function __construct()
    {
        $this->_health = Utils::getRandomFloat();
        $this->_strength = Utils::getRandomInt(1, 100);
        $this->_defence = Utils::getRandomInt(1, 100);
        $this->_luck = Utils::getRandomInt(1, 100);
        $this->_skills = [];
        $this->_name = 'Centaur';
    }

    public function getType(): int
    {
        return self::CENTAUR;
    }
}