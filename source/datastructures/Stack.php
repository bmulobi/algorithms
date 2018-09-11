<?php

    /** LIFO linear data structure  */
    class Stack
    {
        private $top;
        private $items;


        public function __construct()
        {
            $this->top = -1;
            $this->items = [];
        }

        public function isEmpty(): bool {
            return $this->top === -1;
        }

        public function push($item) {
            $this->top++;
            $this->items[$this->top] = $item;
        }

        public function pop() /* return mixed */ {
            if (!$this->isEmpty()) {
                $item = $this->items[$this->top];
                unset($this->items[$this->top]);
                $this->top--;

                return $item;
            }
            return false;
        }

        public function peek() {
            if (!$this->isEmpty()) {
                return $this->items[$this->top];
            }
            return false;
        }

        public function clear(): void {
            $this->items = [];
        }
    }
