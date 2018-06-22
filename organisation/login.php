<?php

session_start();

if (isset($_POST["username"])) {
    if ($_POST["username"] == "admin" && $_POST["password"] == "letmein") {
        $_SESSION["user"] = "admin";
        header("location:organisation.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAB73 - Admin login</title>
</head>
<body>

<h1>Login für Website - Organisation</h1>

<a href="../HTML_Files/index.html">Zurück zur Hauptseite.</a>

<form action="login.php" method="post">
    <p>Username:</p>
    <p><input type="text" name="username"></p>

    <p>Passwort:</p>
    <p><input type="password" name="password"></p>

    <button type="submit">Login</button>
</form>

</body>
</html>