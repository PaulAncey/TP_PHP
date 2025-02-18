<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = new User();
            $user->register($_POST['name'], $_POST['email'], $_POST['password']);
            header("Location: /login");
        }
    }

    public function login() {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = new User();
            $authUser = $user->login($_POST['email'], $_POST['password']);
            if ($authUser) {
                $_SESSION['user'] = $authUser;
                header("Location: /tasks");
            } else {
                echo "Identifiants incorrects";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /login");
    }
}
?>
