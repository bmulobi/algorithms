<?php
require_once "Source/Datastructures/Graphs/Graph.php";
require_once "Source/Datastructures/Graphs/AdjacencyListGraph.php";
require_once "Source/Datastructures/Stack.php";
require_once "Source/Datastructures/Queue.php";

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

    /* BFS. supporting data structure is queue */
    public function breadthFirstSearch($startVertex) {
        $visited = [];
        $queue = new Queue();
        $queue->enQueue($startVertex);

        while (!$queue->isEmpty()) {
            $currentVertex = $queue->deQueue();
            // use vertex as key to enable O(1) random access
            $visited[$currentVertex] = $currentVertex;
            echo $currentVertex . "\n";

            $currentAdjacentVertex = $this->graph->getAdjacentVertices($currentVertex)->getHead();
            while ($currentAdjacentVertex) {
                $vertex = $visited[$currentAdjacentVertex->getData()->endVertex] ?? null;
                if (!$vertex) {
                    $queue->enQueue($vertex);
                }
                $currentAdjacentVertex = $currentAdjacentVertex->getNext();
            }
        }

        return $visited;
    }
}
