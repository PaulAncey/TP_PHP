<?php
require_once __DIR__ . '/database.php';

try {
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbname = "gestion_taches";

    $stmt = $pdo->query("SHOW DATABASES LIKE '$dbname'");
    $dbExists = $stmt->fetch();

    if (!$dbExists) {
        $pdo->exec("CREATE DATABASE $dbname");
        echo "creation BDD ok<br>";
    } else {
        echo "BDD deja créer<br>";
    }

    $pdo = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
    CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100),
        email VARCHAR(100) UNIQUE,
        password VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS tasks (
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255),
        description TEXT,
        status ENUM('À faire', 'En cours', 'Terminé') DEFAULT 'À faire',
        user_id INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );";

    $pdo->exec($sql);
    echo "tables deja créer<br>";

} catch (PDOException $e) {
    die("error creation table: " . $e->getMessage());
}
?>
