<?php

declare(strict_types=1);

namespace Bin\BrainCalc;

require_once __DIR__ . '/../../vendor/autoload.php';

function gameCalc(): void
{
    $userName = '';
    $scores = 0;
    $isRightAnswer = true;
    $operation = ["+", "-", "*"];

    showGreeting($userName);
    showRule("What is the result of the expression?");

    while (($scores !== 3) && $isRightAnswer) {
        $randomNumber1 = rand(1, 100);
        $randomNumber2 = rand(1, 100);
        $randomOperation = $operation[rand(0, 2)];
        $answer = 0;

        switch ($randomOperation) {
            case "+":
                $answer = $randomNumber1 + $randomNumber2;
                break;
            case "-":
                $answer = $randomNumber1 - $randomNumber2;
                break;
            case "*":
                $answer = $randomNumber1 * $randomNumber2;
                break;
        }

        askQuestion("Question: $randomNumber1 $randomOperation $randomNumber2");
        $userAnswer = (int)enterUserAnswer();
        makeComparison($userAnswer, $answer, $userName, $scores, $isRightAnswer);
    }
}
