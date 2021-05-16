<?php


namespace game;


use actor\ActorDirector;
use actor\BatmanBuilder;
use actor\CentaurBuilder;
use actor\GriffinBuilder;
use actor\IActor;
use graphic\Castle;
use graphic\Prompt;
use log\ILogger;
use log\LoggerFactory;
use screen\IScreen;
use screen\ScreenFactory;

/**
 * Class GameBuilder - will build the game
 * @package game
 */
final class GameBuilder implements IGameBuilder
{
    private IScreen $_screen;
    private IActor $_batman;
    private IActor $_centaur;
    private IActor $_griffin;
    private ILogger $_logger;

    public function createScreen()
    {
        $this->_screen = ScreenFactory::createScreen();
    }

    public function addDecorations()
    {
        $castle = new Castle();
        $this->_screen->add((CONFIGURATION['SCREEN']['WIDTH'] - $castle->getWidth()) / 2, 0, $castle);
    }

    public function addActors()
    {
        $batmanBuilder = new BatmanBuilder();
        $this->_batman = (new ActorDirector())->build($batmanBuilder);
        $this->_screen->add(5, 15, $this->_batman->getGraphic());
        $this->_screen->add(0, 16, $this->_batman->getInfo());

        $centaurBuilder = new CentaurBuilder();
        $this->_centaur = (new ActorDirector())->build($centaurBuilder);
        $this->_screen->add(CONFIGURATION['SCREEN']['WIDTH'] - $this->_centaur->getGraphic()->getWidth() - 14, 17, $this->_centaur->getGraphic());
        $this->_screen->add(CONFIGURATION['SCREEN']['WIDTH'] - $this->_centaur->getInfo()->getWidth(), 18, $this->_centaur->getInfo());

        $griffinBuilder = new GriffinBuilder();
        $this->_griffin = (new ActorDirector())->build($griffinBuilder);
        $this->_screen->add(CONFIGURATION['SCREEN']['WIDTH'] - $this->_griffin->getGraphic()->getWidth() - 7, 28, $this->_griffin->getGraphic());
        $this->_screen->add(CONFIGURATION['SCREEN']['WIDTH'] - $this->_griffin->getInfo()->getWidth(), 28, $this->_griffin->getInfo());
    }

    public function addPrompt()
    {
        $prompt = new Prompt();
        $this->_screen->add((CONFIGURATION['SCREEN']['WIDTH'] - $prompt->getWidth()) / 2, 39, $prompt);
    }

    public function addLogger()
    {
        $this->_logger = LoggerFactory::getLogger();
        $this->_screen->add((CONFIGURATION['SCREEN']['WIDTH'] - $this->_logger->getGraphic()->getWidth()) / 2, 19, $this->_logger->getGraphic());
    }

    public function getGame(): Game
    {
        return new Game($this->_screen, $this->_batman, $this->_centaur, $this->_griffin, $this->_logger);
    }
}