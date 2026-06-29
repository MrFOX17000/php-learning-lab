<?php

declare(strict_types=1);

class Task {
    private string $title;
    private bool $done = false;

    public function __construct(string $title) {
        $trimTitle = trim($title);
        if($trimTitle === '') {
            throw new InvalidArgumentException("Le titre de la tâche ne peut pas être vide.");
        }
        $this->title = $trimTitle;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function isDone(): bool {
        return $this->done;
    }

    public function setDone(): void {
        $this->done = true;
    }

}