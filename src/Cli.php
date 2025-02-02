<?php

declare(strict_types=1);

namespace BrainGames\Cli;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function getGreeting($name): string
{
    return sprintf("Hello, {$name}!");
}
function showGreeting(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line(getGreeting($name));
}
