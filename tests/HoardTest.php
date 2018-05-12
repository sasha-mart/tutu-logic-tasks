<?php
namespace SashaMart\TutuLogicTasks;

use PHPUnit\Framework\TestCase;

class HoardTest extends TestCase
{
    public function testExecute() {
        $hoardTask = new HoardTask();

        $m1 = 5;
        $p1 = 200;
        $m2 = 13;
        $p2 = 4;
        $maxM = 100;

        $this->assertEquals([1=>204, 2=>4000], $hoardTask->execute($m1, $m2, $p1, $p2, $maxM));

        $m1 = 5;
        $p1 = 200;
        $m2 = 13;
        $p2 = 4;
        $maxM = 6;

        $this->assertEquals([1=>200, 2=>200], $hoardTask->execute($m1, $m2, $p1, $p2, $maxM));

        $m1 = 5;
        $p1 = 200;
        $m2 = 6;
        $p2 = 240;
        $maxM = 17;

        $this->assertEquals([1=>440, 2=>680], $hoardTask->execute($m1, $m2, $p1, $p2, $maxM));

        $m1 = 1;
        $p1 = 10;
        $m2 = 10;
        $p2 = 120;
        $maxM = 14;

        $this->assertEquals([1=>130, 2=>160], $hoardTask->execute($m1, $m2, $p1, $p2, $maxM));

        $m1 = 4;
        $p1 = 10;
        $m2 = 12;
        $p2 = 12;
        $maxM = 14;

        $this->assertEquals([1=>12, 2=>30], $hoardTask->execute($m1, $m2, $p1, $p2, $maxM));

        $m1 = 4;
        $p1 = 10;
        $m2 = 14;
        $p2 = 12;
        $maxM = 12;

        $this->assertEquals([1=>10, 2=>30], $hoardTask->execute($m1, $m2, $p1, $p2, $maxM));

        $m1 = 40;
        $p1 = 50;
        $m2 = 12;
        $p2 = 40;
        $maxM = 12;

        $this->assertEquals([1=>40, 2=>40], $hoardTask->execute($m1, $m2, $p1, $p2, $maxM));
    }
}