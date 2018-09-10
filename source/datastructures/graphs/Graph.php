<?php
/* Interface for graph representations i.e adjacency list and adjacency matrix */
interface Graph
{
    public function createGraph();
    public function addEdge($startVertex, $endVertex, $weight = null);
}