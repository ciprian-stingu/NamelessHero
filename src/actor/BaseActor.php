<?php


namespace actor;


use graphic\IGraphicObject;
use screen\IInfoWindow;
use skill\ISkill;
use utils\Utils;

abstract class BaseActor
{
    /**
     * actor internal stat
     */
    protected float $_health;
    protected int $_strength;
    protected int $_defence;
    protected int $_luck;
    protected string $_name;
    /**
     * @var array of ISkill
     */
    protected array $_skills;
    /**
     * @var IGraphicObject - the graphical representation for current actor
     */
    protected IGraphicObject $_graphic;
    /**
     * @var IInfoWindow - the info stats window
     */
    protected IInfoWindow $_infoWindow;

    public function getHealth(): float
    {
        return $this->_health;
    }

    /**
     * compute the strength based on skills
     * @return int
     */
    public function getStrength(): int
    {
        $currentStrength = $this->_strength;
        foreach($this->_skills as $skill)
        {
            if($skill->getType() == ISkill::ATTACK && $skill->getProbability() >= Utils::getRandomFloat()) {
                $currentStrength += $skill->getValue();
            }
        }

        return $currentStrength;
    }

    /**
     * compute defence based on skills
     * @return int
     */
    public function getDefence(): int
    {
        $currentDefence = $this->_defence;
        foreach($this->_skills as $skill)
        {
            if($skill->getType() == ISkill::DEFENCE && $skill->getProbability() >= Utils::getRandomFloat()) {
                $currentDefence += $skill->getValue();
            }
        }

        return $currentDefence;
    }

    public function getLuck(): int
    {
        return $this->_luck;
    }

    public function addGraphic(IGraphicObject $graphic)
    {
        $this->_graphic = $graphic;
    }

    public function getGraphic(): IGraphicObject
    {
        return $this->_graphic;
    }

    public function addSkill(ISkill $skill)
    {
        array_push($this->_skills, $skill);
    }

    public function getSkills() : array
    {
        return $this->_skills;
    }

    public function addInfo(IInfoWindow $infoWindow)
    {
        $this->_infoWindow = $infoWindow;
    }

    public function getInfo() : IGraphicObject
    {
        return $this->_infoWindow->getGraphic();
    }

    /**
     * update window stats
     */
    public function updateStats()
    {
        $this->_infoWindow->clear();
        $this->_infoWindow->addLine('<' . $this->_name . '>');
        $this->_infoWindow->addLine("HLT: " . $this->_health);
        $this->_infoWindow->addLine("STR: " . $this->_strength);
        $this->_infoWindow->addLine("DEF: " . $this->_defence);
        $this->_infoWindow->addLine("LUK: " . $this->_luck);
        if(!empty($this->_skills))
        {
            foreach ($this->_skills as $skill) {
                $this->_infoWindow->addLine(substr($skill->getName(), 0, 3) . ': ' . $skill->getProbability());
            }
        }
    }

    public function getName() : string
    {
        return $this->_name;
    }

    public function increaseDefence() : int
    {
        return 0;
    }

    /**
     * hit damage
     * @param float $damage
     */
    protected function decreaseHealth(float $damage)
    {
        $this->_health -= $damage;
        if($this->_health <= 0) {
            $this->_health = 0;
        }
    }

    /**
     * compute damage to opponent
     * @param IActor $actor
     * @return float
     */
    public function fight(IActor $actor) : float
    {
        if($this->_luck < Utils::getRandomInt()) {
            return 0;
        }

        $attack = $this->getStrength();
        $defence = $actor->getDefence();

        $damage = ($attack * Utils::getRandomInt(1, 10) - $defence * Utils::getRandomInt(1, 10)) / Utils::getRandomInt(51, 99);

        if($damage > 0)
        {
            $actor->decreaseHealth($damage);
            $actor->decreaseStats();
        }

        $this->updateStats();
        $actor->updateStats();

        return $damage > 0 ? $damage : 0;
    }

    protected function decreaseStats()
    {
        $quantity = Utils::getRandomFloat() / 75;
        $this->_strength -= $quantity;
        if($this->_strength <= 0) {
            $this->_strength = 0;
        }

        $quantity = Utils::getRandomFloat() / 75;
        $this->_defence -= $quantity;
        if($this->_defence <= 0) {
            $this->_defence = 0;
        }

        $quantity = Utils::getRandomFloat() / 75;
        $this->_luck -= $quantity;
        if($this->_luck <= 0) {
            $this->_luck = 0;
        }
    }
}