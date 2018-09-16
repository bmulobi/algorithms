<?php
/* driver program to test graph algorithms */

require_once "Source/Datastructures/Graphs/AdjacencyListGraph.php";
require_once "Source/GraphOperations/GraphTraversals.php";


// unweighted graph
$graph = (new AdjacencyListGraph(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']))->createGraph();

// add vertices adjacent to A
$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('A', 'D');

// add vertices adjacent to B
$graph->addEdge('B', 'A');
$graph->addEdge('B', 'E');
$graph->addEdge('B', 'F');

// add vertices adjacent to C
$graph->addEdge('C', 'A');
$graph->addEdge('C', 'G');

// add vertices adjacent to D
$graph->addEdge('D', 'A');
$graph->addEdge('D', 'H');

// add vertices adjacent to E
$graph->addEdge('E', 'B');
$graph->addEdge('E', 'H');

// add vertices adjacent to F
$graph->addEdge('F', 'B');
$graph->addEdge('F', 'H');

// add vertices adjacent to G
$graph->addEdge('G', 'C');
$graph->addEdge('G', 'H');

// add vertices adjacent to H
$graph->addEdge('H', 'D');
$graph->addEdge('H', 'E');
$graph->addEdge('H', 'F');
$graph->addEdge('H', 'G');

// unweighted graph
$graph1 = (new AdjacencyListGraph(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']))->createGraph();
$graph1->addEdge('A', 'G');
$graph1->addEdge('A', 'D');
$graph1->addEdge('A', 'B');

$graph1->addEdge('B', 'F');
$graph1->addEdge('B', 'E');
$graph1->addEdge('B', 'A');

$graph1->addEdge('C', 'H');
$graph1->addEdge('C', 'F');

$graph1->addEdge('D', 'F');
$graph1->addEdge('D', 'A');

$graph1->addEdge('E', 'G');
$graph1->addEdge('E', 'B');

$graph1->addEdge('F', 'D');
$graph1->addEdge('F', 'C');
$graph1->addEdge('F', 'B');

$graph1->addEdge('G', 'E');
$graph1->addEdge('G', 'A');

var_dump($graph1->isConnected('F', 'D'));

$traverser = new GraphTraversals($graph);
var_dump($traverser->depthFirstSearch('G'));
var_dump($traverser->breadthFirstSearch('G'));


$traverser = new GraphTraversals($graph1);
var_dump($traverser->depthFirstSearch('A'));
var_dump($traverser->breadthFirstSearch('A'));


// output
/*
    array(8) {
    ["G"]=>
  string(1) "G"
    ["H"]=>
  string(1) "H"
    ["F"]=>
  string(1) "F"
    ["B"]=>
  string(1) "B"
    ["E"]=>
  string(1) "E"
    ["A"]=>
  string(1) "A"
    ["D"]=>
  string(1) "D"
    ["C"]=>
  string(1) "C"
}
array(8) {
    ["G"]=>
  string(1) "G"
    ["H"]=>
  string(1) "H"
    ["C"]=>
  string(1) "C"
    ["F"]=>
  string(1) "F"
    ["E"]=>
  string(1) "E"
    ["D"]=>
  string(1) "D"
    ["A"]=>
  string(1) "A"
    ["B"]=>
  string(1) "B"
}
array(8) {
    ["A"]=>
  string(1) "A"
    ["B"]=>
  string(1) "B"
    ["E"]=>
  string(1) "E"
    ["G"]=>
  string(1) "G"
    ["F"]=>
  string(1) "F"
    ["C"]=>
  string(1) "C"
    ["H"]=>
  string(1) "H"
    ["D"]=>
  string(1) "D"
}
array(8) {
    ["A"]=>
  string(1) "A"
    ["B"]=>
  string(1) "B"
    ["D"]=>
  string(1) "D"
    ["G"]=>
  string(1) "G"
    ["E"]=>
  string(1) "E"
    ["F"]=>
  string(1) "F"
    ["C"]=>
  string(1) "C"
    ["H"]=>
  string(1) "H"
}
*/
