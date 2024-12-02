<?php

preg_match_all('/(\d+)\s+(\d+)/', file_get_contents('input-one.txt'), $matches);

list($all, $list_one, $list_two) = $matches;

sort($list_one);
sort($list_two);

$diff = 0;
for ($i = 0; $i < count($list_one); $i++) {
    $one = $list_one[$i];
    $two = $list_two[$i];
    $diff += max($one, $two) - min($one, $two);
}
echo $diff;