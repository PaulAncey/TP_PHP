<?php
require_once __DIR__ . '/../../core/Model.php';

class User extends Model {
    public function register($name, $email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_BCRYPT)]);
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        return ($user && password_verify($password, $user['password'])) ? $user : false;
    }
}
?>
