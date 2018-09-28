<?php
require_once "Traversals.php";

class InorderTraversal implements Traversals
{
    public function traverse($node)
    {
        if ($node === null ) { return; }

        // recur on left child
        $this->traverse($node->left);

        // print node data
        echo $node->getData() . PHP_EOL;

        // recur on right child
        $this->traverse($node->right);
    }
}