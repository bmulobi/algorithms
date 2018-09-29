<?php
require_once "Source/DataStructures/Heaps/Heap.php";
require_once "Source/DataStructures/Heaps/MaxHeap.php";
require_once "Source/DataStructures/Heaps/MinHeap.php";
require_once "Source/DataStructures/PriorityQueue.php";



//$m = new MinHeap([9,8,7,6,5,-90,4,3,2,1]);
//
//echo "min heap output\n";
//
//while(!$m->isEmpty()) {
//    echo $m->poll() . "\n";
//}
//
//echo "max heap output\n";
//$m = new MaxHeap([1,2,3,4,100,5,6,7,8,9, -3]);
//
//while(!$m->isEmpty()) {
//    echo $m->poll() . "\n";
//}


class DoHeap
{
    private $heap;

    public function __construct(Heap $heap)
    {
        $this->heap = $heap;
    }

    public function printHeap() {
        while(!$this->heap->isEmpty()) {
            echo $this->heap->poll() . "\n";
        }
    }
}

echo "MaxHeap\n";
(new DoHeap(new MaxHeap([1,2,3,4,100,5,6,7,8,9, -3])))->printHeap();


echo "\nMinHeap\n";
(new DoHeap(new MinHeap([3000, 1,2,3,4,100,5,6,7,8,9, -3, -344])))->printHeap();


$minPriorityQueue = (new PriorityQueue(new MinHeap([9, 7, 6, 77, 8, 233, -2])))->getHeap();


$maxPriorityQueue = (new PriorityQueue(new MaxHeap([9, 7, 6, 77, 8, 233, -2])))->getHeap();

echo "\n";
while(!$minPriorityQueue->isEmpty() && !$maxPriorityQueue->isEmpty()) {
    echo "minPQ = " . $minPriorityQueue->poll() . " and maxPQ = " . $maxPriorityQueue->poll() . "\n";
}
