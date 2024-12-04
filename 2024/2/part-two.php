<?php

$reports = explode("\n", file_get_contents('data.txt'));

$safe_count = 0;

foreach ($reports as $report_index => $report) {
    $result = testReport($report);
    if (is_array($result)) {
        $new_report = implode(' ', $result);
        $result = testReport($new_report, true);
    }
    if ($result === true) {
        // We didn't fail any checks so we're safe!
        $safe_count++;
    }
}

echo $safe_count;

function testReport($report, $removed = false): array|bool
{
    $levels = explode(" ", $report);
    $direction = null;
    foreach ($levels as $index => $level) {
        // Determine if were ascending or descending
        if ($direction === null) {
            $direction = $level < $levels[$index + 1];
            continue;
        }
        $previous = $levels[$index - 1];

        // Did that match the expected ascending or descending
        if ($direction !== $previous < $level) {
            if (! $removed) {
                unset($levels[$index]);
                return array_values($levels);
            }
            return false;
        }

        // Have we moved more than three?
        if (
            max($level, $previous) - min($level, $previous) > 3 ||
            max($level, $previous) - min($level, $previous) === 0
        ) {
            if (! $removed) {
                unset($levels[$index]);
                return array_values($levels);
            }
            return false;
        }
    }

    return true;
}