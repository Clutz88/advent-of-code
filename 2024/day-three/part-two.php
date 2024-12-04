<?php

$input = file_get_contents('input.txt');

preg_match_all('/mul\((\d+),(\d+)\)|don\'t|do/', $input, $matches);

$result = 0;
$enabled = true;
foreach ($matches[0] as $index => $calc) {
    if (! str_contains($calc, 'mul')) {
        $enabled = $calc === 'do';
        continue;
    }
    if ($enabled) {
        $result += $matches[1][$index] * $matches[2][$index];
    }
}
echo $result;