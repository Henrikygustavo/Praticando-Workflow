<?php

use PHPUnit\Framework\TestCase;

require_once "src/TaskManager.php";

class TaskManagerTest extends TestCase {
    private $taskManager;

    protected function setUp(): void {
        $this->taskManager = new TaskManager();
    }

    public function testAddTask() {
        $taskId = $this->taskManager->addTask("Nova Tarefa");
        $this->assertIsNumeric($taskId);
    }

    public function testGetTasks() {
        $tasks = $this->taskManager->getTasks();
        $this->assertIsArray($tasks);
    }

    public function testMarkAsCompleted() {
        $taskId = $this->taskManager->addTask("Tarefa Teste");
        $this->assertTrue($this->taskManager->markAsCompleted($taskId));
    }

    public function testDeleteTask() {
        $taskId = $this->taskManager->addTask("Tarefa para Deletar");
        $this->assertTrue($this->taskManager->deleteTask($taskId));
    }
}
?>
