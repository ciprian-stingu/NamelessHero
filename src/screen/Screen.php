<?php


namespace screen;

use graphic\IGraphicObject;

final class Screen extends BaseWindow implements IScreen
{
    private array $_components;

    public function __construct(int $width, int $height)
    {
        $this->_components = [];
        $this->_width = $width;
        $this->_height = $height;
        $this->clear();
    }

    /**
     * add a component to screen
     * @param int $x
     * @param int $y
     * @param IGraphicObject $object
     * @throws \Exception
     */
    public function add(int $x, int $y, IGraphicObject $object)
    {
        if(empty($object->getData())) {
            throw new \Exception(self::NO_DATA);
        }

        if($y >= $this->_height || $y + $object->getHeight() > $this->_height) {
            throw new \Exception(self::INVALID_HEIGHT);
        }

        if($x >= $this->_width || $x + $object->getWidth() > $this->_width) {
            throw new \Exception(self::INVALID_WIDTH);
        }

        $component = new \stdClass();
        $component->x = $x;
        $component->y = $y;
        $component->object = $object;

        array_push($this->_components, $component);
    }

    /**
     * Draw the screen components
     * @param int $x
     * @param int $y
     * @param IGraphicObject $object
     */
    private function draw(int $x, int $y, IGraphicObject $object)
    {
        $data = $object->getData();

        for($i = $y, $j = $y + $object->getHeight(), $ii = 0; $i < $j; $i++, $ii++)
        {
            for($k = $x, $l = $x + $object->getWidth(), $kk = 0; $k < $l; $k++, $kk++) {
                $this->_buffer[$i][$k] = $data[$ii][$kk];
            }
        }
    }

    /**
     * put the screen data in console
     */
    public function update()
    {
        //ansi clear screen & set position to 0,0
        echo "\033[2J\n";

        foreach($this->_components as $component) {
            $this->draw($component->x, $component->y, $component->object);
        }

        for($i = 0; $i < $this->_height; $i++) {
            echo $this->_buffer[$i] . "\n";
        }

        //ansi move cursor to 0,0
        //echo "\033[0A";
        //echo "\033[100D";
    }
}