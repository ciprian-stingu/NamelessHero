<?php


namespace screen;


use graphic\IGraphicObject;

final class InfoWindow extends BaseWindow implements IInfoWindow, IGraphicObject
{
    private int $_lineIndex;

    public function __construct(int $width, int $height)
    {
        $this->_width = $width;
        $this->_height = $height;
        $this->clear();
    }

    /**
     * add a line of text in window
     *
     * @param string $line
     */
    public function addLine(string $line)
    {
        //adjust line size
        if(strlen($line) >=  $this->_width - 2) {
            $line = substr($line, 0, $this->_width - 2);
        }

        // use last line if overflow
        if($this->_lineIndex >= $this->_height - 1)
        {
            //scroll content
            for($i = 2; $i < $this->_height - 1; $i++) {
                $this->_buffer[$i - 1] = $this->_buffer[$i];
            }
            $this->_lineIndex = $this->_height - 2;
        }

        $this->_buffer[$this->_lineIndex++] = '|' . $line . str_repeat(' ', $this->_width - 2 - strlen($line)) . '|';
    }

    /**
     * clear window and draw borders
     */
    public function clear()
    {
        $this->_lineIndex = 1;
        $this->_buffer = [];
        array_push($this->_buffer, '+' . str_repeat('-', $this->_width - 2) . '+');
        for($i = 1; $i < $this->_height - 1; $i++)
        {
            array_push($this->_buffer, '|' . str_repeat(' ', $this->_width - 2) . '|');
        }
        array_push($this->_buffer, '+' . str_repeat('-', $this->_width - 2) . '+');
    }

    public function getWidth()
    {
        return $this->_width;
    }

    public function getHeight()
    {
        return $this->_height;
    }

    public function getData(): array
    {
        return $this->_buffer;
    }

    public function getGraphic(): IGraphicObject
    {
        return $this;
    }
}