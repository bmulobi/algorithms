<?php
require_once "Graph.php";
require_once "Source/Datastructures/SinglyLinkedList.php";

/* Adjacency list type graph - good for sparse graphs */
class AdjacencyListGraph implements Graph
{
    private $vertices;
    private $adjacencyList;

    /**
     * AdjacencyListGraph constructor.
     * @param array $vertices 'set' of graph vertices
     */
    public function __construct(array $vertices)
    {
        $this->vertices = $vertices;
        $this->adjacencyList = [];
    }

    public function createGraph() {
        foreach ($this->vertices as $vertex) {
            // use vertex as key to simulate set behaviour in php
            // store adjacent vertices in list
            $this->adjacencyList[$vertex] = new SinglyLinkedList();
        }

        return $this;
    }

    public function addEdge($startVertex, $endVertex, $weight = null) {
        // prepend is O(1) so use it instead of append which is O(n)
        $this->adjacencyList[$startVertex]->prepend(
            new class($endVertex, $weight) {
                public $endVertex;
                public $weight;

                public function __construct($endVertex, $weight)
                {
                    $this->endVertex = $endVertex;
                    $this->weight = $weight;
                }
            }
        );
    }

    public function getVertex($vertex)
    {
        return $this->adjacencyList[$vertex];
    }
}

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
$graph->addEdge('H', 'G');
$graph->addEdge('H', 'D');
$graph->addEdge('H', 'E');
$graph->addEdge('H', 'F');

var_dump($graph);

//$graph = (new AdjacencyListGraph(['Nairobi', 'Mombasa', 'Machakos', 'Thika', 'Nakuru']))->createGraph();
//$graph->addEdge('Nairobi',  'Mombasa', 500);
//$graph->addEdge('Nairobi', 'Thika', 50);
//$graph->addEdge('Nairobi', 'Machakos', 100);
//$graph-
//$graph->addEdge('Thika', 'Machakos', 200);
