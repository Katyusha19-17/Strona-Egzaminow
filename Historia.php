<!DOCTYPE html>
<html>
    <head>
        <?php
            if(isset($_COOKIE["UserLoginUsername"]) && isset($_COOKIE["UserLoginPassword"]) && isset($_COOKIE["UserLoginEmail"])){
                echo "<script> console.log('Zalogowano!') </script>";
            }else{
                    echo "<script> alert('Sesja wygasła!') </script>";
                    echo "<script> window.location.href = 'index.php' </script>";
            }
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleUser.css">        
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
            <a href ="quiz.php">Wylosuj 40 pytań!</a>
            <a href = "User.php">Twoje konto</a>
            <a href = "Historia.php">Historia</a>

        </div>

        <div id="center">

        <?php

error_reporting(E_ALL ^ E_WARNING);
                  
$Connect = mysqli_connect("localhost","root","","egzaminyzawodowe");

$loginC = $_COOKIE["UserLoginUsername"];
$passwordC = $_COOKIE["UserLoginPassword"];
$emailC = $_COOKIE["UserLoginEmail"];


printf("<h2>Historia twoich postępów: </h2><br>");

$sql = "select id from uzytkownicy where username = '$loginC' and password = '$passwordC' and email = '$emailC';";
$resoult = mysqli_query($Connect, $sql);
while($row = mysqli_fetch_row($resoult)){
    $idU = $row[0];
}

$sql = "select * from postepy where id_user = '$idU' order by czas ASC;";
$resoult = mysqli_query($Connect,$sql);

while($row = mysqli_fetch_row($resoult)){
    print("<p>");
    printf("Data testu: ".$row[4]."<br>");
    printf("Wynik testu: ".$row[2]."<br>");
    if($row[3] == 1){
     printf("Czy test został zdany: tak <br><br>");   
    }else{
        printf("Czy test został zdany: nie <br><br>");
    }
    print("</p>");
}

?>

        </div>
    </body>
</html>

