<?php
    /**
     * Blueprint for a tree data structure node
     * Class Node
     */
    class Node
    {
        private $data;
        public $left;
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
