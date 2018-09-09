<?php
require_once "LinkedListNode.php";

/* Node for a singly linked list */
class SinglyLinkedListNode implements LinkedListNode
{
    private $data;
    private $next;

    public function __construct($data, $next = null) {
        $this->data = $data;
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
}
