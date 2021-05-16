<?php


namespace screen;

/**
 * Class ScreenFactory
 * @package screen
 */
final class ScreenFactory
{
    public static function createScreen() : IScreen
    {
        return new Screen(CONFIGURATION['SCREEN']['WIDTH'], CONFIGURATION['SCREEN']['HEIGHT']);
    }
}