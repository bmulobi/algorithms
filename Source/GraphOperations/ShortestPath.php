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
            $currentAdjacentVertex = $this->graph->getAdjacentVertices($currentVertex)->getHead();

            while($currentAdjacentVertex) {
                $shortestDistance =
                    $result[$currentVertex]['shortestDistance'] + $currentAdjacentVertex->getData()->weight;

                if ($shortestDistance < $result[$currentAdjacentVertex]['shortestDistance']) {
                    $result[$currentAdjacentVertex]['shortestDistance'] = $shortestDistance;
                    $result[$currentAdjacentVertex]['previousVertex'] = $currentVertex;
                }
            }
            $visited[$currentVertex] = $currentVertex;
            $unVisited = array_diff($unVisited, $visited);

            $min = PHP_INT_MAX;
            foreach ($unVisited as $vertex) {
                if ($result[$vertex]['shortestDistance'] < $min) {
                    $min = $result[$vertex]['shortestDistance'];
                }
            }

            $currentVertex = $vertex;
        }
    }
}
