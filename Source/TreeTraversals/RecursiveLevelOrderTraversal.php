<?php
require_once "LevelOrderTraversal.php";

class RecursiveLevelOrderTraversal implements LevelOrderTraversal
{
    public function traverse($node)
    {
        return $this->printLevelOrder($node);
    }

    private function printLevelOrder($root) {
        $height = $this->getHeight($root);

        // O(n2) because of the recursion within this loop
        for ($i = 1; $i <= $height; $i++) {
            $this->printCurrentLevel($root, $i);
        }
    }

    private function printCurrentLevel($node, int $level) {
        if ($node === null) {
            return;
        } elseif ($level === 1) {
            echo $node->getData() . PHP_EOL;
        } else {
            $this->printCurrentLevel($node->left, $level - 1);
            $this->printCurrentLevel($node->right, $level - 1);
        }
    }

    private function getHeight($root) {
        if ($root === null) { return 0; }

        // compute sub tree heights
        $leftHeight = $this->getHeight($root->left);
        $rightHeight = $this->getHeight($root->right);

        // use larger one
        if ($leftHeight > $rightHeight) {
            return $leftHeight + 1;
        } else {
            return $rightHeight + 1;
        }
    }
}
