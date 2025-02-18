<?php
require_once __DIR__ . '/../config/database.php';

class Model {
    protected $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }
}
?>
