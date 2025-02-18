<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/db_setup.php';
require_once __DIR__ . '/../routes/web.php';

$requestUri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$requestMethod = $_SERVER["REQUEST_METHOD"];

Router::dispatch($requestUri, $requestMethod);
