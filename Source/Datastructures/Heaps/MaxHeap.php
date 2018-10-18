<?php
require_once "Source/DataStructures/Heaps/BaseHeap.php";
require_once "Source/DataStructures/Heaps/Util.php";

class MaxHeap extends BaseHeap implements Heap
{
    use Util;

    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
        $this->constructHeap();
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
        while ($this->hasLeftChild($currentNodeIndex)) {
            $max = $this->getLeftChildIndex($currentNodeIndex);

            if ($this->hasRightChild($currentNodeIndex) &&
                ($this->getRightChild($currentNodeIndex) > $this->getLeftChild($currentNodeIndex))
            ) {
                $max = $this->getRightChildIndex($currentNodeIndex);
            }

            if ($this->items[$max] > $this->items[$currentNodeIndex]) {
                $this->swap($this->items, $currentNodeIndex, $max);
                $currentNodeIndex = $max;
            } else {
                break;
            }

        }
    }
}
