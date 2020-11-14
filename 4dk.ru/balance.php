<?php
declare(strict_types=1);

testBalance();

function balance(string $left, string $right): string
{
    $response = 'Balance';

    [$leftNumbers, $rightNumbers] = str_replace(['!', '?'], [2, 3], [$left, $right]);

    $leftSum = array_sum(str_split($leftNumbers));
    $rightSum = array_sum(str_split($rightNumbers));

    if ($leftSum === $rightSum) {
        return $response;
    }

    return $leftSum > $rightSum ? 'Left' : 'Right';
}

function testBalance(): void
{
    echoTestResultByCondition((balance("!!", "??") === "Right"));
    echoTestResultByCondition((balance("!!", "??") === "Left"));
    echoTestResultByCondition((balance("!??", "?!!") === "Left"));
    echoTestResultByCondition((balance("!?!!", "?!?") === "Left"));
    echoTestResultByCondition((balance("!!???!????", "??!!?!!!!!!!") === "Balance"));
}

function echoTestResultByCondition(bool $condition): void
{
    echo 'Результат теста: '.var_export($condition, true) . PHP_EOL;
}