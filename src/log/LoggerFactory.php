<?php


namespace log;


use screen\IInfoWindow;
use screen\InfoWindowFactory;

final class LoggerFactory
{
    private static $_logger;

    public static function getLogger() : ILogger
    {
        if(self::$_logger == null)
        {
            $infoWindow = InfoWindowFactory::getInfoWindow(IInfoWindow::MAIN);
            self::$_logger = new WindowLogger($infoWindow);
        }
        return self::$_logger;
    }
}