<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="POST" action="/register">
        <label>Nom :</label>
        <input type="text" name="name" required>
        <label>Email :</label>
        <input type="email" name="email" required>
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
        <button type="submit">S'inscrire</button>
    </form>
    <a href="/login">Se connecter</a>
</body>
</html>
