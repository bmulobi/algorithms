<?php
    // driver program to test traversals

    require_once "Node.php";
    require_once "InorderTraversal.php";
    require_once "PostorderTraversal.php";
    require_once "PreorderTraversal.php";
    require_once "LevelOrderTraversal.php";

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

    (new InorderTraversal())->traverse($root);
    echo PHP_EOL;

    (new PreorderTraversal())->traverse($root);
    echo PHP_EOL;

    (new PostorderTraversal())->traverse($root);
    echo PHP_EOL;

    echo (new LevelOrderTraversal())->traverse($root);
