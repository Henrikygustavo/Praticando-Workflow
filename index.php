<?php

require_once "src/TaskManager.php";

$taskManager = new TaskManager();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["title"])) {
        $taskManager->addTask($_POST["title"]);
    } elseif (isset($_POST["complete"])) {
        $taskManager->markAsCompleted($_POST["complete"]);
    } elseif (isset($_POST["delete"])) {
        $taskManager->deleteTask($_POST["delete"]);
    }
}

$tasks = $taskManager->getTasks();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    <form method="POST">
        <input type="text" name="title" placeholder="Nova tarefa" required>
        <button type="submit">Adicionar</button>
    </form>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task->title) ?> 
                <?= $task->completed ? "(Concluído)" : "" ?>
                <form method="POST" style="display:inline;">
                    <button type="submit" name="complete" value="<?= $task->id ?>">✔️</button>
                    <button type="submit" name="delete" value="<?= $task->id ?>">❌</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
