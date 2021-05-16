<?php


namespace log;


use graphic\IGraphicObject;
use screen\IInfoWindow;

/**
 * Class WindowLogger - will log the messages to main info window
 * @package log
 */
final class WindowLogger implements ILogger
{
    private IInfoWindow $_infoWindow;

    public function __construct(IInfoWindow $infoWindow)
    {
        $this->_infoWindow = $infoWindow;
        $this->_infoWindow->clear();
    }

    public function log(string $message)
    {
        $this->_infoWindow->addLine($message);
    }

    public function getGraphic(): IGraphicObject
    {
        return $this->_infoWindow->getGraphic();
    }
}