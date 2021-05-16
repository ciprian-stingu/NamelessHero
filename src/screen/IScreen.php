<?php


namespace screen;


use graphic\IGraphicObject;

interface IScreen
{
    public const INVALID_HEIGHT = "Invalid object height or position!";
    public const INVALID_WIDTH = "Invalid object width or position!";
    public const NO_DATA = "No graphic data!";

    public function add(int $x, int $y, IGraphicObject $object);
    public function update();
}