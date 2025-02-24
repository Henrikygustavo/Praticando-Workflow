<?php
use PHPUnit\Framework\TestCase;
require_once "src/TaskManager.php";

class TaskManagerTest extends TestCase
{
    public function testAdicionarTarefa()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Estudar PHP");
        
        $this->assertCount(1, $taskManager->getTasks());
    }
}
