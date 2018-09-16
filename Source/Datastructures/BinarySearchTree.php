<?php
class BinarySearchTree
{
    private $root;
    private $data;

    public function __construct(array $data = [], $root = null)
    {
        $this->root = $root;
        $this->data = $data;
        $this->constructBST($this->data);
    }

    private function constructBST(array $data) {
        if ($data) {
            foreach ($data as $datum) {
                $this->insert($this->root, $datum);
            }
        }
    }

    private function createNode($data) {
        return new class($data, $left = null, $right = null) {
            public $data;
            public $left;
            public $right;

            public function __construct($data, $left, $right)
            {
                $this->data = $data;
                $this->left = $left;
                $this->right = $right;
            }
        };
    }

    public function insert($currentNode, $data) {
        if ($this->root === null) {
            $this->root = $this->createNode($data);

        } else if($data <= $this->root->data) {
            $this->insert($this->root->left, $data);

        } else {
            $this->insert($this->root->right, $data);
        }

        return $currentNode;
    }

    public function delete($data) {

    }

    public function search($data) {

    }
}
