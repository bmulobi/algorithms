<?php
require_once "Source/DataStructures/Heaps/MaxHeap.php";
require_once "Source/DataStructures/Heaps/MinHeap.php";

function nonDecreasingHeapSort(array $items) {
    $result = [];
    $minHeap = new MinHeap($items);

    while (!$minHeap->isEmpty()) {
        $result[] = $minHeap->poll();
    }

    return $result;
}

function nonIncreasingHeapSort(array $items) {
    $result = [];
    $maxHeap = new MaxHeap($items);

    while (!$maxHeap->isEmpty()) {
        $result[] = $maxHeap->poll();
    }

    return $result;
}


echo "\nnonDecreasingHeapSort([1,2,7,7,8,3,8,4,100,5,4,6,7,8,9,4,5,-3,5,5,8,7])\n";
var_dump(nonDecreasingHeapSort([1,2,7,7,8,3,8,4,100,5,4,6,7,8,9,4,5,-3,5,5,8,7]));

echo   "\nnonIncreasingHeapSort([1,2,7,7,8,3,8,4,100,5,4,6,7,8,9,4,5,-3,5,5,8,7])\n";
var_dump(nonIncreasingHeapSort([1,2,7,7,8,3,8,4,100,5,4,6,7,8,9,4,5,-3,5,5,8,7]));
