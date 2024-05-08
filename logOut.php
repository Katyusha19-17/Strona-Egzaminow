<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">        
    </head>
    <body>
        <div id="banner">
            <h1>Egzaminy zawodowe</h1>
        </div>

        <div id="navbar">
            <a href = "Home.php">Home</a>
            <a href = "logOut.php">Wyloguj</a>
            <a href = "FAQ.php">FAQ</a>
            <a href = "basicInfo.php">Podstawowe informacje</a>
        
        </div>

        <div id="center">
            <h2>Witaj na stronie!</h2>
        </div>
    </body>
</html>

<?php
    error_reporting(E_ALL ^ E_WARNING);

    setcookie("UserLoginUsername", $loginUsername, -60*60, "/");
    setcookie("UserLoginPassword", $loginPassword, -60*60, "/");
    setcookie("UserLoginEmail", $loginEmail, -60*60, "/");

    header("Location: index.php");
    exit();
?>