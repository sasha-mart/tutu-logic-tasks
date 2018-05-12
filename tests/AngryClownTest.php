<?php
namespace SashaMart\TutuLogicTasks;

use PHPUnit\Framework\TestCase;

class AngryClownTest extends TestCase
{
    public function testExecute() {
        $angryClownTask = new AngryClownTask();

        $this->assertEquals('Привет), я сегодня такой грустный :( Может пойдем гулять?:)',
            $angryClownTask->execute('Привет))), я сегодня такой грустный :(( Может пойдем гулять?:)'));

        $this->assertEquals('Плохо( Хорошо)',
            $angryClownTask->execute('Плохо( Хорошо))'));

        $this->assertEquals(')',
            $angryClownTask->execute('))))'));
    }
}