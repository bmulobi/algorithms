<?php

// crush a linked list

class ListNode
{
    public $data;
    public $next;

    public function __construct(int $data, ?ListNode $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }
}

class Solution
{
    public function crushLinkedList(ListNode $head): ListNode {
        if ($head->next === null) {
            return $head;
        }

        $didNotCrush = false;

        while (!$didNotCrush) {
            $didNotCrush = true;
            $shouldCrush = false;
            $leftCrushPos = $head;
            $currentPos = $head;

            while ($currentPos) {
                if ($currentPos->data === $currentPos->next->data ?? null) {
                    $shouldCrush = true;
                } else {
                    if ($shouldCrush) {
                        $didNotCrush = false;
                        $shouldCrush = false;

                        if ($leftCrushPos === $currentPos) {
                            $head = $currentPos->next;
                        } else {
                            $leftCrushPos->next = $currentPos->next;
                        }
                    }
                }

                $currentPos = $currentPos->next;
            }
        }

        return $head;
    }

    public function runLengthEncode(string $data): string
    {
        $result = '';
        $length = strlen($data);
        $currentCount = 1;
        $currentChar = $data[0];

        for ($i = 1; $i < $length; $i++) {
            if ($data[$i] === $currentChar) {
                $currentCount++;

                if ($i === $length - 1) {
                    $result .= $currentChar . $currentCount;
                }
            } else {
                $result .= $currentChar . $currentCount;
                $currentCount = 1;
                $currentChar = $data[$i];
            }
        }

        return $result;
    }

    public function runLengthDecode(string $data): string
    {
        $result = '';
        $length = strlen($data);
        $index = 0;

        while($index < $length) {
            $result .= str_repeat($data[$index], $data[$index + 1]);
            $index += 2;
        }

        return $result;
    }
}

$solution = new Solution();

$inString = 'aaabbcdd';

$result = $solution->runLengthEncode($inString);

echo "\n" . $result . "\n";


$result = $solution->runLengthDecode('m2n5d2');


echo "\n" . $result . "\n";


//$head = new ListNode(1);
//$head->next = new ListNode(2, new ListNode(3, new ListNode(3, new ListNode(4, new ListNode(4,
//new ListNode(2, new ListNode(2, new ListNode(3, new ListNode(5)))))))));
//
//$solution = new Solution();
//
//$head = $solution->crushLinkedList($head);
//
//$currentNode = $head;
//
//while ($currentNode) {
//    echo "\n" . $currentNode->data;
//    $currentNode = $currentNode->next;
//}



