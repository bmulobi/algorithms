<?php
require_once "source/Datastructures/Graphs/Graph";
require_once "Source/Datastructures/AdjacencyListGraph.php";
require_once "Source/Datastructures/Stack.php";

class GraphTraversals
{
    private $graph;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    /* DFS. Supporting data structure is Stack */
    public function depthFirstSearch($startVertex) {
        $visited = [];
        $stack = new Stack();
        $stack->push($startVertex);
        $visited[] = $startVertex;

        while (!$stack->isEmpty()) {
            // get vertex at top of stack
            $currentVertex = $stack->peek();
            // linked list of adjacent vertices
            $currentAdjacentVertex = $this->graph->getVertex($currentVertex)->getHead();

            $hasUnvisitedAdjacentVertices = false;
            while ($currentAdjacentVertex) {
                $vertex = $visited[$currentAdjacentVertex->getData()->endVertex] ?? null;

                // if $vertex is not yet visited
                if (!$vertex) {
                    $hasUnvisitedAdjacentVertices = true;
                    $stack->push($vertex);
                    $visited[] = $vertex;
                    break;
                }
            }

            if (!$hasUnvisitedAdjacentVertices) {
                $stack->pop();
            }
            $currentAdjacentVertex = $stack->peek();
        }
        // array of graph vertices in DFS order
        return $visited;
    }
}
