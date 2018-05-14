<?php
namespace SashaMart\TutuLogicTasks;

class HipstersTask
{
    public function execute($m = null, $n = null): int
    {
        if ($n === null)
            $n = $this->_setNumber('хипстеров');
        if ($m === null)
            $m = $this->_setNumber('смузи');

        $result = $this->distributeSmoothies($m, $n);
        if ($result > 0)
            echo "Результат: по " . $this->distributeSmoothies($m, $n) . " смузи на одного хипстера." . PHP_EOL;

        return $result;
    }

    public function distributeSmoothies(int $m, int $n): int
    {
        try {
            if ($m < $n)
                throw new \Exception("Смузи меньше, чем хипстеров. Придется выбросить всё, чтобы никого не обидеть.");
            else
                return intdiv($m, $n);
        }
        catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            return 0;
        }
    }

    private function _setNumber(string $type): int
    {
        $s = readline("Сколько $type? ");
        while (!preg_match("/^[0-9]+$/", $s))
            $s = readline("Количество $type должно быть целым числом больше нуля. Еще раз. Сколько $type? ");

        return (int)$s;
    }
}