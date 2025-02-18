<?php
require_once __DIR__ . '/../../core/Model.php';

class Task extends Model {
    public function getTasksByUser($user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function addTask($title, $description, $user_id) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, user_id) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $description, $user_id]);
    }

    public function updateTask($id, $status) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateTaskStatus($id, $status) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }    
}
?>
