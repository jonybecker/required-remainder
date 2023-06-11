<?php

require_once __DIR__ . '/vendor/autoload.php';

use RequiredRemainder\Parser\InputParser;
use RequiredRemainder\RequiredRemainderHandler;

try {

    echo "Enter the amount of tests cases:\n";

    $testCases = 0;
    $testCases = (int)fgets(STDIN);

    $stdIn = $testCases . PHP_EOL;
    for ($i = 0; $i < $testCases; $i++) {
        echo "Enter test case #".($i+1).":\n";
        $stdIn .= fgets(STDIN);
    }

    $input = InputParser::parse($stdIn);
    $requiredRemainder = new RequiredRemainderHandler($input);

    echo "Your result is:\n";
    echo $requiredRemainder->calculateRequiredRemainder();

} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}
