<?php

namespace Shadar\Algorithms\Structures;

class LinkedList
{
    private ?ListNode $head = null;

    public function __construct(array $struct = [])
    {
        if (!empty($struct)) {
            foreach ($struct as $el) {
                if (!is_int($el)) {
                    throw new \Exception('Bad type for creating linked list');
                }

                $this->add($el);
            }
        }
    }

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

    public function getHead(): ?ListNode
    {
        return $this->head;
    }
}