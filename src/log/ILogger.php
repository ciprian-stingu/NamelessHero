<?php


namespace log;


use graphic\IGraphicObject;

interface ILogger
{
    public function log(string $message);
    public function getGraphic() : IGraphicObject;
}