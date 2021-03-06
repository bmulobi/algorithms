<?php
// driver program to test traversals

require_once "Node.php";
require_once "InorderTraversal.php";
require_once "PostorderTraversal.php";
require_once "PreorderTraversal.php";
require_once "RecursiveLevelOrderTraversal.php";
require_once "IterativeLevelOrderTraversal.php";
require_once "Source/Datastructures/BinarySearchTree.php";


$bst = (new BinarySearchTree([5,9,3,90,22,44,77,13,11,13,77,1]));


echo "inOrder traversal result\n";
(new InorderTraversal())->traverse($bst->getRoot());
echo PHP_EOL;


$root = $bst->getRoot();
var_dump($root->getData());
$bst->delete($root, 90);
var_dump($bst->getRoot()->getData());


echo "inOrder traversal result\n";
(new InorderTraversal())->traverse($bst->getRoot());
echo PHP_EOL;
exit;





// build a balanced BST
$root = new Node(10);

$root->left = new Node(8);
$root->right = new Node(12);
$root->left->left = new Node(6);
$root->left->right = new Node(9);
$root->right->left = new Node(11);
$root->right->right = new Node(14);
$root->left->left->left = new Node(5);
$root->left->left->right = new Node(7);

echo "inOrder traversal result\n";
(new InorderTraversal())->traverse($root);
echo PHP_EOL;

echo "preOrder traversal result\n";
(new PreorderTraversal())->traverse($root);
echo PHP_EOL;

echo "postOrder traversal result\n";
(new PostorderTraversal())->traverse($root);
echo PHP_EOL;

echo "levelOrder traversal result\n";
echo (new RecursiveLevelOrderTraversal())->traverse($root);
echo PHP_EOL;

echo "levelOrder traversal result\n";
(new IterativeLevelOrderTraversal())->traverse($root);
