<?php


namespace actor;


use screen\IInfoWindow;
use screen\InfoWindowFactory;
use skill\ISkill;
use skill\SkillFactory;
use utils\Utils;

/**
 * Class CentaurBuilder
 * will build the centaur actor
 */
final class CentaurBuilder implements IActorBuilder
{
    private Centaur $_centaur;
    private const PROBABILITY = 25;

    public function createActor()
    {
        $this->_centaur = new Centaur();
    }

    public function addGraphic()
    {
        $this->_centaur->addGraphic(new \graphic\Centaur());
    }

    public function addSkills()
    {
        if(self::PROBABILITY >= Utils::getRandomInt()) {
            $this->_centaur->addSkill(SkillFactory::getSkill(ISkill::ATTACK));
        }

        if(self::PROBABILITY >= Utils::getRandomInt()) {
            $this->_centaur->addSkill(SkillFactory::getSkill(ISkill::DEFENCE));
        }
    }

    public function getActor(): IActor
    {
        return $this->_centaur;
    }

    public function addInfo()
    {
        $this->_centaur->addInfo(InfoWindowFactory::getInfoWindow(IInfoWindow::ACTOR));
        $this->_centaur->updateStats();
    }
}