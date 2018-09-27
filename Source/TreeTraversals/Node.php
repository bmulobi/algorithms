<?php
/**
 * Blueprint for a binary tree data structure node
 * Class Node
 */
class Node
{
    private $data;
    // pointer to left child
    public $left;
    // pointer to right child
    public $right;

    public function __construct($data, Node $left = null, Node $right = null)
    {
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }
}
