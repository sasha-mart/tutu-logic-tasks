<?php
namespace SashaMart\TutuLogicTasks;

class Console
{
    protected $commandsWhitelist = [
        'hipsters' => 'SashaMart\TutuLogicTasks\HipstersTask',
        'hoard' => 'SashaMart\TutuLogicTasks\HoardTask',
        'angry-clown' => 'SashaMart\TutuLogicTasks\AngryClownTask'
    ];

    public function execute($args)
    {
        if (count($args) > 1) {

            $executable = array_shift($args);
            $commandName = array_shift($args);

            if (array_key_exists($commandName, $this->commandsWhitelist)) {
                return $this->executeCommand($this->commandsWhitelist[$commandName], $args);
            }

            $this->outputHelp();
            return false;
        }

        $this->outputHelp();
        return false;
    }

    protected function executeCommand($commandClass, $args)
    {
        $command = new $commandClass();
        return $command->execute(...$args);
    }

    protected function outputHelp()
    {
        echo 'Available commands:' . PHP_EOL;
        foreach ($this->commandsWhitelist as $key => $value) {
            echo $key . PHP_EOL;
        }
    }
}