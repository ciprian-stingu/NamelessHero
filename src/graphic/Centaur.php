<?php


namespace graphic;

//ascii art from https://ascii.co.uk/art

final class Centaur extends BaseGraphicObject implements IGraphicObject
{
    public function __construct()
    {
        $this->_data = [
            '   <=======]}======',
            '    --.   /|       ',
            '   _\"/_.`/        ',
            ' .`._._,.`         ',
            ' :/ \{}/           ',
            '(L  /--`,----._    ',
            '    |          \\\  ',
            '  : /-\ .`-`\ / |  ',
            'snd \\\, ||    \|   ',
            '     \/ ||    ||   '
        ];
    }
}