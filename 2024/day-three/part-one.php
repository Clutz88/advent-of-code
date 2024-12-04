<?php

$input = file_get_contents('input.txt');

preg_match_all('/mul\((\d+),(\d+)\)/', $input, $matches);

$result = 0;
foreach ($matches[0] as $index => $calc) {
    $result += $matches[1][$index] * $matches[2][$index];
}
echo $result;