<?php

namespace SashaMart\TutuLogicTasks;

class HoardTask
{
    const TYPES = [
        1 => 'первого типа',
        2 => 'второго типа'
    ];
    protected $stone1;
    protected $stone2;
    protected $maxM;
    protected $m1;
    protected $m2;
    protected $p1;
    protected $p2;

    public function execute($m1 = null, $m2 = null, $p1 = null, $p2 = null, $maxM = null): array
    {
        if (is_null($m1))
            $this->m1 = $this->_setWeight(self::TYPES[1]);
        else
            $this->m1 = $m1;
        if (is_null($m2))
            $this->m2 = $this->_setWeight(self::TYPES[2]);
        else
            $this->m2 = $m2;
        if (is_null($p1))
            $this->p1 = $this->_setPrice(self::TYPES[1]);
        else
            $this->p1 = $p1;
        if (is_null($p2))
            $this->p2 = $this->_setPrice(self::TYPES[2]);
        else
            $this->p2 = $p2;
        if (is_null($maxM))
            $this->maxM = $this->_setMaxWeight();
        else
            $this->maxM = $maxM;

        $firstRes = $this->returnFirstScenario();
        $secondRes = $this->returnSecondScenario();

        echo 'Если можно взять не более одного камня каждого типа, то максимальная выручка: '.$firstRes.PHP_EOL;
        echo 'Если можно взять сколько угодно камней каждого типа, то максимальная выручка: '.$secondRes.PHP_EOL;

        return [
            1 => $firstRes,
            2 => $secondRes
        ];
    }

    public function returnFirstScenario(): float
    {
        $result = 0;
        if ($this->m1 + $this->m2 <= $this->maxM)
            $result = $this->p1 + $this->p2;
        elseif ($this->p1 >= $this->p2 && $this->m1 <= $this->maxM)
            $result = $this->p1;
        elseif ($this->p2 >= $this->p1 && $this->m2 <= $this->maxM)
            $result = $this->p2;
        elseif ($this->m1 <= $this->maxM)
            $result = $this->p1;
        elseif ($this->m2 <= $this->maxM)
            $result = $this->p2;

        return $result;
    }

    public function returnSecondScenario(): float
    {
        // Необходимо проверить 2 варианта:
        // 1. По максимуму набираем камни первого типа, на оставшуюсю массу - второго
        // 2. По максимуму набираем камни второго типа, на оставшуюсю массу - первого
        // сравним выручку по каждому варианту и получим результат
        // считаем сколько всего мы можем забрать камней первого типа
        $res1q1 = intdiv($this->maxM, $this->m1);
        $onlyM1 = $res1q1 * $this->m1;
        // считаем сколько всего мы можем забрать камней второго типа
        $res2q2 = intdiv($this->maxM, $this->m2);
        $onlyM2 = $res2q2 * $this->m2;
        // считаем остаток массы и кол-во других камней для каждого случая
        $remainM1 = $this->maxM - $onlyM1;
        $remainM2 = $this->maxM - $onlyM2;
        $res1q2 = intdiv($remainM1, $this->m2);
        $res2q1 = intdiv($remainM2, $this->m1);

        $res1 = $res1q1 * $this->p1 + $res1q2 * $this->p2;
        $res2 = $res2q1 * $this->p1 + $res2q2 * $this->p2;
        return max([$res1, $res2]);
    }

    private function _setWeight(string $type): float
    {
        $s = readline("Масса камня $type: ");
        while (!(is_numeric($s) && (float)$s > 0))
            $s = readline("Масса камня должна быть числом больше нуля. Еще раз. Масса камней $type: ");

        return (float)$s;
    }

    private function _setPrice(string $type): float
    {
        $s = readline("Цена камня $type: ");
        while (!(is_numeric($s) && (float)$s >= 0))
            $s = readline("Цена камня должна быть числом. Еще раз. Цена камня $type: ");

        return (float)$s;
    }

    private function _setMaxWeight(): float
    {
        $s = readline("Максимальный вес, который вы можете унести: ");
        while (!(is_numeric($s) && (float)$s >= 0))
            $s = readline("Цена камня должна быть числом. Еще раз. Цена камня $type: ");

        return (float)$s;
    }
}