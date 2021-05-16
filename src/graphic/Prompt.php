<?php


namespace graphic;


final class Prompt extends BaseGraphicObject implements IGraphicObject
{
    public function __construct()
    {
        //default prompt
        $this->_data = ['Choose your move: [c] - attack centaur, [g] - attack griffin, [d] - increase defense, [q] - quit'];
    }
}