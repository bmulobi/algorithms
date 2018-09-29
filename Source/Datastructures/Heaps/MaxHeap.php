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

    // height of tree O(logn)
    protected function heapifyUp() {
        $currentNodeIndex = count($this->items) - 1;

        while ($this->hasParent($currentNodeIndex) &&
            ($this->getParent($currentNodeIndex) < $this->items[$currentNodeIndex])
        ) {
            $this->swap($this->items, $currentNodeIndex, $this->getParentIndex($currentNodeIndex));

            $currentNodeIndex = $this->getParentIndex($currentNodeIndex);
        }
    }

    // height of tree O(logn)
    protected function heapifyDown($currentNodeIndex)
    {
        if ($this->hasLeftChild($currentNodeIndex) && $this->hasRightChild($currentNodeIndex)) {
            if (($this->getLeftChild($currentNodeIndex) > $this->getRightChild($currentNodeIndex))
            && ($this->getLeftChild($currentNodeIndex) > $this->items[$currentNodeIndex])
            ) {
                $this->swap($this->items, $currentNodeIndex, $this->getLeftChildIndex($currentNodeIndex));
                $this->heapifyDown($this->getLeftChildIndex($currentNodeIndex));

            } elseif ($this->getRightChild($currentNodeIndex) > $this->getLeftChild($currentNodeIndex)
            && ($this->getRightChild($currentNodeIndex) > $this->items[$currentNodeIndex])
            ) {
                $this->swap($this->items, $currentNodeIndex, $this->getRightChildIndex($currentNodeIndex));
                $this->heapifyDown($this->getRightChildIndex($currentNodeIndex));
            }

        } elseif ($this->hasLeftChild($currentNodeIndex)
            && ($this->getLeftChild($currentNodeIndex) > $this->items[$currentNodeIndex])
        ) {
            $this->swap($this->items, $currentNodeIndex, $this->getLeftChildIndex($currentNodeIndex));
            $this->heapifyDown($this->getLeftChildIndex($currentNodeIndex));

        } elseif ($this->hasRightChild($currentNodeIndex)
            && ($this->getRightChild($currentNodeIndex) > $this->items[$currentNodeIndex])
        ) {
            $this->swap($this->items, $currentNodeIndex, $this->getRightChildIndex($currentNodeIndex));
            $this->heapifyDown($this->getRightChildIndex($currentNodeIndex));
        }
    }
}
