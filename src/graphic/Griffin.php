<?php


namespace graphic;

//ascii art from https://ascii.co.uk/art

final class Griffin extends BaseGraphicObject implements IGraphicObject
{
    public function __construct()
    {
        $this->_data = [
            '              ___                ',
            ' __.--/)  .-~~   ~~>>>>>>>>   .-.',
            '(._\~  \ (        ~~>>>>>>>>.~.-`',
            '  -~}   \_~-,    )~~>>>>>>>` /   ',
            '    {     ~/    /~~~~~~. _.-~    ',
            '     ~.(   `--~~/      /~ ~.     ',
            '.--~~~~_\  \--~(   -.-~~-.  \    ',
            '```-`~~ /  /    ~-.  \ .--~ /    ',
            '     (((_.`    (((__.` ```-`     '
        ];
    }
}