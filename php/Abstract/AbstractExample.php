<?php

namespace Shadar\Algorithms\Abstract;

use Shadar\Algorithms\Enums\Complexity;

abstract class AbstractExample
{
    protected int $num;
    protected string $title;
    protected Complexity $complexity;
	protected array $testCases;

    abstract public function handleExample(): void;

    abstract protected function printTestCase(): void;

    abstract protected function printResult(): void;

    abstract protected function printError(): void;
	
	public function getNum(): int
	{
		return $this->num;
	}
	
	public function getTitle(): string
	{
		return $this->title;
	}
	
	public function getComplexity(): Complexity
	{
		return $this->complexity;
	}

    protected function defaultImplode(array $arr): string
    {
        return implode(', ', $arr);
    }
}