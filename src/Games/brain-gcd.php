<?php

declare(strict_types=1);

namespace Bin\BrainGcd;

require_once __DIR__ . '/../Engine.php';

function gcd(int $a, int $b): int
{
    if ($a % $b === 0) {
        return $b;
    } elseif ($b % $a === 0) {
        return $a;
    }
    if ($a > $b) {
        return gcd($a % $b, $b);
    }
    return gcd($a, $b % $a);
}
function gameGcd(): void
{
    $userName = '';
    $scores = 0;
    $isRightAnswer = true;
    showGreeting($userName);
    showRule("Find the greatest common divisor of given numbers.");
    while (($scores !== 3) && $isRightAnswer) {
        $randomNumber1 = rand(1, 50);
        $randomNumber2 = rand(1, 50);
        askQuestion("Question: $randomNumber1 $randomNumber2");
        $userAnswer = (int)enterUserAnswer();
        $answer = gcd($randomNumber1, $randomNumber2);
        makeComparison($userAnswer, $answer, $userName, $scores, $isRightAnswer);
    }
}

gameGcd();
