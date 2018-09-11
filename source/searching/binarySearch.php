<?php
    /**
     * O(Log n)
     *
     * @param array $input  search space
     * @param mixed $needle search value
     *
     * @return int|string
     */
    function iterativeBinarySearch(Array $input, $needle) {
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

    /**
     * @param array $input  search space
     * @param int   $low    first position
     * @param int   $high   last position
     * @param mixed $needle search value
     * @return int|string
     */
    function recursiveBinarySearch(Array $input, $low, $high /* length - 1 for first call */, $needle) {
        $length = count($input);

        if (!$length) {
            return "Input is empty";
        } elseif ($high < $low) { return -1; }

        $midPosition = floor(($low + $high) / 2);

        if ($needle == $input[$midPosition]) {
            return $midPosition;
        } elseif ($needle < $input[$midPosition]) {
            return recursiveBinarySearch($input, $low, $midPosition - 1, $needle);
        } else {
            return recursiveBinarySearch($input, $midPosition + 1, $high, $needle);
        }
    }
