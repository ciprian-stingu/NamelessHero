<?php declare(strict_types=1);

namespace tests\game;

use game\Game;
use game\GameBuilder;
use game\GameDirector;
use PHPUnit\Framework\TestCase;

final class GameBuilderTest extends TestCase
{
    public function testBuild()
    {
        $gameBuilder = new GameBuilder();
        $this->assertInstanceOf(GameBuilder::class, $gameBuilder);

        $gameDirector = new GameDirector();
        $this->assertInstanceOf(GameDirector::class, $gameDirector);

        $game = $gameDirector->build($gameBuilder);
        $this->assertInstanceOf(Game::class, $game);
    }
}