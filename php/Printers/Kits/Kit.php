<?php

namespace Shadar\Algorithms\Printers\Kits;

use Shadar\Algorithms\Abstract\AbstractExample;

abstract class Kit
{
    public string $title;
	/**
     * @var AbstractExample[] List of tasks to execute.
	*/
    protected array $tasks;

    private string $kitsDir = 'Printers/Kits';
    private string $tasksDir = 'Tasks/';
    private string $tasksNamespace = 'Shadar\\Algorithms\\Tasks\\';
    private string $taskClassName = 'Example';

    public function __construct()
    {
        $classes = $this->getTasksForKit();

        foreach ($classes as $class) {
            $this->tasks[] = new $class();
        }
    }

    // TODO: Sort the list of tasks. Just use ksort.
    public function showList(): void
    {
		foreach ($this->tasks as $task) {
			echo "{$task->getNum()}. {$task->getTitle()} ({$task->getComplexity()->value})" . PHP_EOL;
		}
    }
	
	public function select(int $num): void
	{
		foreach ($this->tasks as $task) {
            if ($task->getNum() === $num) {
                $task->handleExample();
                return;
            }
        }

        echo 'Undefined example num' . PHP_EOL;
	}
    
    protected function getTasksForKit(): array
    {
        $result = [];

        if (!empty($this->title)) {
            $dir = str_replace($this->kitsDir, $this->tasksDir . $this->title, __DIR__);

            foreach (new \DirectoryIterator($dir) as $task) {
                if (!$task->isDot()) {
                    $result[] = $this->tasksNamespace . $this->title . '\\' . $task->getFilename() . '\\' . $this->taskClassName;
                }
            }
        }
        
        return $result;
    }
}