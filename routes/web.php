<?php
echo "Routes chargées !<br>";

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/../app/controllers/TaskController.php';

Router::get('/login', function() {
    require __DIR__ . '/../app/views/login.php';
});
Router::post('/login', [new UserController(), 'login']);

Router::get('/register', function() {
    require __DIR__ . '/../app/views/register.php';
});
Router::post('/register', [new UserController(), 'register']);

Router::get('/logout', function() {
    require __DIR__ . '/../app/views/logout.php';
});

Router::get('/tasks', [new TaskController(), 'listTasks']);
Router::post('/tasks/add', [new TaskController(), 'addTask']);
Router::post('/tasks/delete', [new TaskController(), 'deleteTask']);
Router::get('/register', [new UserController(), 'register']);
Router::post('/tasks/update-status', [new TaskController(), 'updateTaskStatus']);

