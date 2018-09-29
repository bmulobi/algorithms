<?php
require_once "Traversals.php";

class PostorderTraversal implements Traversals
{
    public function traverse($node)
    {
        if ($node === null ) { return; }

        // recur on left child
        $this->traverse($node->left);

        // recur on right child
        $this->traverse($node->right);

        // print node data
        echo $node->getData() . PHP_EOL;
    }
}