<?php


namespace actor;


use screen\IInfoWindow;
use screen\InfoWindowFactory;
use skill\ISkill;
use skill\SkillFactory;
use utils\Utils;

/**
 * Class GriffinBuilder
 * will build the complete griffin actor
 */
final class GriffinBuilder implements IActorBuilder
{
    private Griffin $_griffin;
    private const PROBABILITY = 50;

    public function createActor()
    {
        $this->_griffin = new Griffin();
    }

    public function addGraphic()
    {
        $this->_griffin->addGraphic(new \graphic\Griffin());
    }

    public function addSkills()
    {
        if(self::PROBABILITY >= Utils::getRandomInt()) {
            $this->_griffin->addSkill(SkillFactory::getSkill(ISkill::ATTACK));
        }

        if(self::PROBABILITY >= Utils::getRandomInt()) {
            $this->_griffin->addSkill(SkillFactory::getSkill(ISkill::DEFENCE));
        }
    }

    public function getActor(): IActor
    {
        return $this->_griffin;
    }

    public function addInfo()
    {
        $this->_griffin->addInfo(InfoWindowFactory::getInfoWindow(IInfoWindow::ACTOR));
        $this->_griffin->updateStats();
    }
}