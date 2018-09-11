<?php
/* Linked list node interface - 2 implementations i.e singly/circularly and doubly linked list nodes */
interface LinkedListNode
{
    function getData();
    function setData($data);
    function getNext();
    function setNext($next);
}
