<?php

$max_cubes = [
    'red' => 12,
    'green' => 13,
    'blue' => 14,
];

foreach (file(__DIR__ . '/input.txt') as $line) {
    [$game_index, $game] = explode(':', $line);
    foreach (explode(';', $game) as $cubes) {
        foreach (explode(',', $cubes) as $cube) {
            [$quantity, $colour] = explode(' ', trim($cube));
            if ($quantity > $max_cubes[$colour]) {
                continue 3;
            }
        }
    }
    $possibles[] = (int) str_replace('Game ', '', $game_index);
}

var_dump(array_sum($possibles));