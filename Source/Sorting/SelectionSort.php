<?php

/**
 * complexity O(n2)
 *
 * @param array $input
 *
 * @return array
 */
function iterativeSelectionSort(Array $input) {
    $length = count($input);

    foreach ($input as $key => $value) {
        $minIndex = $key;

        for ($i = $key + 1; $i < $length; $i++) {
            if ($i === $length) { break; }

            if ($input[$i] < $input[$minIndex]) {
                $minIndex = $i;
            }
        }

        $temp = $input[$key];
        $input[$key] = $input[$minIndex];
        $input[$minIndex] = $temp;
    }

    return $input;
}
