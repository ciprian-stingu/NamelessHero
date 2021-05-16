<?php


namespace skill;


abstract class BaseSkill
{
    protected string $_name;
    protected float $_probability;
    protected int $_value;

    public function getProbability(): float
    {
        return $this->_probability;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function getValue() : int
    {
        return $this->_value;
    }
}