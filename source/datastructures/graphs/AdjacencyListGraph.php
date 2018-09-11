<?php
/* Adjacency list type graph - good for sparse graphs */
class AdjacencyListGraph implements Graph
{
    private $vertices;
    private $adjacencyList;

    public function __construct(array $vertices)
    {
        $this->vertices = $vertices;
        $this->adjacencyList = [];
    }

    public function createGraph() {
        foreach ($this->vertices as $vertex) {
            $this->adjacencyList[$vertex] = new SinglyLinkedList();
        }

        return $this;
    }

    public function addEdge($startVertex, $endVertex, $weight = null) {
        // prepend is O(1) so use it instead of append which is O(n)
        $this->adjacencyList[$startVertex]->prepend(
            new class($endVertex, $weight) {
                private $endVertex;
                private $weight;

                public function __construct($endVertex, $weight)
                {
                    $this->endVertex = $endVertex;
                    $this->weight = $weight;
                }
            }
        );
    }
}


$graph = (new AdjacencyListGraph(['A', 'B', 'C', 'D', 'E', 'F']))->createGraph();
$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('A', 'D');




//$graph = (new AdjacencyListGraph(['Nairobi', 'Mombasa', 'Machakos', 'Thika', 'Nakuru']))->createGraph();
//$graph->addEdge('Nairobi',  'Mombasa', 500);
//$graph->addEdge('Nairobi', 'Thika', 50);
//$graph->addEdge('Nairobi', 'Machakos', 100);
//$graph-
//$graph->addEdge('Thika', 'Machakos', 200);
