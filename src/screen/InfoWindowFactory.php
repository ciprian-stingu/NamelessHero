<?php


namespace screen;


final class InfoWindowFactory
{
    public static function getInfoWindow(int $infoWindowType)
    {
        switch($infoWindowType)
        {
            case IInfoWindow::ACTOR:
                return new InfoWindow(12, 9);
            case IInfoWindow::MAIN:
                return new InfoWindow(46, 10);
            default:
                throw new \Exception("Invalid info window type!");
        }
    }
}