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

    public function execute($m1 = null, $m2 = null, $p1 = null, $p2 = null, $maxM = null): array
    {
        if (is_null($m1))
            $m1 = $this->_setWeight(self::TYPES[1]);
        if (is_null($m2))
            $m2 = $this->_setWeight(self::TYPES[2]);
        if (is_null($p1))
            $p1 = $this->_setPrice(self::TYPES[1]);
        if (is_null($p2))
            $p2 = $this->_setPrice(self::TYPES[2]);
        if (is_null($maxM))
            $this->maxM = $this->_setMaxWeight();
        else
            $this->maxM = $maxM;

        $this->stone1 = new HoardStone($m1, $p1);
        $this->stone2 = new HoardStone($m2, $p2);

        return [
            1 => $this->returnFirstScenario(),
            2 => $this->returnSecondScenario()
        ];
    }

    public function returnFirstScenario() : float
    {
     //   if ($this->stone1->isMoreExpensive() )
    }

    public function returnSecondScenario() : float
    {
       // if ($this->stone1->isMoreExpensive() )
    }

    private function _setWeight(string $type) : float
    {
        $s = readline("Масса камня $type: ");
        while (!(is_numeric($s) && (float)$s > 0))
            $s = readline("Масса камня должна быть числом больше нуля. Еще раз. Масса камней $type: ");

        return (float)$s;
    }

    private function _setPrice(string $type) : float
    {
        $s = readline("Цена камня $type: ");
        while (!(is_numeric($s) && (float)$s >= 0))
            $s = readline("Цена камня должна быть числом. Еще раз. Цена камня $type: ");

        return (float)$s;
    }

    private function _setMaxWeight() : float
    {
        $s = readline("Максимальный вес, который вы можете унести: ");
        while (!(is_numeric($s) && (float)$s >= 0))
            $s = readline("Цена камня должна быть числом. Еще раз. Цена камня $type: ");

        return (float)$s;
    }
}