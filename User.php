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

        <script>
            function validate(){


                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;
                let email = document.getElementById("email").value.trim();
                let name = document.getElementById("imie").value; 
                let surname = document.getElementById("nazwisko").value;

                let specialLetters = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
                let validation = /[A-Z]+[a-z]+[0-9]+/;

                if(password != ""){
                    if (!specialLetters.test(password) || !validation.test(password)) {
                        alert("Hasło musi zawierać co najmniej 1 dużą literę, 1 małą literę, 1 cyfrę oraz znak specjalny, i nie może być puste.");
                        return false;
                    }
                }
            }
            validate();
        </script>
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
            <a href = "quiz.php">Wylosuj 40 pytań!</a>
            <a href = "User.php">Twoje konto</a>
        
        </div>

        <div id="center">
            <h1>Tu możesz zmienić dane swojego konta</h1>
            <h2>Puste pole oznacza brak zmiany danego pola</h2>
            <form action="User.php" method="POST" onSubmit="return validate()">
                <p>Nazwa użytkownika: </p><input type="text" id="username" name="username"><br>
                <p>Hasło: </p><input type = "password" id="password" name="password"><br>
                <p>Email: </p><input type = "text" id="email" name="email"><br>
                <p>Imie: </p><input type = "text" id="imie" name="imie"><br>
                <p>Nazwisko: </p><input type = "text" id="nazwisko" name="nazwisko"><br> 
                <input type="submit" value="Zmień dane"><br>
            </form>
            <?php
                error_reporting(E_ALL ^ E_WARNING);

                $Connect = mysqli_connect("localhost","root","","egzaminyzawodowe");

                $loginC = $_COOKIE["UserLoginUsername"];
                $passwordC = $_COOKIE["UserLoginPassword"];
                $emailC = $_COOKIE["UserLoginEmail"];

                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $imie = $_POST["imie"];
                $nazwisko = $_POST["nazwisko"];

                $flaga = 0;
                if(isset($_POST)){
                    if(!empty($username)){
                        $updates[] = "username = '$username'";
                    }
            
                    if(!empty($password)){
                        $updates[] = "password = '$password'";
                    }
            
                    if(!empty($email)){
                        $updates[] = "email = '$email'";
                    }
            
                    if(!empty($imie)){
                        $updates[] = "name = '$imie'";
                    }
            
                    if(!empty($nazwisko)){
                        $updates[] = "surname = '$nazwisko'";
                    }
            
                    if(!empty($updates)){
                        $sql = "UPDATE uzytkownicy SET ";
                        $sql .= implode(", ", $updates);
                        $sql .= " WHERE username = '$loginC' AND password = '$passwordC' AND email = '$emailC'";
            
                        
                        $result = mysqli_query($Connect, $sql);
                        
                        if($result){
                            echo "Dane zmienione";
                            $flaga = 1;
                            setcookie("UserLoginUsername", "",time() - 3600, "/");
                            setcookie("UserLoginPassword", "",time() - 3600, "/");
                            setcookie("UserLoginEmail", "",time() - 3600, "/");
                        } else {
                            echo "Wystąpił błąd podczas aktualizacji danych";
                        }
                    }
                }
                

                mysqli_close($Connect)
            ?>
        </div>
    </body>
</html>