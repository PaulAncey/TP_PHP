<?php
require_once __DIR__ . '/../config/database.php';


try {
    $pdo = Database::connect();
    echo "Connexion à la base de données réussie !";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
