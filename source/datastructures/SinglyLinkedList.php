<?php
require_once "LinkedListNodes/SinglyLinkedListNode.php";

/* Singly linked list class */
class SinglyLinkedList
{
    private $head;

    public function __construct($node = null) {
        $this->head = $node;
    }

    public function contains($data) {
        if ($this->head === null) { return false; }

        $currentNode = $this->head;

        while($currentNode) {
            if ($currentNode->getData() === $data) {
                return true;
            }
            $currentNode = $currentNode->getNext();
        }

        return false;
    }

    public function delete($data) {
        // no node in list
        if ($this->head === null) { return; }

        // head is target node, also handles case of single node in list
        if ($this->head->getData() === $data) {
            // sets head to null if it's the only node
            $this->head = $this->head->getNext();
        } else {
            // multiple nodes in list
            $currentNode = $this->head;

            while ($currentNode->getNext()) {
                if ($currentNode->getNext()->getData() === $data) {
                    $currentNode->setNext($currentNode->getNext()->getNext());
                    break;
                }

                $currentNode = $currentNode->getNext();
            }
        }
    }

    public function prepend($data) {
        $newNode = new SinglyLinkedListNode($data);
        $newNode->setNext($this->head);
        $this->head = $newNode;
    }

    public function append($data) {
        $newNode = new SinglyLinkedListNode($data);

        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $currentNode = $this->head;

            while($currentNode->getNext()) {
                $currentNode = $currentNode->getNext();
            }

            $currentNode->setNext($newNode);
        }
    }

    public function getHead() {
        return $this->head;
    }

    public function getTail() {
        if ($this->head === null) {
            return false;
        } elseif($this->head->getNext() === null) {
            return false;
        } else {
            $currentNode = $this->head;

            while($currentNode->getNext()) {
                $currentNode = $currentNode->getNext();
            }

            return $currentNode;
        }
    }
}

$list = new SinglyLinkedList(new SinglyLinkedListNode(0));
$list->append(1);
$list->append(2);
$list->append(3);
$list->append(4);
$list->append(5);
$list->append(6);
$list->append(7);

var_dump($list->getHead()->getData(), $list->getTail()->getData());

$list->delete(0);
var_dump($list->getHead()->getData());
