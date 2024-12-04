<?php
preg_match_all('/(\d+)\s+(\d+)/', file_get_contents('input-one.txt'), $matches);

list($all, $list_one, $list_two) = $matches;

$similarity = 0;

$counts = array_count_values($list_two);
foreach ($list_one as $one) {
    $similarity += $one * ($counts[$one] ?? 0 * $one);
}
echo $similarity;