<?php

    /**
     * worst/average O(n2), optimise by stopping if no swap in inner loop
     * best O(n) input already sorted
     *
     * @param array  $input search space
     * @return array
     */
    function iterativeBubbleSort(Array $input) {
        $length = count($input);

        for ($i  = 0; $i < $length - 1; $i++) {
            for ($j = 0; $j < $length - $i - 1; $j++) {
                $stop = true;

                if ($input[$j] > $input[$j + 1]) {
                    $temp = $input[$j + 1];
                    $input[$j + 1] = $input[$j];
                    $input[$j] = $temp;
                    $stop = false;
                }
            }

            if ($stop) { break; } // optimisation
        }

        return $input;
    }

    /**
     * no performance benefits over iterative implementation
     *
     * @param array $input  search space
     * @param int   $length steps
     * @return mixed
     */
    function recursiveBubbleSort($input, $length) {
        if ($length === 1) { return $input; }

        for ($i = 0; $i < $length - 1; $i++) {
            if ($input[$i] > $input[$i + 1]) {
                $temp = $input[$i];
                $input[$i] = $input[$i + 1];
                $input[$i + 1] = $temp;
            }
        }

        return recursiveBubbleSort($input, $length - 1);
    }
