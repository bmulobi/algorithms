<?php

    /* Node for a doubly linked list */
    class DoublyLinkedListNode implements LinkedListNode
    {
        private $data;
        private $next;
        private $previous;

        public function __construct($data, $previous = null, $next = null) {
            $this->data = $data;
            $this->previous = $previous;
            $this->next = $next;
        }

        public function getData() {
            return $this->data;
        }

        public function setData($data) {
            $this->data = $data;
        }

        public function getNext() {
            return $this->next;
        }

        public function setNext($next) {
            $this->next = $next;
        }

        public function getPrevious() {
            return $this->previous;
        }

        public function setPrevious($previous) {
            $this->previous = $previous;
        }
    }
