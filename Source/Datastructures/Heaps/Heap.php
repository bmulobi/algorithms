<?php

interface Heap
{
    public function constructHeap(array $data);
    public function insert($data);
    public function pop();
    public function delete();
}