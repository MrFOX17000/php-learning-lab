<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testTaskCreation(): void
    {
        $task = new Task(1, 'Réviser PHP');

        $this->assertSame(1, $task->getId());
        $this->assertSame('Réviser PHP', $task->getTitle());
    }

    public function testNewTaskIsNotDone(): void
    {
        $task = new Task(2, 'Réviser SQL');

        $this->assertFalse($task->isDone());
    }

    public function testTaskCanBeMarkedAsDone(): void
    {
        $task = new Task(3, 'Réviser JS');
        $task->setDone();

        $this->assertTrue($task->isDone());
    }

    public function testTaskRejectsEmptyTitle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Task(4, '  ');
    }

    public function testTaskRejectsNegativeId(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Task(-1, 'Réviser CSS');
    }

    public function testTaskRejectsZeroId(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Task(0, 'Réviser CSS');
    }
}