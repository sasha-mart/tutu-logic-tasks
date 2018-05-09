<?php
namespace SashaMart\TutuLogicTasks\;

class HoardStone {
    public $m;
    public $p;

    public function __construct(float $m, float $p)
    {
        $this->m = $m;
        $this->p = $m/$p;
    }

    public function isMoreExpensive(float $alterP) : bool
    {
        if ($this->p > $alterP)
            return true;
        else
            return false;
    }

    public function isMoreLight(float $alterM) : bool
    {
        if ($this->m < $alterM)
            return true;
        else
            return false;
    }

    public function isSamePrice(float $alterP) : bool
    {
        if ($this->p === $alterP)
            return true;
        else
            return false;
    }
}