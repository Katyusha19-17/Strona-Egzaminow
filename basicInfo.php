<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style2.css">        
    </head>
    <body>
        <div id="banner">
            <h1>Egzaminy zawodowe</h1>
        </div>

        <div id="navbar">
            <?php
                if(isset($_COOKIE["UserLoginUsername"]) && isset($_COOKIE["UserLoginPassword"]) && isset($_COOKIE["UserLoginEmail"])){
                    echo "<a href = 'Home.php'>Home</a>";
                    echo "<a href = 'logOut.php'>Wyloguj</a>";
                    echo "<a href = 'FAQ.php'>FAQ</a>";
                    echo  "<a href = 'basicInfo.php'>Podstawowe informacje</a>";
                }else{
                    echo "<a href = 'index.php'>Home</a>";
                    echo "<a href = 'LogIn.php'>Zaloguj się</a>";
                    echo "<a href = 'signIn.html'>Zarejestruj się</a>";
                    echo "<a href = 'basicInfo.php'>Podstawowe informacje</a>";
                }
            ?>
            
            
        </div>

        <div id="left">
            <h1>Egzamin INF.03</h1>

            <h2>Tworzenie i administrowanie stronami i aplikacjami internetowymi oraz bazami danych</h2>
            <p>Uczeń:</p>

            <lu>
                <li>Tworzenie własnej grafiki</li>
                <li>Obróbka grafiki rastrowej lub wektorowej</li>
                <li>Pobieranie danych ze strony internetowej i zapisywanie ich do bazy danych</li>
                <li>Wykorzystanie systemów CMS (Joomla! i WordPress)</li>
                <li>Wykorzystanie w aplikacjach ciasteczek i mechanizmu sesji</li>
                <li>Wykorzystanie w aplikacjach skryptów odwołujących się do modelu DOM i modyfikujących / dodających / usuwających elementy strony</li>
                <li>Tworzenie zapytań aktualizujących bazę danych</li>
                <li>Wykorzystanie funkcji agregujących w zapytaniach do bazy danych</li>
                <li>Wykorzystanie w zapytaniach do bazy danych relacji między tabelami</li>
                <li>Zarządzanie użytkownikami bazy danych</li>
                <li>Tworzenie stron z wykorzystaniem języka HTML 5 i możliwości tego języka</li>
                <li>Zastosowanie w stylu CSS pseudoklas, pseudoelementów, stylów potomków, braci</li>
                <li>Definiowanie stylu CSS dla klasy</li>
                <li>Wykorzystanie reguły @media w celu tworzenia stron responsywnych</li>
                <li>Obsługa tablic globalnych w języku PHP</li>
                <li>Obsługa danych np.: dat, napisów</li>
                <li>Wykorzystanie bibliotek wbudowanych w językach skryptowych</li>
                <li>Wykorzystanie mechanizmów walidacji formularzy w skryptach lub na stronie z wykorzystaniem możliwości języka HTML5.</li>

            </lu>
        </div>

        <div id="right">
            <h1>Egzamin INF.04</h1>

            <h2>Projektowanie, programowanie i testowanie aplikacji</h2>

            <lu>
                <li>Implementacja algorytmów sortowania</li>
                <li>Implementacja algorytmów poszukiwań, szyfrowania</li>
                <li>Implementacja algorytmów operujących na wybranych typach danych (np. operacje na zmiennych napisowych)</li>
                <li>Implementacja różnych algorytmów zapisanych w postaci opisu, kroków, schematu blokowego</li>
                <li>Projektowanie zestawu danych i typów do zadanego problemu</li>
                <li>Projektowanie klasy z zestawem pól i metod obsługującej konkretne zagadnienie.</li>
                <li>Implementacja aplikacji okienkowej obsługującej okno dialogowe do wpisania danych, system menu aplikacji</li>
                <li>Projektowanie zestawu okien dialogowych dla aplikacji okienkowej</li>
                <li>Implementacja aplikacji mobilnej obsługującej różne rozkłady (layouts) i zawierającej kontrolki takie jak: pola edycyjne, edytor, pole wyboru (spinner), przełącznik (switch), pasek postępu (slider), stepper, picker, data i czas, przyciski i inne</li>
                <li>Implementacja aplikacji mobilnej obsługującej obrazy</li>
                <li>Implementacja aplikacji mobilnej z systemem menu i przechodzeniem do podstron</li>
                <li>Projektowanie interfejsu użytkownika z wykorzystaniem języków znaczników (np. XAML, XML)</li>
                <li>Implementacja aplikacji internetowych przy wykorzystaniu Angular lub ReactJS (do wyboru) obejmujących wykonanie komponentu z kontrolkami i ich walidacją oraz obsługą zdarzeń</li>
                <li>Implementacja aplikacji internetowych przy wykorzystaniu Angular lub ReactJS (do wyboru) złożonych z kilku podstron</li>
                <li>Obsługa komunikacji części front-end z serwerem za pomocą JSON</li>
                <li>Implementacja części serwerowej aplikacji internetowej w środowisku Node.js lub Django lub ASP.NET (do wyboru) i zarządzania danymi z bazy.</li>
            </lu>
        </div>
    </body>
</html>