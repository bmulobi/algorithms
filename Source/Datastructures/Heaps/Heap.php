<?php
/*
 * some important heap formulas: when using array implementation
 * get_parent_index = (index - 1) / 2 take floor
 * get_left_child_index = index * 2 + 1
 * get_right_child = index * 2 + 2
 *
 */
interface Heap
{
    public function insert($data);
    public function peek();
    public function poll();
    public function isEmpty();
}