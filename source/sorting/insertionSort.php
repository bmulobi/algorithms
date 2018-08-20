<?php

    /**
     * O(n2) worst case
     * O(n) best case, array already sorted
     *
     * @param array $input search space
     * @return array
     */
    function iterativeInsertionSort(Array $input) {
        for ($i = 1; $i < count($input); $i++) {
            $key = $input[$i];
            $j = $i - 1;

            while($j >= 0 && $input[$j] > $key) {
                $input[$j + 1] = $input[$j];
                $j -= 1;
            }

            $input[$j + 1] = $key;
        }

        return $input;
    }
