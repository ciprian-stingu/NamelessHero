<?php

use game\GameBuilder;
use game\GameDirector;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/Configuration.php';

$gameBuilder = new GameBuilder();
$game = (new GameDirector())->build($gameBuilder);
$game->run();

