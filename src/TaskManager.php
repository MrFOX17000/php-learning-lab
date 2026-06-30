<?php

declare(strict_types=1);

class TaskManager
{
    private array $tasks = [];
    private int $nextId = 1;

    public function createTask(string $title): Task 
    {
        $task = new Task($this->nextId, $title);
        $this->tasks[$task->getId()] = $task;
        $this->nextId++;
        return $task;
    }

    public function getTasks(): array 
    {
        return $this->tasks;
    }

    public function markTaskAsDone(int $id): void
    {
        if (!isset($this->tasks[$id])) {
            throw new OutOfBoundsException(
                "Aucune tâche trouvée avec l'ID : $id"
            );
        }

        $this->tasks[$id]->setDone();
    }
}