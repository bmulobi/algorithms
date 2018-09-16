<?php
require_once "Source/Datastructures/Graphs/Graph.php";

/**
 * Dijkstra, todo Bellman Ford, Floyd Warshall
 */
class ShortestPath
{
    private $graph;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    // Dijkstra's single source shortest path algorithm
    public function dijkstra($sourceVertex) {
        $visited = [];
        $unVisited = array_keys($this->graph->getAdjacencyList());
        // table to store the result of running the algorithm on this graph
        $result = [];
        $countVertices = $this->graph->getNumberOfVertices();

        // initialise shortest known distance to each vertex from source vertex
        foreach ($unVisited as $vertex) {
            if ($vertex === $sourceVertex) {
                $result[$vertex]['shortestDistance'] = 0;
            } else {
                // 'infinity' since we don't yet know the distance
                $result[$vertex]['shortestDistance'] = PHP_INT_MAX;
            }
        }

        $currentVertex = $sourceVertex;
        while(count($visited) < $countVertices) {
            // get first adjacent vertex, if any
            $currentAdjacentVertex = $this->graph->getAdjacentVertices($currentVertex)->getHead();

            // loop through adjacent vertices and compute their shortest known distance from source vertex
            while($currentAdjacentVertex) {
                $shortestDistance =
                    $result[$currentVertex]['shortestDistance'] + $currentAdjacentVertex->getData()->weight;

                // update shortest distance if necessary
                if ($shortestDistance < $result[$currentAdjacentVertex->getData()->endVertex]['shortestDistance']) {
                    $result[$currentAdjacentVertex->getData()->endVertex]['shortestDistance'] = $shortestDistance;
                    $result[$currentAdjacentVertex->getData()->endVertex]['previousVertex'] = $currentVertex;
                }
                $currentAdjacentVertex = $currentAdjacentVertex->getNext();
            }
            $visited[$currentVertex] = $currentVertex;
            $unVisited = array_diff($unVisited, $visited);

            $min = PHP_INT_MAX;
            // get unvisited vertex with shortest distance from source vertex
            foreach ($unVisited as $vertex) {
                if ($result[$vertex]['shortestDistance'] < $min) {
                    $min = $result[$vertex]['shortestDistance'];
                    $minKey = $vertex;
                }
            }
            $currentVertex = $minKey;
        }

        return $result;
    }

    /**
     * @param array $dijkstraResult result of running dijkstra() on graph
     * @param mixed $startVertex    the startVertex used to run dijkstra
     * @param mixed $endVertex      destination vertex
     */
    public function printShortestDistance($dijkstraResult, $startVertex, $endVertex) {
        $currentVertex = $endVertex;
        $pathDistance = $dijkstraResult[$currentVertex]['shortestDistance'];
        $path = [$currentVertex];

        while ($currentVertex !== $startVertex) {
            $currentVertex = $dijkstraResult[$currentVertex]['previousVertex'];
            $path[] = $currentVertex;
        }

        $str = sprintf(
            "Shortest path from %s to %s is: %s with distance: %d",
            $startVertex, $endVertex, implode(" -> ", array_reverse($path)), $pathDistance
        );
        echo $str . PHP_EOL;
    }
}
