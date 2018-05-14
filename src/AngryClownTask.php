<?php

namespace SashaMart\TutuLogicTasks;

use SebastianBergmann\CodeCoverage\Driver\Xdebug;

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
        $countSymbols = mb_strlen($this->string);
        $key = 0;
        while ($key < $countSymbols) {
	        $symbol = mb_substr($this->string, $key, 1);
        	if (in_array($symbol, [")", "("])) {
        		$next = mb_substr($this->string, $key+1, 1);
        		// строка до первого вхождения скобочки
        		$str = mb_substr($this->string, 0, $key+1);
        		// Вырезаем все остальные скобочки, которые идут подряд
        		while (mb_strlen($this->string) >= $key && $next == $symbol) {
        			$this->string = $str . mb_substr($this->string, $key+2);
			        $next = mb_substr($this->string, $key+1, 1);
		        }
	        }
	        $key++;
	        $countSymbols = mb_strlen($this->string);
        }
    }

    private function _setString(): string
    {
        $s = readline("Введите строку: ");
        return $s;
    }
}