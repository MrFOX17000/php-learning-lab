<?php

declare(strict_types=1);

class Task 
{
    private int $id;
    private string $title;
    private bool $done = false;

    public function __construct(int $id, string $title) 
    {
        if ($id <= 0) {
            throw new InvalidArgumentException("L'ID de la tâche doit être un entier positif.");
        }
        $trimTitle = trim($title);
        if($trimTitle === '') {
            throw new InvalidArgumentException("Le titre de la tâche ne peut pas être vide.");
        }
        $this->id = $id;
        $this->title = $trimTitle;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getTitle(): string 
    {
        return $this->title;
    }

    public function isDone(): bool 
    {
        return $this->done;
    }

    public function setDone(): void 
    {
        $this->done = true;
    }

}