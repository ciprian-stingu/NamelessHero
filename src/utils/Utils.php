<?php


namespace utils;


/**
 * Class Utils
 * some utilities
 */
class Utils
{
    public static function getRandomFloat() : float
    {
        return (float)mt_rand(0, 99) + (float)mt_rand(1, 100) / 100.0;
    }

    public static function getRandomInt(int $min = 0, int $max = 100) : int
    {
        return mt_rand($min, $max);
    }

    public static function getChar()
    {
        return strtolower(trim(`bash -c "read -n 1 -t 60 -s ANS ; echo \\\$ANS"`));
    }
}