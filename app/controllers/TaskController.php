<?php
require_once __DIR__ . '/../models/Task.php';

class TaskController {
    public function listTasks() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
        $task = new Task();
        $tasks = $task->getTasksByUser($_SESSION['user']['id']);
        require __DIR__ . '/../views/tasks.php';
    }

    public function addTask() {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $task = new Task();
            $task->addTask($_POST['title'], $_POST['description'], $_SESSION['user']['id']);
            header("Location: /tasks");
        }
    }

    public function deleteTask() {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $task = new Task();
            $task->deleteTask($_POST['id']);
            header("Location: /tasks");
        }
    }
}
?>
