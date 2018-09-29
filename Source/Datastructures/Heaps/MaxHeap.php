<?php
require_once "Source/DataStructures/Heaps/BaseHeap.php";
require_once "Source/DataStructures/Heaps/Util.php";

class MaxHeap extends BaseHeap implements Heap
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
            $this->items[$parentIndex] < $this->items[$currentNodeIndex]
        ) {
            $this->swap($this->items, $currentNodeIndex, $parentIndex);
            $currentNodeIndex = $parentIndex;
            $parentIndex = $this->getParentIndex($currentNodeIndex);
        }
    }

    protected function heapifyDown($currentNodeIndex)
    {
        if ($this->hasLeftChild($currentNodeIndex) && $this->hasRightChild($currentNodeIndex)) {
            if ($this->getLeftChild($currentNodeIndex) > $this->getRightChild($currentNodeIndex)
            && $this->getLeftChild($currentNodeIndex) > $this->items[$currentNodeIndex]) {
                $this->swap($this->items, $currentNodeIndex, $this->getLeftChildIndex($currentNodeIndex));
                $currentNodeIndex = $this->getLeftChildIndex($currentNodeIndex);
                $this->heapifyDown($currentNodeIndex);
            } elseif ($this->getRightChild($currentNodeIndex) > $this->getLeftChild($currentNodeIndex)
            && $this->getRightChild($currentNodeIndex) > $this->items[$currentNodeIndex]
            ) {
                $this->swap($this->items, $currentNodeIndex, $this->getRightChildIndex($currentNodeIndex));
                $currentNodeIndex = $this->getRightChildIndex($currentNodeIndex);
                $this->heapifyDown($currentNodeIndex);
            }

        } elseif ($this->hasLeftChild($currentNodeIndex)
            && $this->getLeftChild($currentNodeIndex) > $this->items[$currentNodeIndex]
        ) {
            $this->swap($this->items, $currentNodeIndex, $this->getLeftChild($currentNodeIndex));
            $currentNodeIndex = $this->getLeftChildIndex($currentNodeIndex);
            $this->heapifyDown($currentNodeIndex);
        } elseif ($this->hasRightChild($currentNodeIndex)
            && $this->getRightChild($currentNodeIndex) > $this->items[$currentNodeIndex]
        ) {
            $this->swap($this->items, $currentNodeIndex, $this->getRightChildIndex($currentNodeIndex));
            $currentNodeIndex = $this->getRightChildIndex($currentNodeIndex);
            $this->heapifyDown($currentNodeIndex);
        }
    }
}
