<?php
use PHPUnit\Framework\TestCase;

require_once "src/TaskManager.php";

class TaskManagerTest extends TestCase
{
    public function testAddTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Aprender PHPUnit", "Criar testes automatizados");

        $this->assertCount(1, $taskManager->getTasks());
    }

    public function testGetTasks()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Estudar PHP", "Revisar orientação a objetos");

        $tasks = $taskManager->getTasks();
        $this->assertCount(1, $tasks);
        $this->assertEquals("Estudar PHP", $tasks[0]->getTitle());
        $this->assertEquals("Revisar orientação a objetos", $tasks[0]->getDescription());
    }
}
