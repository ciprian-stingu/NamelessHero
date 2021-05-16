<?php


namespace actor;


use screen\IInfoWindow;
use screen\InfoWindowFactory;
use skill\ISkill;
use skill\SkillFactory;
use utils\Utils;

/**
 * Class BatmanBuilder
 * will build the batman actor
 */
final class BatmanBuilder implements IActorBuilder
{
    private Batman $_batman;
    private const PROBABILITY = 75;

    public function createActor()
    {
        $this->_batman = new Batman();
    }

    public function addGraphic()
    {
        $this->_batman->addGraphic(new \graphic\Batman());
    }

    public function addSkills()
    {
        if(self::PROBABILITY >= Utils::getRandomInt()) {
            $this->_batman->addSkill(SkillFactory::getSkill(ISkill::ATTACK));
        }

        if(self::PROBABILITY >= Utils::getRandomInt()) {
            $this->_batman->addSkill(SkillFactory::getSkill(ISkill::DEFENCE));
        }
    }

    public function getActor(): IActor
    {
        return $this->_batman;
    }

    public function addInfo()
    {
        $this->_batman->addInfo(InfoWindowFactory::getInfoWindow(IInfoWindow::ACTOR));
        $this->_batman->updateStats();
    }
}
