<?php

namespace Shadar\Algorithms\Tasks\Leetcode\AddTwoNumbers;

use Shadar\Algorithms\Structures\ListNode;

class Solution
{
    public function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $head = new ListNode();
        $res = $head;
        $increase = 0;

        while (!is_null($l1) || !is_null($l2) || $increase) {
            $sum = $increase;
            $increase = 0;

            if (!is_null($l1)) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }
            if (!is_null($l2)) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }
            if ($sum >= 10) {
                $increase += 1;
                $sum %= 10;
            }

            $res->next = new ListNode($sum);
            $res = $res->next;
        }

        if ($increase > 0) {
            $res->next = new ListNode($increase);
        }

        return $head->next;
    }
}