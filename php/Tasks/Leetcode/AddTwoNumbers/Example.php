<?php

namespace Shadar\Algorithms\Tasks\Leetcode\AddTwoNumbers;

use Shadar\Algorithms\Abstract\AbstractExample;
use Shadar\Algorithms\Enums\Complexity;
use Shadar\Algorithms\Structures\{LinkedList, ListNode};

class Example extends AbstractExample
{
    protected int $num = 2;
    protected string $title = 'Add Two Numbers';
    protected Complexity $complexity = Complexity::MEDIUM;
    protected array $testCases = [
        [
            'l1' => [2, 4, 3],
            'l2' => [5, 6, 4]
        ],
        [
            'l1' => [0],
            'l2' => [0]
        ],
        [
            'l1' => [9, 9, 9, 9, 9, 9, 9],
            'l2' => [9, 9, 9, 9]
        ],
        [
            'l1' => [2, 4, 9],
            'l2' => [5, 6, 4, 9]
        ],
        [
            'l1' => [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
            'l2' => [5, 6, 4]
        ],
    ];

    private int $key;
    private array $testCase;
    private ListNode $result;
    private \Exception $error;

    public function handleExample(): void
    {
        $solution = new Solution();

        foreach ($this->testCases as $key => $testCase) {
            $this->key = $key;
            $this->testCase = $testCase;
            $this->printTestCase();
            try {
                $this->result = $solution->addTwoNumbers(
                    (new LinkedList($testCase['l1']))->getHead(),
                    (new LinkedList($testCase['l2']))->getHead()
                );
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
            "l1: {$this->defaultImplode($this->testCase['l1'])}" . PHP_EOL .
            "l2: {$this->defaultImplode($this->testCase['l2'])}" . PHP_EOL;
    }

    protected function printResult(): void
    {
        $currentNode = $this->result;
        $res = [];

        while (!is_null($currentNode)) {
            $res[] = $currentNode->val;

            $currentNode = $currentNode->next;
        }

        echo "Result: {$this->defaultImplode($res)}" . PHP_EOL;
    }

    protected function printError(): void
    {
        echo "Error: {$this->error->getMessage()}" . PHP_EOL;
    }
}