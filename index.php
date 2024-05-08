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
            <a href = "index.php">Home</a>
            <a href = "LogIn.php">Zaloguj się</a>
            <a href = "signIn.html">Zarejestruj się</a>
            <a href = "basicInfo.php">Podstawowe informacje</a>
            
        </div>

        <div id="center">
            <h2>Witaj na stronie!</h2>
            <p>Żeby uzyskać dostęp do dalszej części strony musisz się zalogować</p>
        </div>
    </body>
</html>

<?php
    if(isset($_COOKIE["UserLoginUsername"]) && isset($_COOKIE["UserLoginPassword"]) && isset($_COOKIE["UserLoginEmail"])){
        echo "<script> window.location.href = 'Home.php' </script>";
    }
?>

