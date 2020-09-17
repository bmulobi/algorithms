<?php

function numberOfDiscIntersections(array $discs) {
    $length = count($discs);

    if ($length < 2) {
        return 0;
    }

    $pairs = 0;
    $lines = array_fill(0, $length, []);
    $line = [];

    $lines[0][] = 0 - $discs[0];
    $lines[0][] = $discs[0];

    for ($i = 1; $i < $length; ++$i) {
        $line[] = $i - $discs[$i];
        $line[] = $i + $discs[$i];

        for ($j = 0; $j < $i; ++$j) {
            
        }
    }



}