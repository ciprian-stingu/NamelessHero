<?php


namespace graphic;


abstract class BaseGraphicObject
{
    protected array $_data;

    public function getWidth()
    {
        return strlen($this->_data[0]);
    }

    public function getHeight()
    {
        return count($this->_data);
    }

    public function getData(): array
    {
        return $this->_data;
    }
}