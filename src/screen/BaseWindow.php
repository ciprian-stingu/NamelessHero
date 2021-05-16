<?php


namespace screen;

abstract class BaseWindow
{
    protected int $_width, $_height;
    protected $_buffer;

    /**
     * default clear method for windows
     */
    protected function clear()
    {
        $this->_buffer = [];
        for($i = 0; $i < $this->_height; $i++) {
            $this->_buffer[$i] = str_repeat(' ', $this->_width);
        }
    }
}