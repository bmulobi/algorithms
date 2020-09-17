<?php


$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

for ($i = 0; $i < strlen($str); ++$i) {
    echo "\n" . ord($str[$i]);
}

function numPathsDp($n, $m) {
    $memo = array_fill(0, $m, 1);

    for ($row = 0; $row < $n; ++$row) {
        for ($col = 1; $col < $m; ++$col) {
            $memo[$col] += $memo[$col - 1];
        }
    }

    return $memo[$m - 1];
}

//echo "\n" . numPathsDp(3, 3);




function numPathsHelper($n, $m) {
    $memo = [];

    return numPaths($n, $m, $memo);
}

// get number of paths from top left to bottom right in nxm array
function numPaths($n, $m, &$memo) {
    if ($n === 1 || $m === 1) {
        return 1;
    }

//    $leftKey = ($n - 1) . '-' . $m;
//    $rightKey = $n . '-' . ($m - 1);
//
//    if (isset($memo[$leftKey])) {
//        $left = $memo[$leftKey];
//    } else {
//        $left = numPaths($n - 1, $m, $memo);
//        $memo[$leftKey] = $left;
//    }
//
//    if (isset($memo[$rightKey])) {
//        $right = $memo[$rightKey];
//    } else {
//        $right = numPaths($n, $m - 1, $memo);
//        $memo[$rightKey] = $right;
//    }


    return numPaths($n, $m - 1, $memo) + numPaths($n - 1, $m, $memo);
    // if diagonal movements are allowed, the last addition is required
//    return $left + $right;
    // + numPaths($n - 1, $m - 1)
}

//echo "\n" . numPathsHelper(3, 3);


function radixSort(array $nums) {
    /** @var SplQueue[] $buckets */
    $buckets = [];

    for ($i = 0; $i < 10; ++$i) {
        $buckets[] = new SplQueue();
    }


    $longest = 0;
    foreach ($nums as $num) {
        $length = strlen((string) $num);
        if ($length > $longest) {
            $longest = $length;
        }
    }

    $modBy = 10;
    $normalizeBy = 1;
    for ($i = 0; $i < $longest; ++$i) {
        foreach ($nums as $num) {
            $mod = $num % $modBy;
            $digit = floor($mod / $normalizeBy);
//            $digit = $digit < 0 ? 0 : $digit; // todo kudos WOW to me!!!!!!!!!!! weee
            // todo partition the input around 0, sort then prepend -ve reversed-subarray to other
            $buckets[$digit]->enqueue($num);
        }

        $index = 0;
        foreach ($buckets as $bucket) {
            while (!$bucket->isEmpty()) {
                $it = $bucket->dequeue();
                $nums[$index] = $it;
                ++$index;
            }
        }

        $modBy *= 10;
        $normalizeBy *= 10;
    }
    return $nums;
}


//$arr = [88, 3, 5, -86, 99, 23, 11, 0, -2, -555];
//print_r(radixSort($arr));
//



//print_r('b');


// longest common substring

function lcsubstr(string $a, string $b): ?string {
    $result = '';
    $alength = strlen($a);
    $blength = strlen($b);

    if ($alength === 0 || $blength === 0) {
        return '';
    }

    $cache = [];
    for ($i = 0; $i < $alength; ++$i) {
        $cache[] = array_fill(0, $blength, 0);
    }

    for ($row = 0; $row < $alength; ++$row) {
        for ($col = 0; $col < $blength; ++$col) {
            if ($a[$row] === $b[$col]) {
                if ($row === 0 || $col === 0) {
                    $cache[$row][$col] = 1;
                } else {
                    $cache[$row][$col] = $cache[$row - 1][$col - 1] + 1;
                }

                if ($cache[$row][$col] > strlen($result)) {
                    print_r($row . ' = ' . $col . " === {$cache[$row][$col]}\n");
                    $result = substr($a, $row - $cache[$row][$col] + 1, $cache[$row][$col]);
                }

                /*   w h w w i e e e w
                 * i
                 * y
                 * e
                 * u
                 * y
                 * r
                 * w
                 * w
                 * i
                 * e
                 * e
                 * e
                 * y
                 *
                 * */
            }
        }
    }

    return $result;
}

//echo lcsubstr('iyeuyrwwieeey', 'whwwieeew') . "\n";


// find all permutations of a string
function permutate(string $str, int $left, int $right, array &$perms)
{
    if ($left == $right) {
        $perms[] = $str;
    }

    for ($i = $left; $i <= $right; ++$i) {
        [$str[$left], $str[$i]] = [$str[$i], $str[$left]];
        permutate($str, $left + 1, $right, $perms);
        [$str[$left], $str[$i]] = [$str[$i], $str[$left]];
    }
}

function permute1(string $str, array &$perms) {
    getPermutations('', $str, $perms);

    return $perms;
}

function getPermutations(string $prefix, string $suffix, array &$perms)
{
    if (strlen($suffix) === 0) {
        $perms[] = $prefix;

        return;
    }

    for ($i = 0; $i < strlen($suffix); ++$i) {
        getPermutations(
            $prefix . $suffix[$i],
            substr($suffix, 0, $i) . substr($suffix, $i + 1,strlen($suffix) - 1),
        $perms
        );
    }
}

$str = 'abc';
$perms = [];
//
//permute1($str, $perms);

//permutate($str, 0, strlen($str) - 1, $perms);

//var_dump($perms);

//$binary = '1110';

//echo(bindec($binary));



//function decn($S) {
////    $S = ltrim($S, '0');
////     $decimalNum = bindec($S);
////        $steps = 0;
////
////        while($decimalNum > 0) {
////            ++$steps;
////
////            if ($decimalNum % 2 === 0) {
////                $decimalNum = floor($decimalNum / 2);
////            } else {
////                $decimalNum -= 1;
////            }
////        }
////
////        return $steps;
//
//    // MS codility ans i.e steps to zero
//
////    $S = ltrim($S, '0');
////    $steps = 0;
////
////    $length = strlen($S);
////
////    if ($length === 0) {
////        return 0;
////    }
////
////    $lastPosition = strlen($S) - 1;
////    $firstPosition = 0;
////
////    while($lastPosition > $firstPosition) {
////        if ($S[$lastPosition] === '0') {
////            $lastPosition -= 1;
////        } else {
////            $S[$lastPosition] = '0';
////        }
////
////        $steps++;
////    }
////
////    return ++$steps;
//
//}



