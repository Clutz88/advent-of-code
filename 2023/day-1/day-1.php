<?php

$lines = file(__DIR__ .DIRECTORY_SEPARATOR.'input.txt');
//$lines = file(__DIR__ .DIRECTORY_SEPARATOR.'test.txt');

//$lines = file($input, FILE_IGNORE_NEW_LINES);

$strings = [];
foreach ($lines as $line) {
    preg_match_all('/one|two|three|four|five|six|seven|eight|nine|\d/', $line, $matches);
    $numbers = $matches[0];
    $numbers = array_map(
        fn($number) => str_replace(
        ['one','two','three','four','five','six','seven','eight','nine'],
        ['1','2','3','4','5','6','7','8','9'],
        $number
        ),
        $numbers
    );
//    var_dump($numbers);
    $strings[] = (int) ($numbers[0] . $numbers[count($numbers)-1]);
}
//var_dump($strings);
echo array_sum($strings) . PHP_EOL;
