<?php


namespace actor;


use graphic\IGraphicObject;
use screen\IInfoWindow;
use skill\ISkill;

interface IActor
{
    public const BATMAN = 1;
    public const CENTAUR = 2;
    public const GRIFFIN = 3;

    public function getType() : int;

    public function getHealth() : float;

    public function increaseDefence() : int;

    public function addGraphic(IGraphicObject $graphic);

    public function getGraphic() : IGraphicObject;

    public function addSkill(ISkill $skill);

    public function addInfo(IInfoWindow $infoWindow);

    public function getInfo() : IGraphicObject;

    public function updateStats();

    public function getName() : string;

    public function fight(IActor $actor) : float;
}