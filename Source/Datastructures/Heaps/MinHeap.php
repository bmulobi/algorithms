<?php
require_once "Source/DataStructures/Heaps/BaseHeap.php";
require_once "Source/DataStructures/Heaps/Util.php";

class MinHeap extends BaseHeap implements Heap
{
    use Util;

    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = [];
        $this->constructHeap($items);
    }

    protected function heapifyUp() {
        $currentNodeIndex = count($this->items) - 1;
        $parentIndex = $this->getParentIndex($currentNodeIndex);

        while ($this->hasParent($currentNodeIndex) &&
            $this->items[$parentIndex] > $this->items[$currentNodeIndex]
        ) {
            $this->swap($this->items, $currentNodeIndex, $parentIndex);
            $currentNodeIndex = $parentIndex;
            $parentIndex = $this->getParentIndex($currentNodeIndex);
        }
    }

    protected function heapifyDown($currentNodeIndex)
    {
//        $currentNodeIndex = $currentNodeIndex;
//        $leftChildIndex = $this->getLeftChildIndex($currentNodeIndex);
//        $rightChildIndex = $this->getRightChildIndex($currentNodeIndex);

        if ($this->hasLeftChild($currentNodeIndex) &&
            $this->getLeftChild($currentNodeIndex) < $this->items[$currentNodeIndex]
        ) {
            $this->swap($this->items, $currentNodeIndex, $this->getLeftChildIndex($currentNodeIndex));
            $currentNodeIndex = $this->getLeftChildIndex($currentNodeIndex);
            $this->heapifyDown($currentNodeIndex);

        } elseif ($this->hasRightChild($currentNodeIndex) &&
            $this->getRightChild($currentNodeIndex) < $this->items[$currentNodeIndex]
        ) {
            $this->swap($this->items, $currentNodeIndex, $this->getRightChildIndex($currentNodeIndex));
            $currentNodeIndex = $this->getRightChildIndex($currentNodeIndex);
            $this->heapifyDown($currentNodeIndex);
        }




//        while (
//            $this->items[$currentNodeIndex] < $this->items[$leftChildIndex] ||
//            $this->items[$currentNodeIndex] < $this->items[$rightChildIndex]
//        ) {
//            if ($this->items[$currentNodeIndex] < $this->items[$leftChildIndex]) {
//                $this->swap($this->items, $currentNodeIndex, $leftChildIndex);
//
//                $currentNodeIndex = $leftChildIndex;
//                $leftChildIndex = $this->getLeftChildIndex($currentNodeIndex);
//                $rightChildIndex = $this->getRightChildIndex($currentNodeIndex);
//
//            } elseif($this->items[$currentNodeIndex] < $this->items[$rightChildIndex]) {
//                $this->swap($this->items, $currentNodeIndex, $rightChildIndex);
//
//                $currentNodeIndex = $rightChildIndex;
//                $leftChildIndex = $this->getLeftChildIndex($currentNodeIndex);
//                $rightChildIndex = $this->getRightChildIndex($currentNodeIndex);
//            }
//        }
    }
}

$m = new MinHeap([1,2,3,4,5,6,7,8,9]);

while(!$m->isEmpty()) {
    echo $m->pop() . "\n";
}