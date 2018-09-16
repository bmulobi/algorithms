<?php

/* FIFO linear data structure */
class Queue
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function isEmpty(): bool {
        return !$this->items;
    }

    // add new element, return new length
    public function enQueue($item): int {
        $length = count($this->items);
        $this->items[$length] = $item;

        return $length += 1;
    }

    public function deQueue() /* return mixed */ {
        if (!$this->isEmpty()) {
            return array_shift($this->items);
        }
        return null;
    }

    public function clear(): void {
        $this->items = [];
    }
}
