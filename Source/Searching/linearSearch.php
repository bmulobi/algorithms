<?php

/**
 * O(n) worst case
 * O(1) best case
 *
 * @param array $input  search space
 * @param mixed $needle search value
 *
 * @return int|string
 */
function linearSearch(Array $input, $needle) {
    if (!$input) { return "Input is empty"; }

    foreach ($input as $key => $value) {
        if ($needle == $value) {
            return $key;
        }
    }

    return -1;
}
