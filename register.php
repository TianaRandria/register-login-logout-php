<?php
    session_start(); //$_cookie eto ilay nom d'utilisateur affichéna amin'izay //
    if(isset($_COOKIE['username'])) {
        header('location: /index.php');
    } else {
?> 
<!-- Eto miteny hoe ilay ligne 1 io mi demarrer session php , avy eo mi verifier oe IF efa misy ilay cookie Username
dia reaha tsy misy (else) dia affichena ilay HTML io ambany io -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Register</title>
</head>
<body>

<main>
    <form action="connect.php" method="post">
        <h1>Register</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required> <!--required force l'utilisateur a remplir le champs-->
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <section>
        <button type="submit" name="action" value="register">Register</button>
            <a href="index.php">Login</a>
        </section>
    </form>
</main>
</body>
</html>
<?php } ?>