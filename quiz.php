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
        <link rel="stylesheet" href="quiz.css">        
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

                echo "<h2>Żeby zdać trzeba uzyskać 50% czyli 20 poprawnych odpowiedzi</h2>";

                echo "<form action='quizCheck.php' method='POST'>";

                $uniqueNumbers = array();
                while(count($uniqueNumbers) < 40) {
                    $randomNumber = rand(1, 100);
                    if(!in_array($randomNumber, $uniqueNumbers)) {
                        $uniqueNumbers[] = $randomNumber;
                        
                    }
                }

                error_reporting(E_ALL ^ E_WARNING);

                $Connect = mysqli_connect("localhost","root","","egzaminyzawodowe");
                
                $paras = implode(', ', $uniqueNumbers);

                $sql = "select * from pytania where id in ($paras) ORDER BY FIELD(id, $paras)";
                $resoult = mysqli_query($Connect,$sql);

                while($row = mysqli_fetch_assoc($resoult)){
                    echo '<p>'.$row["Tresc"].'</p>';
                    echo '<a>'.$row["Pytanie1"].'</a>';
                    echo '<input type="radio" name="odpowiedz['.$row["ID"].']" value="1" checked><br>';
                    echo '<a>'.$row["Pytanie2"].'</a>';
                    echo '<input type="radio" name="odpowiedz['.$row["ID"].']" value="2"><br>';
                    echo '<a>'.$row["Pytanie3"].'</a>';
                    echo '<input type="radio" name="odpowiedz['.$row["ID"].']" value="3"><br>';
                    echo '<a>'.$row["Pytanie4"].'</a>';
                    echo '<input type="radio" name="odpowiedz['.$row["ID"].']" value="4"><br>';
                    
                }
                
                echo "<input type='submit' value='sprawdź'>";
                echo "</form>";

                mysqli_close($Connect)
            ?>
        </div>
    </body>
</html>