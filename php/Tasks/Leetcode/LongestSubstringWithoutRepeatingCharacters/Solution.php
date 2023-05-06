<?php

namespace Shadar\Algorithms\Tasks\Leetcode\LongestSubstringWithoutRepeatingCharacters;

class Solution
{
    public function lengthOfLongestSubstring(string $s): int
    {
        $start = 0;
        $length = 0;
        $usedChars = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (isset($usedChars[$char]) && $usedChars[$char] >= $start) {
                $start = $usedChars[$char] + 1;
            } elseif ($i - $start === $length) {
                $length++;
            }
            $usedChars[$char] = $i;
        }
        return $length;
    }

    public function lengthOfLongestSubstringOld(string $s): int
    {
        $maxLength = 0;
        $len = strlen($s);
        $i = 0;

        while ($maxLength < $len - $i) {
            $curLength = 0;
            $usedChars = [];
            $j = $i;

            while ($j < $len) {
                if (in_array($s[$j], $usedChars)) {
                    break;
                }

                $usedChars[$j] = $s[$j];
                $curLength += 1;
                $j += 1;
            }

            if ($maxLength < $curLength) {
                $maxLength = $curLength;
            }

            $i = $j === $len ? $i + 1 : array_search($s[$j], $usedChars) + 1;
        }

        return $maxLength;
    }
}