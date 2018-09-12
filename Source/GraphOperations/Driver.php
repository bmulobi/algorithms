<?php
/* driver program to test graph algorithms */

require_once "Source/Datastructures/Graphs/AdjacencyListGraph.php";
require_once "Source/GraphOperations/GraphTraversals.php";


// undirected, unweighted graph
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

$traverser = new GraphTraversals($graph);

var_dump($traverser->depthFirstSearch('G'));


//$graph = (new AdjacencyListGraph(['Nairobi', 'Mombasa', 'Machakos', 'Thika', 'Nakuru']))->createGraph();
//$graph->addEdge('Nairobi',  'Mombasa', 500);
//$graph->addEdge('Nairobi', 'Thika', 50);
//$graph->addEdge('Nairobi', 'Machakos', 100);
//$graph-
//$graph->addEdge('Thika', 'Machakos', 200);