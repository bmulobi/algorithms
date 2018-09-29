<?php
require_once "Source/DataStructures/Heaps/MaxHeap.php";
require_once "Source/DataStructures/Heaps/MinHeap.php";



$m = new MinHeap([9,8,7,6,5,-90,4,3,2,1]);

echo "min heap output\n";

while(!$m->isEmpty()) {
    echo $m->poll() . "\n";
}

echo "max heap output\n";
$m = new MaxHeap([1,2,3,4,100,5,6,7,8,9, -3]);

while(!$m->isEmpty()) {
    echo $m->poll() . "\n";
}
