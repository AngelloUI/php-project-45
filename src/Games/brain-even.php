<?php

declare(strict_types=1);

namespace Bin\BrainEven;

require_once __DIR__ . '/../Engine.php';

function gameIsEven(): void
{
    $userName = '';
    $scores = 0;
    $isRightAnswer = true;
    showGreeting($userName);
    showRule("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    while (($scores !== 3) && $isRightAnswer) {
        $randomNumber = rand(1, 1000);
        askQuestion("Question: $randomNumber");
        $userAnswer = enterUserAnswer();
        $answer = isEven($randomNumber) ? "yes" : "no";
        makeComparison($userAnswer, $answer, $userName, $scores, $isRightAnswer);
    }
}

gameIsEven();
