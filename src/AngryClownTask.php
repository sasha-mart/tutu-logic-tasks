<?php

namespace SashaMart\TutuLogicTasks;

class AngryClownTask
{
    protected $string;

    public function execute(string $string = null): string
    {
        if ($string === null)
            $this->string = $this->_setString();
        else
            $this->string = $string;

        $this->handleString();
        echo "Результат: " . $this->string . PHP_EOL;
        return $this->string;
    }

    public function handleString(): void
    {
        foreach ([')', '('] as $symbol) {
            $positions = [];
            $offset = 0;
            $pos = mb_strpos($this->string, $symbol);
            while ($pos !== false) {
                if ($pos !== $offset || $pos === 0)
                    $positions[] = [$offset, $pos + 1];
                $offset = $pos + 1;
                $pos = mb_strpos($this->string, $symbol, $offset);
            }
            $positions[] = [$offset, mb_strlen($this->string)];

            $newString = '';
            foreach ($positions as $positionLabels)
                $newString .= mb_substr($this->string, $positionLabels[0], $positionLabels[1]);

            $this->string = $newString;
        }

    }

    private function _setString(): string
    {
        $s = readline("Введите строку: ");
        return $s;
    }
}