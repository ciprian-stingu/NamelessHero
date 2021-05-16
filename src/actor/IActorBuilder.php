<?php


namespace actor;


interface IActorBuilder
{
    public function createActor();
    public function addGraphic();
    public function addSkills();
    public function addInfo();
    public function getActor() : IActor;
}