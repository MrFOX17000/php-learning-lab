<?php

declare(strict_types=1);

use App\TaskManager;
use PHPUnit\Framework\TestCase;

class TaskManagerTest extends TestCase
{
    public function testNewTaskManagerHasNoTasks(): void
    {
        $taskManager = new TaskManager();
        $this->assertEmpty($taskManager->getTasks());
    }

    public function testCreateTaskAddsTaskToManager(): void
    {
        $taskManager = new TaskManager();
        $task = $taskManager->createTask('Réviser PHP');
        $this->assertCount(1, $taskManager->getTasks());
        $this->assertSame($task, $taskManager->getTasks()[$task->getId()]);
    }

    public function testCreateTaskAssignsIncrementingIds(): void
    {
        $taskManager = new TaskManager();
        $task1 = $taskManager->createTask('Réviser PHP');
        $task2 = $taskManager->createTask('Réviser SQL');
        $this->assertCount(2, $taskManager->getTasks());
        $this->assertSame(1, $task1->getId());
        $this->assertSame(2, $task2->getId());
    }

    public function testMarkTaskAsDoneOnlyCompletesSelectedTask(): void
    {
        $taskManager = new TaskManager();
        $task1 = $taskManager->createTask('Réviser PHP');
        $task2 = $taskManager->createTask('Réviser SQL');
        $taskManager->markTaskAsDone($task1->getId());
        $this->assertTrue($task1->isDone());
        $this->assertFalse($task2->isDone());
    }

    public function testMarkTaskAsDoneRejectsUnknownId(): void
    {
        $taskManager = new TaskManager();
        $this->expectException(OutOfBoundsException::class);
        $taskManager->markTaskAsDone(999);
    }

    public function testInvalidTaskCreationDoesNotConsumeNextId(): void
    {
        $taskManager = new TaskManager();
        $taskManager->createTask('Réviser SQL');
        try {
            $taskManager->createTask('  ');
            $this->fail('Une InvalidArgumentException était attendue.');
        } catch (InvalidArgumentException $e) {
            // Expected exception
        }
        $secondTask = $taskManager->createTask('Réviser JS');
        $this->assertSame(2, $secondTask->getId());
    }
}