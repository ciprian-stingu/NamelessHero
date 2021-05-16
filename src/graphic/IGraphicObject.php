<?php


namespace graphic;


interface IGraphicObject
{
    public function getWidth();
    public function getHeight();
    public function getData() : array;
}