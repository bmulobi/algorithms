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

    public function getAdjacentVertices($vertex)
    {
        return $this->adjacencyList[$vertex];
    }

    public function isConnected($startVertex, $endVertex)
    {
        // TODO: Implement isConnected() method.
    }
}
