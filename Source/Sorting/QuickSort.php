<?php

/**
 * @param array $input
 * @param int   $low   first index
 * @param int   $high  last index
 * @return int
 */
function partition(Array &$input, int $low, int $high) {
    $pivot = $input[$high];
    $i = $low - 1;

    for ($j = $low; $j < $high; $j++) {
        if ($input[$j] <= $pivot) {
            $i++;

            $temp = $input[$i];
            $input[$i] = $input[$j];
            $input[$j] = $temp;
        }
    }

    $temp = $input[$i + 1];
    $input[$i + 1] = $input[$high];
    $input[$high] = $temp;

    return ($i + 1);
}

/**
 * @param array $input
 * @param int   $low   first index
 * @param int   $high  last index
 */
function quickSort(Array &$input, int $low, int $high) {
    if ($low < $high) {
        $partitionPoint = partition($input, $low, $high);

        quickSort($input, $low, $partitionPoint - 1);
        quickSort($input, $partitionPoint + 1, $high);
    }
}
