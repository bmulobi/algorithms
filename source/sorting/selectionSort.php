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

            echo '$Key = '.$key."\n";

            for ($i = $key + 1; $i < $length; $i++) {
                echo '$i = '.$i."\n";

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

    function recursiveSelectionSort(Array $input) {

    }

    $arr = [7,1,6,2,90,44,1,2,77,32,56,21,14];

    foreach(iterativeSelectionSort($arr) as $v) {
        echo $v . "\n";
    };