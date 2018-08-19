<?php
    /**
     * @param array $input  search space
     * @param mixed $needle what we're searching for
     *
     * @return int|string
     */
    function binarySearch(Array $input, $needle) {
        $length = count($input);

        if (!$length) {
            return "Input is empty";
        } elseif($length === 1) {
            return $needle == $input[0] ? 0 : -1;
        }

        $low = 0;
        $high = $length - 1;


        while ($low <= $high) {
            $midPosition = floor(($high + $low) / 2);

            if ($needle == $input[$midPosition]) {
                return $midPosition;
            } elseif ($needle < $input[$midPosition]) {
                $high = $midPosition - 1;
            } else {
                $low = $midPosition + 1;
            }
        }

        return -1;
    }
