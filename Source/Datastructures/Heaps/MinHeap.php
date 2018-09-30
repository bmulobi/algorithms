<?php
require_once "Source/DataStructures/Heaps/BaseHeap.php";
require_once "Source/DataStructures/Heaps/Util.php";

class MinHeap extends BaseHeap implements Heap
{
    use Util;

    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
        $this->constructHeap();
    }

    protected function heapifyUp()
    {
        $currentNodeIndex = count($this->items) - 1;

        while ($this->hasParent($currentNodeIndex) &&
            $this->getParent($currentNodeIndex) > $this->items[$currentNodeIndex]
        ) {
            $this->swap($this->items, $currentNodeIndex, $this->getParentIndex($currentNodeIndex));
            $currentNodeIndex = $this->getParentIndex($currentNodeIndex);
        }
    }

    protected function heapifyDown($currentNodeIndex)
    {
        while ($this->hasLeftChild($currentNodeIndex)) {
            $min = $this->getLeftChildIndex($currentNodeIndex);

            if ($this->hasRightChild($currentNodeIndex) &&
                ($this->getRightChild($currentNodeIndex) < $this->getLeftChild($currentNodeIndex))
            ) {
                $min = $this->getRightChildIndex($currentNodeIndex);
            }

            if ($this->items[$min] < $this->items[$currentNodeIndex]) {
                $this->swap($this->items, $currentNodeIndex, $min);
                $currentNodeIndex = $min;
            } else {
                break;
            }

        }
    }
}
