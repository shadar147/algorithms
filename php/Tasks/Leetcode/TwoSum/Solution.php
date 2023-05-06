<?php

namespace Shadar\Algorithms\Tasks\Leetcode\TwoSum;

class Solution
{
    /**
     * @param int[] $nums
     * @param int $target
     * @return array
     */
    public function twoSum(array $nums, int $target): array
    {
        $diffs = [];

        for ($i = 0; $i < count($nums); $i++) {
            $diff = $target - $nums[$i];

            if (isset($diffs[$diff])) {
                return [$diffs[$diff], $i];
            }

            $diffs[$nums[$i]] = $i;
        }

        return [];
    }
}