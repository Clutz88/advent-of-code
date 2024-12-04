<?php

$reports = explode("\n", file_get_contents('data.txt'));

$safe_count = 0;

foreach ($reports as $report_index => $report) {
    $levels = explode(" ", $report);
    $asc = null;
    foreach ($levels as $index => $level) {
        // Determine if were ascending or descending
        if ($asc === null) {
            $asc = $level < $levels[$index + 1];
            continue;
        }

        // Did that match the expected ascending or descending
        if ($asc !== $levels[$index - 1] < $level) {
            continue 2;
        }

        // Have we moved more than three?
        if (
            max($level, $levels[$index - 1]) - min($level, $levels[$index - 1]) > 3 ||
            max($level, $levels[$index - 1]) - min($level, $levels[$index - 1]) === 0
        ) {
            continue 2;
        }
    }

    // We didn't fail any checks so we're safe!
    $safe_count++;
}

echo $safe_count;
