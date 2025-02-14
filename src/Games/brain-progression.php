<?php

declare(strict_types=1);

namespace Bin\BrainProgression;

require_once __DIR__ . '/../../vendor/autoload.php';

function gameProgression(): void
{
    $userName = '';
    $scores = 0;
    $isRightAnswer = true;

    showGreeting($userName);
    showRule("What number is missing in the progression?");

    while (($scores !== 3) && $isRightAnswer) {
        $firstElement = rand(1, 10);
        $difference = rand(1, 10);
        $amountOfElements = rand(5, 10);
        $lastElement = $firstElement + $difference * ($amountOfElements - 1);
        $missingIndexOfElement = rand(0, $amountOfElements - 1);
        $sequence = range($firstElement, $lastElement, $difference);
        $answer = $sequence[$missingIndexOfElement];

        $sequence[$missingIndexOfElement] = "..";
        $sequence = implode(" ", $sequence);

        askQuestion("Question: $sequence");
        $userAnswer = (int)enterUserAnswer();
        makeComparison($userAnswer, $answer, $userName, $scores, $isRightAnswer);
    }
}
