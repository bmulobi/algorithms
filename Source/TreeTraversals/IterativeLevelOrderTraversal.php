<?php
/* Iterative queue based implementation */
require_once "LevelOrderTraversal.php";
require_once "./source/datastructures/Queue.php";

class IterativeLevelOrderTraversal implements LevelOrderTraversal
{
    public function traverse($node)
    {
        $queue = new Queue();
        $tempNode = $node;

        // Takes linear time O(n)
        while($tempNode !== null) {
            echo $tempNode->getData() . PHP_EOL;

            $queue->enQueue($tempNode->left);
            $queue->enQueue($tempNode->right);

            $tempNode = $queue->deQueue();
        }
    }
}
