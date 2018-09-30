<?php
require_once "Source/DataStructures/Heaps/MaxHeap.php";
require_once "Source/DataStructures/Heaps/MinHeap.php";

const NON_DECREASING = 'NON_DECREASING';
const NON_INCREASING = 'NON_INCREASING';

function heapSort(array $items, $flag = NON_DECREASING) {
    $result = [];

    switch ($flag) {
        case 'NON_DECREASING':
            $heap = new MinHeap($items);
            break;
        case 'NON_INCREASING':
            $heap = new MaxHeap($items);
            break;
        default:
            throw new Exception("Unknown flag");
    }

    while (!$heap->isEmpty()) {
        $result[] = $heap->poll();
    }

    return $result;
}



echo "\nnonDecreasingHeapSort\n";
var_dump(heapSort([1,2,7,7,8,3,8,4,100,5,4,6,7,8,9,4,5,-3,5,5,8,7]));

echo   "\nnonIncreasingHeapSort\n";
var_dump(heapSort([1,2,7,7,8,3,8,4,100,5,4,6,7,8,9,4,5,-3,5,5,8,7], NON_INCREASING));
