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
            <a href ="quiz.php">Wylosuj 40 pytań!</a>
            <a href = "User.php">Twoje konto</a>
        
        </div>

        <div id="center">
            <?php

                error_reporting(E_ALL ^ E_WARNING);
                  
                $Connect = mysqli_connect("localhost","root","","egzaminyzawodowe");

                $score = 0;

                $login = $_COOKIE["UserLoginUsername"];
                $password = $_COOKIE["UserLoginPassword"];
                $email = $_COOKIE["UserLoginEmail"];

                foreach($_POST['odpowiedz'] as $idPytania => $wybranaOdpowiedz) {
                    $resoult =  mysqli_query($Connect, "select CorrectAnswer from pytania where id = $idPytania");
                    $row = mysqli_fetch_row($resoult);

                    if($row[0] == $wybranaOdpowiedz){
                        $score ++;
                    }
                   

                }
                
                echo "<h2>Twój wynik to: ".$score."/40 <br>";
                $precentage = ($score/40)*100;
                print("Procenty: ".$precentage."% <br>");

                $sql = "update uzytkownicy set quizAttempts = quizAttempts + 1 where username = '$login' and password = '$password' and email = '$email';";
                $resoult = mysqli_query($Connect, $sql);

                if($precentage >= 50){
                    print("Zdane!");

                }else{
                    print("Oblane");
                }

                if($score >= 20){
                    $sql = "update uzytkownicy set Passes = Passes + 1 where username = '$login' and password = '$password' and email = '$email';";
                    $resoult = mysqli_query($Connect,$sql);
                }
                

                $sql = "select HighesScore from uzytkownicy where username = '$login' and password = '$password' and email = '$email';";
                $resoult = mysqli_query($Connect,$sql);


                $row = mysqli_fetch_row($resoult);
                if($row[0] < $score){
                    $sql = "update uzytkownicy set HighesScore = '$score' where username = '$login' and password = '$password' and email = '$email';";
                    $resoult = mysqli_query($Connect,$sql);
                }

                $sql = "select avargeScore, quizAttempts from uzytkownicy where username = '$login' and password = '$password' and email = '$email';";
                $resoult = mysqli_query($Connect,$sql);

                $row = mysqli_fetch_row($resoult);
                $StaryAVG = $row[0];
                $QA = $row[1];
                if($QA[0]== 0){
                    $QA[0] = 1;
                }

                $NovyAVG = ($StaryAVG + $score)/$QA;
                $sql = "update uzytkownicy set avargeScore = '$NovyAVG' where username = '$login' and password = '$password' and email = '$email';";
                $resoult = mysqli_query($Connect,$sql);

                setcookie("UserLoginUsername", "",time() - 3600, "/");
                setcookie("UserLoginPassword", "",time() - 3600, "/");
                setcookie("UserLoginEmail", "",time() - 3600, "/");

                mysqli_close($Connect)
            ?>
        </div>
    </body>
</html>