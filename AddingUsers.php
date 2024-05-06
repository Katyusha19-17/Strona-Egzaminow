<?php

    $Connect = mysqli_connect("localhost","root","","egzaminyzawodowe");


    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    if(isset($_POST["name"])){
        $name = $_POST["name"];    
    } 

    if(isset($_POST["surname"])){
        $surname = $_POST["surname"];    
    } 

    if(isset($_POST["name"]) && isset($_POST["surname"])){
        $sql = "INSERT INTO uzytkownicy(username, password, name, surname, email) values('$username','$password','$name','$surname','$email'))";
        mysqli_query($Connect,$sql);
    }


    
    


?>