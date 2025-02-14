<?php

declare(strict_types=1);

namespace Bin\BrainEven;

require_once __DIR__ . '/../../vendor/autoload.php';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
function gameIsEven(): void
{
    $userName = '';
    $scores = 0;
    $isRightAnswer = true;

    showGreeting($userName);
    showRule('Answer "yes" if the number is even, otherwise answer "no".');

    while (($scores !== 3) && $isRightAnswer) {
        $randomNumber = rand(1, 1000);
        $answer = isEven($randomNumber) ? "yes" : "no";

        askQuestion("Question: $randomNumber");
        $userAnswer = enterUserAnswer();
        makeComparison($userAnswer, $answer, $userName, $scores, $isRightAnswer);
    }
}
