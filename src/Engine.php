<?php

declare(strict_types=1);

use function cli\line;
use function cli\prompt;

require_once __DIR__ . '/../vendor/autoload.php';

function getGreeting($name): string
{
    return "Hello, {$name}!";
}
function showGreeting(string &$name): void
{
    line('Welcome to the Brain Games!');
    echo 'May I have your name? ';
    $nameValue = trim(fgets(STDIN));
    setName($name, $nameValue);
    line(getGreeting($nameValue));
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function setName(string &$name, string $nameValue): void
{
    $name = $nameValue;
}

function showRule(string $rule): void
{
    line($rule);
}
function showWrongAnswer(string $userAnswer, string $answer, string $userName): void
{
    line("'$userAnswer' is wrong answer ;(. Correct answer was '$answer'.\nLet's try again, $userName!");
}
function showCorrectAnswer(): void
{
    line("Correct!");
}
function showUserWin(string $userName): void
{
    line("Correct!\nCongratulations, $userName!");
}

function askQuestion($question): void
{
    line($question);
}

function enterUserAnswer(): string
{
    return prompt('Your answer');
}

function makeComparison(string $userAnswer, string $answer, string $userName, int &$scores, bool &$isRightAnswer): void
{
    if ($userAnswer === $answer) {
        $scores++;
        ($scores === 3) ? showUserWin($userName) : showCorrectAnswer();
    } else {
        showWrongAnswer($userAnswer, $answer, $userName);
        $isRightAnswer = false;
    }
}
