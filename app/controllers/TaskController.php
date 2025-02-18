<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Task.php';

class TaskController extends Controller {
    public function listTasks() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        $task = new Task();
        $tasks = $task->getTasksByUser($_SESSION['user']['id']);

        $this->render('tasks', ['tasks' => $tasks]);
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

    public function updateTaskStatus() {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $task = new Task();
            $task->updateTaskStatus($_POST['id'], $_POST['status']);
            header("Location: /tasks");
        }
    }
    
}
?>
