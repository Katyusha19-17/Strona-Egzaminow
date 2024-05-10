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
            <form action="LogIn.php" method="POST">
                <p>Podaj nazwę użytkownika: <input type="text" name="loginUsername" id="loginUsername"></p>
                <p>Podaj hasło: <input type="password" name="loginPassword" id="loginPassword"></p>
                <p>Podaj email: <input type="text" name="loginEmail" id="loginEmail"></p>
                <input type="submit" value = "zaloguj">
            </form>
        </div>
    </body>
</html>

<?php

    error_reporting(E_ALL ^ E_WARNING);

    $Connect = mysqli_connect("localhost","root","","egzaminyzawodowe");

    if(isset($_COOKIE["UserLogin"])){
        setcookie("UserLoginUsername", "",time() - 3600, "/");
        setcookie("UserLoginPassword", "",time() - 3600, "/");
        setcookie("UserLoginEmail", "",time() - 3600, "/");
    }

    if (isset($_POST["loginUsername"]) && isset($_POST["loginPassword"]) && isset($_POST["loginEmail"])) {

        $loginUsername = $_POST["loginUsername"];
        $loginPassword = $_POST["loginPassword"];
        $loginEmail = $_POST["loginEmail"];

        $sql = "SELECT * FROM uzytkownicy WHERE username = '$loginUsername' AND password = '$loginPassword' AND email = '$loginEmail'";

        $result = mysqli_query($Connect, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<script>alert('Zalogowano!');</script>";
            

            setcookie("UserLoginUsername", $loginUsername, time() + 3600, "/");
            setcookie("UserLoginPassword", $loginPassword, time() + 3600, "/");
            setcookie("UserLoginEmail", $loginEmail, time() + 3600, "/");

            echo "<script> window.location.href = 'Home.php' </script>";
        } else {
            echo "<script>alert('Błąd danych logowania');</script>";
        }
    }

    mysqli_close($Connect);
?>