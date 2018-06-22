<?php
session_start();
if (isset($_POST["username"])){
    if($_POST["username"] == "admin" && $_POST["passwort"] == "admin"){
        $_SESSION["user"] = "admin";
        header("location:editor.php");
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAB-Login</title>
</head>
<body>


    <form action="login.php" method="post">
         <p>Username:  <input type="text" name="username"></p>
         <p>Passwort:  <input type="password" name="passwort"></p>
         <p><button type="submit">Login</button></p>
    </form>
</body>
</html>