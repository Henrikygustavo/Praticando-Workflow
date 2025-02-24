<?php

require_once "Task.php";

class TaskManager
{
    private array $tasks = [];

    public function addTask(string $title, string $description): void
    {
        $this->tasks[] = new Task($title, $description);
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function deleteTask(int $index): void
    {
        if (isset($this->tasks[$index])) {
            unset($this->tasks[$index]);
            $this->tasks = array_values($this->tasks); // Reindexar array
        }
    }
}
