<?php


namespace skill;


use actor\IActor;

interface ISkill
{
    public const DEFENCE = 1;
    public const ATTACK = 2;

    public function getProbability() : float;

    public function getType() : int;

    public function getName() : string;

    public function getValue() : int;
}