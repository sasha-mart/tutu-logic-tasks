<?php
namespace SashaMart\TutuLogicTasks;

use PHPUnit\Framework\TestCase;

class HipstersTest extends TestCase
{
    public function testDistributeSmoothies() {
        $hipsterTask = new HipstersTask();

        $n = '5';
        $m = '13';

        $this->assertEquals(2, $hipsterTask->execute($m, $n));

        $n = '22';
        $m = '2';

        $this->assertEquals(0, $hipsterTask->execute($m, $n));
    }

}