<?php

trait Util
{
    function swap(array &$items, $index1, $index2)
    {
        $temp = $items[$index1];
        $items[$index1] = $items[$index2];
        $items[$index2] = $temp;
    }
}