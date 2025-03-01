<?php

declare(strict_types=1);

use function cli\line;
use function cli\prompt;

require_once __DIR__ . '/../vendor/autoload.php';

function getGreeting(string $name): string
{
    return "Hello, {$name}!";
}

function showGreeting(string &$name = ""): void
{
    line("\nWelcome to the Brain Games!");
    echo 'May I have your name? ';
    $nameValue = trim((string)fgets(STDIN));
    setName($name, $nameValue);
    line(getGreeting($nameValue));
}

function setName(string &$name, string $nameValue): void
{
    $name = $nameValue;
}

function showRule(string $rule): void
{
    line($rule);
}

function showWrongAnswer(string|int $userAnswer, string|int $answer, string $userName): void
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

function askQuestion(string $question): void
{
    line($question);
}

function enterUserAnswer(): string
{
    echo 'Your answer: ';
    $handle = fopen("php://stdin", "r");
    if ($handle === false) {
        return "";
    }
    return trim((string)fgets($handle));
}

function makeComparison(string|int $userAnswer, string|int $answer, string $userName, int &$scores, bool &$isRightAnswer): void
{
    if ($userAnswer === $answer) {
        $scores++;
        ($scores === 3) ? showUserWin($userName) : showCorrectAnswer();
    } else {
        showWrongAnswer($userAnswer, $answer, $userName);
        $isRightAnswer = false;
    }
}
