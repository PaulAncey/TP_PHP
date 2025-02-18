<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Tâches</title>
</head>
<body>
    <h2>Mes Tâches</h2>

    <form method="POST" action="/tasks/add">
        <label>Titre :</label>
        <input type="text" name="title" required>
        <label>Description :</label>
        <textarea name="description" required></textarea>
        <button type="submit">Ajouter une tâche</button>
    </form>

    <h3>Liste des Tâches :</h3>
    <ul>
        <?php foreach ($tasks as $task): ?>
        <li>
            <?= htmlspecialchars($task['title']) ?> - <?= htmlspecialchars($task['status']) ?>
            
            <form method="POST" action="/tasks/update-status" style="display:inline;">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <select name="status">
                    <option value="À faire" <?= $task['status'] === "À faire" ? "selected" : "" ?>>À faire</option>
                    <option value="En cours" <?= $task['status'] === "En cours" ? "selected" : "" ?>>En cours</option>
                    <option value="Terminé" <?= $task['status'] === "Terminé" ? "selected" : "" ?>>Terminé</option>
                </select>
                <button type="submit">Modifier</button>
            </form>

            <form method="POST" action="/tasks/delete" style="display:inline;">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <button type="submit">Supprimer</button>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>

    <a href="/logout">Se déconnecter</a>
</body>
</html>
