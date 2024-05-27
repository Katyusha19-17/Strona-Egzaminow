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
            <p>Twoje konto zostało dodane!</p>
            <p>Zaloguj się aby uzyskać dostęp</p>
        </div>
    </body>
</html>

<?php

    error_reporting(E_ALL ^ E_WARNING);

    $Connect = mysqli_connect("localhost","root","","egzaminyzawodowe");


    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
 
    $email = $_POST["email"];

    if(isset($_POST["name"])){
        $name = $_POST["name"];    
    } 

    if(isset($_POST["surname"])){
        $surname = $_POST["surname"];    
    } 

    if(isset($_POST["name"]) && isset($_POST["surname"])){
        $sql = "INSERT INTO uzytkownicy(username, password, name, surname, email) VALUES ('$username','$hashPassword','$name','$surname','$email')";
        $resoult = mysqli_query($Connect, $sql);
    }else{
        if(isset($_POST["name"])){
            $sql = "INSERT INTO uzytkownicy(username, password, name, email) VALUES ('$username','$hashPassword','$name','$email')";
            $resoult = mysqli_query($Connect, $sql);
        }else{
            if(isset($_POST["surname"])){
                $sql = "INSERT INTO uzytkownicy(username, password, surname, email) VALUES ('$username','$hashPassword','$surname','$email')";
                $resoult = mysqli_query($Connect, $sql);
            }else{
                    $sql = "INSERT INTO uzytkownicy(username, password, email) VALUES ('$username','$hashPassword','$email')";
                    $resoult = mysqli_query($Connect, $sql);
            }
        }
    }
    

    mysqli_close($Connect)
?>