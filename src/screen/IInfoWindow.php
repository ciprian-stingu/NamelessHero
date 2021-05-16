<?php


namespace screen;


use graphic\IGraphicObject;

interface IInfoWindow
{
    public const ACTOR = 1;
    public const MAIN = 2;

    public function getGraphic() : IGraphicObject;

    public function clear();

    public function addLine(string $line);
}