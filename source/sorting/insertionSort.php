<?php

    /**
     * O(n2) worst case
     * O(n) best case, array already sorted
     *
     * @param array $input
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


    /**
     * no perfomance improvement over iterative
     *
     * @param array $input
     * @param int   $steps steps
     * @return array
     */
    function recursiveInsertionSort(Array $input, $steps) {
        if ($steps <= 1) { return $input; }

        $input = recursiveInsertionSort($input, $steps - 1);

        // insert last element at it's correct
        // position in sorted array
        $last = $input[$steps - 1];
        $i = $steps - 2;

        while($i >= 0 && $input[$i] > $last) {
            $input[$i + 1] = $input[$i];
            $i -= 1;
        }
        $input[$i + 1] = $last;

        return $input;
    }
