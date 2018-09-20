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

            public function setData($data) {
                $this->data = $data;
            }
        };
    }

    public function insert(&$currentNode, $data) {
        if ($currentNode === null) {
            $currentNode = $this->createNode($data);
        } else if($data <= $currentNode->data) {
            $currentNode->left = $this->insert($currentNode->left, $data);

        } else {
            $currentNode->right = $this->insert($currentNode->right, $data);
        }

        return $currentNode;
    }

    public function delete(&$currentNode, $data) {
        if(!$currentNode) {
            return $currentNode;
        } elseif($data < $currentNode->getData()) {
            $currentNode->left = $this->delete($currentNode->left, $data);
        } elseif($data > $currentNode->getData()) {
            $currentNode->right = $this->delete($currentNode->right, $data);
        } else {
            // case 1: target node is leaf node
            if (null === $currentNode->left && null === $currentNode->right) {
                $currentNode = null;

              // case 2: target node has 2 children
            } elseif ($currentNode->left && $currentNode->right) {
                $minAtRightSubTree = $this->getMin($currentNode->right);
                $currentNode->setData($minAtRightSubTree);

                $this->delete($currentNode->right, $minAtRightSubTree);

              // case 3: target node has left child only
            } elseif($currentNode->left) {
                $currentNode = $currentNode->left;

              // case 4: target node has right child only
            } elseif($currentNode->right) {
                $currentNode = $currentNode->right;
            }
        }

        return $currentNode;
    }

    public function search(&$currentNode, $data) {
        if (!$this->root) {
             return false;
        } elseif ($currentNode && ($data === $currentNode->getData())) {
            return true;
        } elseif($currentNode && ($data < $currentNode->getData())) {
            return $this->search($currentNode->left, $data);
        } elseif($currentNode && ($data > $currentNode->getData())) {
             return $this->search($currentNode->right, $data);
        }

        return false;
    }

    /**
     * @param $currentNode
     * Pass in root node to get min of entire tree
     * or any other node to get min of subtree rooted at that node
     * @return node object
     */
    public function getMin($currentNode) {
        if (!$this->getRoot()) {
            return "Tree is empty";
        }

        while($currentNode->left) {
            $currentNode = $currentNode->left;
        }

        return $currentNode->getData();
    }

    public function getMax() {
        if (!$this->getRoot()) {
            return "Tree is empty";
        }

        $currentNode = $this->getRoot();
        while($currentNode->right) {
            $currentNode = $currentNode->right;
        }

        return $currentNode->getData();
    }

    public function getRoot() {
        return $this->root;
    }
}
