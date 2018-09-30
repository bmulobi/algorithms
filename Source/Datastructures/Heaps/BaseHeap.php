<?php
require_once "Source/DataStructures/Heaps/Heap.php";

abstract class BaseHeap implements Heap
{
    protected $items = [];

    abstract protected function heapifyUp();
    abstract protected function heapifyDown($currentNodeIndex);

    protected function constructHeap()
    {
        for ($i = count($this->items) - 1; $i > -1; $i--) {
            if ($this->hasLeftChild($i)) {
                $this->heapifyDown($i);
            }
        }
    }

    protected function getParentIndex($childIndex)
    {
        return ($childIndex - 1) / 2;
    }

    protected function getLeftChildIndex($parentIndex)
    {
        return $parentIndex * 2 + 1;
    }

    protected function getRightChildIndex($parentIndex)
    {
        return $parentIndex * 2 + 2;
    }

    protected function hasLeftChild($parentIndex) {
        return $this->getLeftChildIndex($parentIndex) < count($this->items);
    }

    protected function hasRightChild($parentIndex) {
        return $this->getRightChildIndex($parentIndex) < count($this->items);
    }

    protected function hasParent($childIndex) {
        return $this->getParentIndex($childIndex) >= 0;
    }

    protected function getLeftChild($parentIndex) {
        return $this->items[$this->getLeftChildIndex($parentIndex)];
    }

    protected function getRightChild($parentIndex) {
        return $this->items[$this->getRightChildIndex($parentIndex)];
    }

    protected function getParent($childIndex) {
        return $this->items[$this->getParentIndex($childIndex)];
    }

    public function isEmpty(): bool
    {
        return !$this->items;
    }

    // O(logn)
    public function insert($data)
    {
        array_push($this->items, $data);
        $this->heapifyUp();
    }

    // See what's at the root. O(1)
    public function peek()
    {
        if ($this->isEmpty()) { return; }
        return $this->items[0];
    }

    // get root i.e max or min element. O(1)
    public function poll()
    {
        if ($this->isEmpty()) { return; }

        $length = count($this->items);
        if ($length === 1) {
            $rootElement = $this->items[0];
            $this->items = [];
            return $rootElement;
        }

        $rootElement = $this->items[0];
        $this->items[0] = $this->items[$length - 1];
        unset($this->items[$length - 1]);
        $this->heapifyDown(0);

        return $rootElement;
    }
}
