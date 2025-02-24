<?php

require_once "Database.php";
require_once "Task.php";

class TaskManager {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function addTask($title) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title) VALUES (:title)");
        $stmt->execute(['title' => $title]);
        return $this->pdo->lastInsertId();
    }

    public function getTasks() {
        $task = new Task("Título da Tarefa", "Descrição da tarefa");
    }

    public function markAsCompleted($id) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET completed = 1 WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
