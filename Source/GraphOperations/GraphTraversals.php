<?php
require_once "Source/Datastructures/Graphs/Graph.php";
require_once "Source/Datastructures/Graphs/AdjacencyListGraph.php";
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
        $visited[$startVertex] = $startVertex;
        // get vertex at top of stack
        $currentVertex = $stack->peek();
        // linked list of adjacent vertices
        $currentAdjacentVertex = $this->graph->getAdjacentVertices($currentVertex)->getHead();

        while (!$stack->isEmpty()) {
            $hasUnvisitedAdjacentVertices = false;

            while ($currentAdjacentVertex) {
                $vertex = $currentAdjacentVertex->getData()->endVertex;
                $isVisited = ($visited[$vertex] ?? null) === $vertex;

                // if $vertex is not yet visited
                if (!$isVisited) {
                    $hasUnvisitedAdjacentVertices = true;
                    $stack->push($vertex);
                    $visited[$vertex] = $vertex;
                    break;
                }
                $currentAdjacentVertex = $currentAdjacentVertex->getNext();
            }

            if (!$hasUnvisitedAdjacentVertices) {
                $stack->pop();
            }

            if (!$stack->isEmpty()) {
                $currentAdjacentVertex = $this->graph->getAdjacentVertices($stack->peek())->getHead();
            } else {
                $currentAdjacentVertex = null;
            }
        }
        // array of graph vertices in DFS order
        return $visited;
    }
}
