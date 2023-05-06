<?php

namespace Shadar\Algorithms\Tasks\Leetcode\TwoSum;

use Shadar\Algorithms\Abstract\AbstractExample;
use Shadar\Algorithms\Enums\Complexity;

class Example extends AbstractExample
{
    protected int $num = 1;
    protected string $title = 'Two Sum';
    protected Complexity $complexity = Complexity::EASY;
    protected array $testCases = [
        [
            'nums' => [2, 7, 11, 15],
            'target' => 9
        ],
        [
            'nums' => [3, 2, 4],
            'target' => 6
        ],
        [
            'nums' => [3, 3],
            'target' => 6
        ]
    ];

    private int $key;
    private array $testCase;
    private array $result;
    private \Exception $error;

    public function handleExample(): void
    {
        $solution = new Solution();

        foreach ($this->testCases as $key => $testCase) {
            $this->key = $key;
            $this->testCase = $testCase;
            $this->printTestCase();
            try {
                $this->result = $solution->twoSum($testCase['nums'], $testCase['target']);
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
            "Nums: {$this->defaultImplode($this->testCase['nums'])}" . PHP_EOL .
            "Target: {$this->testCase['target']}" . PHP_EOL;
    }

    protected function printResult(): void
    {
        echo "Result: {$this->defaultImplode($this->result)}" . PHP_EOL;
    }

    protected function printError(): void
    {
        echo "Error: {$this->error->getMessage()}" . PHP_EOL;
    }
}