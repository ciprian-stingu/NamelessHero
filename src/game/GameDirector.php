<?php


namespace game;

/**
 * Class GameDirector
 * @package game
 */
final class GameDirector
{
    public function build(IGameBuilder $builder): IGame
    {
        $builder->createScreen();
        $builder->addDecorations();
        $builder->addActors();
        $builder->addPrompt();
        $builder->addLogger();

        return $builder->getGame();
    }
}