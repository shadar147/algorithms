<?php

namespace Shadar\Algorithms\Structures;

class LinkedList
{
    private ?ListNode $head;
    private int $count = 0;

    public function add(int $val): void
    {
        $node = new ListNode($val);

        if (is_null($this->head)) {
            $this->head = $node;
        } else {
            $currentNode = $this->head;

            while (!is_null($currentNode->next)) {
                $currentNode = $currentNode->next;
            }

            $currentNode->next = $node;
        }
    }
}