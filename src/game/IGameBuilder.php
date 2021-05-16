<?php

namespace game;


interface IGameBuilder
{
    public function createScreen();
    public function addDecorations();
    public function addActors();
    public function addPrompt();
    public function addLogger();

    public function getGame() : Game;
}