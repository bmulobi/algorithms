<?php
    // driver program to test traversals

    require_once "Node.php";
    require_once "InorderTraversal.php";
    require_once "PostorderTraversal.php";
    require_once "PreorderTraversal.php";

    // build a balanced btree
    $root = new Node(10);

    $root->left = new Node(8);
    $root->right = new Node(12);
    $root->left->left = new Node(6);
    $root->left->right = new Node(9);
    $root->right->left = new Node(11);
    $root->right->right = new Node(14);


    (new InorderTraversal())->traverse($root);
    echo PHP_EOL;

    (new PreorderTraversal())->traverse($root);
    echo PHP_EOL;

    (new PostorderTraversal())->traverse($root);
