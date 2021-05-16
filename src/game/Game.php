<?php


namespace game;


use actor\IActor;
use log\ILogger;
use screen\IScreen;
use utils\Utils;

/**
 * Class Game - main game loop controller
 * @package game
 */
final class Game implements IGame
{
    private const WIN_MESSAGE = " Huh, you won?!";
    private const LOOSE_MESSAGE = " Good luck next time!";
    private const MAX_DEFENCE = " You maxed out the defence!";
    private const INCREASE_DEFENCE = " You increased you defence by %d point%s...";
    private const DEAL_DAMAGE = " You deal %.2f damage to %s...";
    private const TAKE_DAMAGE = " You took %.2f damage from %s...";
    private const WIN_ROUND = " You defeated the %s!";
    private const TIMEOUT_MESSAGE = " Choose an option to continue...";
    private const INVALID_OPTION = " Invalid option %s";

    private IScreen $_screen;
    private IActor $_hero;
    private IActor $_firstOpponent;
    private IActor $_secondOpponent;
    private ILogger $_logger;

    public function __construct(IScreen $screen, IActor $hero, IActor $firstOpponent, IActor $secondOpponent, ILogger $logger)
    {
        $this->_screen = $screen;
        $this->_hero = $hero;
        $this->_firstOpponent = $firstOpponent;
        $this->_secondOpponent = $secondOpponent;
        $this->_logger = $logger;
    }

    /**
     * main loop
     */
    public function run()
    {
        $this->_logger->log(" <<The Adventure of Nameless Hero>>");
        $this->_logger->log(" The battle begins... Your move!");
        $this->_screen->update();

        while(!$this->isGameOver() && ($option = Utils::getChar()) <> 'q')
        {
            $this->battle($option);
            $this->_screen->update();
        }

        if($this->isGameOver())
        {
            if($this->_hero->getHealth() <= 0) {
                $this->_logger->log(self::LOOSE_MESSAGE);
            }
            else {
                $this->_logger->log(self::WIN_MESSAGE);
            }

            $this->_screen->update();
        }

        echo "Bye...\n";
    }

    /**
     * confront the opponents
     * @param string $option
     */
    private function battle(string $option)
    {
        $opponent = $this->getOpponent($option);

        if(!empty($opponent))
        {
            if($option == 'd')
            {
                $additionalDefence = $this->_hero->increaseDefence();
                if($additionalDefence == 0) {
                    $this->_logger->log(self::MAX_DEFENCE);
                }
                else {
                    $this->_logger->log(sprintf(self::INCREASE_DEFENCE, $additionalDefence, $additionalDefence == 1 ? '' : 's'));
                }
            }
            else
            {
                $damage = $this->_hero->fight($opponent);
                $this->_logger->log(sprintf(self::DEAL_DAMAGE, $damage, $opponent->getName()));
            }
            if($opponent->getHealth() > 0)
            {
                $damage = $opponent->fight($this->_hero);
                $this->_logger->log(sprintf(self::TAKE_DAMAGE, $damage, $opponent->getName()));
            }
            else {
                $this->_logger->log(sprintf(self::WIN_ROUND, $opponent->getName()));
            }
        }
    }

    private function getOpponent(string $option)
    {
        $opponent = null;

        switch($option)
        {
            case 'c':
                if($this->_firstOpponent->getHealth() > 0) {
                    $opponent = $this->_firstOpponent;
                }
                break;
            case 'g':
                if($this->_secondOpponent->getHealth() > 0) {
                    $opponent = $this->_secondOpponent;
                }
                break;
            case 'd':
                if($this->_firstOpponent->getHealth() > 0 && $this->_secondOpponent->getHealth() > 0) {
                    $opponent = 50 >= Utils::getRandomInt() ? $this->_secondOpponent : $this->_firstOpponent;
                }
                else if($this->_firstOpponent->getHealth() > 0) {
                    $opponent = $this->_firstOpponent;
                }
                else if($this->_secondOpponent->getHealth() > 0) {
                    $opponent = $this->_secondOpponent;
                }
                break;
            default:
                if(empty($option)) {
                    $this->_logger->log(self::TIMEOUT_MESSAGE);
                }
                else {
                    $this->_logger->log(sprintf(self::INVALID_OPTION, $option));
                }
        }

        return $opponent;
    }

    private function isGameOver() : bool
    {
        return $this->_firstOpponent->getHealth() <= 0 && $this->_secondOpponent->getHealth() <= 0 || $this->_hero->getHealth() <= 0;
    }
}