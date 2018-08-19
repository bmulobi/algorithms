<?php

    /**
     * @param array $input  search space
     * @param mixed $needle what we're searching for
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
