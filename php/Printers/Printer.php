<?php

namespace Shadar\Algorithms\Printers;

use Shadar\Algorithms\Printers\Kits\Kit;

class Printer
{
    /**
     * @var Kit[]
     */
    private array $kits;

    private array $kitClasses = [
        1 => 'Shadar\Algorithms\Printers\Kits\LeetcodeKit'
    ];

    public function __construct()
    {
        foreach ($this->kitClasses as $key => $kitClass) {
            $this->kits[$key] = new $kitClass();
        }
    }

    public function start(): void
    {
        foreach ($this->kits as $key => $kit) {
            echo "{$key}. {$kit->title}" . PHP_EOL;
        }

        $kitNumber = readline('Choose a kit number: ');

        if (isset($this->kits[$kitNumber])) {
            $kit = $this->kits[$kitNumber];

            $kit->showList();
            $taskNumber = readline('Choose a task number: ');
            $kit->select($taskNumber);
        } else {
            echo 'Undefined kit number' . PHP_EOL;
        }
    }
}