<?php

namespace Shadar\Algorithms\Tasks\Leetcode\LongestSubstringWithoutRepeatingCharacters;

use Shadar\Algorithms\Abstract\AbstractExample;
use Shadar\Algorithms\Enums\Complexity;
use Shadar\Algorithms\Structures\{LinkedList, ListNode};

class Example extends AbstractExample
{
    protected int $num = 3;
    protected string $title = 'Longest Substring Without Repeating Characters';
    protected Complexity $complexity = Complexity::MEDIUM;
    protected array $testCases = [
        'abcabcbb',
        'bbbbb',
        'pwwkew',
        ' '
    ];

    private int $key;
    private string $testCase;
    private int $result;
    private \Exception $error;

    public function handleExample(): void
    {
        $solution = new Solution();

        foreach ($this->testCases as $key => $testCase) {
            $this->key = $key;
            $this->testCase = $testCase;
            $this->printTestCase();
            try {
                $this->result = $solution->lengthOfLongestSubstring($testCase);
                $this->printResult();
            } catch (\Exception $e) {
                $this->error = $e;
                $this->printError();
            }
        }
    }

    protected function printTestCase(): void
    {
        echo 'Test case: ' . PHP_EOL .
            "Key: {$this->key}" . PHP_EOL .
            "s: {$this->testCase}" . PHP_EOL;
    }

    protected function printResult(): void
    {
        echo "Result: {$this->result}" . PHP_EOL;
    }

    protected function printError(): void
    {
        echo "Error: {$this->error->getMessage()}" . PHP_EOL;
    }
}