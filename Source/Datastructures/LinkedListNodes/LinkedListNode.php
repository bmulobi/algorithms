<?php
/* Linked list node interface - 2 implementations i.e singly/circularly and doubly linked list nodes */
interface LinkedListNode
{
    public function getData();
    public function setData($data);
    public function getNext();
    public function setNext($next);
}
