<?php

/**
 * @param array $input
 * @param int   $left first index
 * @param int   $midPoint mid index
 * @param int   $right last index
 */
function merge(Array &$input, int $left, int $midPoint, int $right) {
    $numElementsLeft = $midPoint - $left + 1;
    $numElementsRight = $right - $midPoint;

    $leftSubArray = $rightSubArray = [];

    // copy data to temp sub arrays
    for ($i = 0; $i < $numElementsLeft; $i++) {
        $leftSubArray[$i] = $input[$left + $i];
    }

    for ($j = 0; $j < $numElementsRight; $j++) {
        $rightSubArray[$j] = $input[$midPoint + 1 + $j];
    }

    // merge the temp arrays back to array[left ... right]
    $i = 0;       // first index of left sub array
    $j = 0;       // first index of right sub array
    $k = $left;   // first index of merged sub array

    while ($i < $numElementsLeft && $j < $numElementsRight) {
        if ($leftSubArray[$i] <= $rightSubArray[$j]) {
            $input[$k] = $leftSubArray[$i];
            $i++;
        } else {
            $input[$k] = $rightSubArray[$j];
            $j++;
        }

        $k++;
    }

    // copy any remaining elements of $leftSubArray
    while ($i < $numElementsLeft) {
        $input[$k] = $leftSubArray[$i];
        $i++;
        $k++;
    }

    // copy any remaining elements of $rightSubArray
    while ($j < $numElementsRight) {
        $input[$k] = $rightSubArray[$j];
        $j++;
        $k++;
    }
}

/**
 * complexity theta(nlogn)
 *
 * @param array $input items to sort
 * @param int   $left  first index
 * @param int   $right last index
 */
function mergeSort(Array &$input, int $left, int $right) {
    if ($left < $right) {
        $midPoint = ($left + $right) / 2;

        // sort left and right sub arrays
        mergeSort($input, $left, $midPoint);
        mergeSort($input, $midPoint + 1, $right);

        merge($input, $left, $midPoint, $right);
    }
}
