<?php


namespace graphic;

//ascii art from https://ascii.co.uk/art

final class Batman extends BaseGraphicObject implements IGraphicObject
{
    public function __construct()
    {
        $this->_data = [
            '             .  .           ',
            '             |\_|\          ',
            '             | a_a\         ',
            '             | | \"]        ',
            '         ____| `-\___       ',
            '        /.----.___.-`\      ',
            '       //        _    \     ',
            '      //   .-. (~v~) /|     ',
            '     |`|  /\:  .--  / \     ',
            '    // |-/  \_/____/\/~|    ',
            '   |/  \ |  []_|_|_] \ |    ',
            '   | \  | \ |___   _\ ]_}   ',
            '   | |  `-` /   `.`  |      ',
            '   | |     /    /|:  |      ',
            '   | |     |   / |:  /\     ',
            '   | |     /  /  |  /  \    ',
            '   | |    |  /  /  |    \   ',
            '   \ |    |/\/  |/|/\    \  ',
            '    \|\ |\|  |  | / /\/\__\ ',
            '     \ \| | /   | |__       ',
            '   snd    / |   |____)      ',
            '          |_/               '
        ];
    }
}