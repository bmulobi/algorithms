<?php
    require_once "Traversals.php";

    class PreorderTraversal implements Traversals
    {
        public function traverse($node)
        {
            if ($node === null ) { return; }

            // print node data
            echo $node->getData() . PHP_EOL;

            // recur on left child
            $this->traverse($node->left);

            // recur on right child
            $this->traverse($node->right);
        }
    }