<?php
require_once "Source/DataStructures/Heaps/Heap.php";
require_once "Source/DataStructures/Heaps/MinHeap.php";
require_once "Source/DataStructures/Heaps/MaxHeap.php";


class PriorityQueue
{
    private $heap;

    public function __construct(Heap $heap)
    {
        $this->heap = $heap;
    }

    public function getHeap() {
        return $this->heap;
    }
}
