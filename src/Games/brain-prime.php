<?php

declare(strict_types=1);

namespace Bin\BrainGcd;

require_once __DIR__ . '/../../vendor/autoload.php';

function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function gamePrime(): void
{
    $userName = '';
    $scores = 0;
    $isRightAnswer = true;

    showGreeting($userName);
    showRule('Answer "yes" if given number is prime. Otherwise answer "no".');

    while (($scores !== 3) && $isRightAnswer) {
        $randomNumber = rand(1, 10);
        $answer = isPrime($randomNumber) ? "yes" : "no";

        askQuestion("Question: $randomNumber");
        $userAnswer = enterUserAnswer();
        makeComparison($userAnswer, $answer, $userName, $scores, $isRightAnswer);
    }
}
