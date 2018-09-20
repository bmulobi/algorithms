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

            /**
             * @return mixed
             */
            public function getData()
            {
                return $this->data;
            }
        };
    }

    public function insert(&$currentNode, $data) {
        var_dump($currentNode);
        if ($currentNode === null) {
            $currentNode = $this->createNode($data);
        } else if($data <= $currentNode->data) {
            $currentNode->left = $this->insert($currentNode->left, $data);

        } else {
            $currentNode->right = $this->insert($currentNode->right, $data);
        }

        return $currentNode;
    }

    public function delete($data) {

    }

    public function search($data) {

    }

    public function getRoot() {
        return $this->root;
    }
}
