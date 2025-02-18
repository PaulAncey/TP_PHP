<?php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/../app/controllers/TaskController.php';

Router::get('/', function() {
    require __DIR__ . '/../app/views/home.php';
});

Router::get('/login', function() {
    require __DIR__ . '/../app/views/login.php';
});

Router::post('/login', [new UserController(), 'login']);
Router::post('/register', [new UserController(), 'register']);
Router::get('/tasks', [new TaskController(), 'listTasks']);
Router::post('/tasks/add', [new TaskController(), 'addTask']);
Router::post('/tasks/delete', [new TaskController(), 'deleteTask']);
Router::get('/logout', [new UserController(), 'logout']);
?>
