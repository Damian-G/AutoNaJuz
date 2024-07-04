<?php
require('db.php');
session_start();
if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='" . md5($haslo) . "'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $user = $result->fetch_object();
        $_SESSION["login"] = $login;
        $_SESSION["id"] = $user->id;
        $_SESSION["rola"] = $user->rola;

        if ($user->rola == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: uzytkownik.php");
        }
        exit();
    } else {
        $_SESSION["login_error"] = true;
        header("Location: logowanie.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Logowanie</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        #blok_zakładki {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            list-style-type: none;
            padding: 0;
            height: 7vh;
            position: sticky;
            top: 0;
            background-color: rgb(0, 0, 0);
            z-index: 1000;
            border-bottom: 1px solid white;
        }

        #blok_zakładki a {
            text-decoration: none;
            color: #c4c4c4;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.9s, color 0.9s, font-size 0.9s;
            letter-spacing: 2px;
            font-weight: 5px;
            font-size: 22px;
        }

        #blok_zakładki a:hover {
            background-color: #FE9000;
            color: #fff;
            font-size: 24px;
        }

        #zaloguj {
            width: 100%;
            font-size: 22px;
            color: white;
            border-radius: 10px;
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 40%;
            height: 40px;
            margin-top: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 18px;
        }

        button {
            display: block;
            font-size: 26px;
            width: 35%;
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
            margin: 20px auto;
            outline: none;
        }

        button:hover {
            background-color: #FE9000;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) inset;
        }

        #tłobmw {
            background-image: url("img/bmw.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            min-height: 100vh;
        }

        ul {
            list-style-type: none;
            text-align: left;
        }

        #blok_informacyjny {
            font-size: 22px;
            display: flex;
            justify-content: center;
            color: white;
            width: 72%;
            margin: 40px auto;
            text-align: center;
        }

        #nad1,
        #nad2,
        #nad3 {
            margin: 20px;
            width: 34%;
            border-top: 2px solid #FE9000;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #blok_glowny {
            font-size: 22px;
            display: flex;
            justify-content: center;
            color: white;
            width: 72%;
            margin: 40px auto;
        }

        p {
            color: white;
            font-size: 22px;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #FE9000;
            transition: font-size 0.3s;
        }

        a:hover {
            font-size: 24px;
            transition: font-size 0.3s;
        }

        .bezstopki {
            min-height: 100vh;
        }

        #zaloguj h1 {
            letter-spacing: 20px;
        }

        #glowny_i_informacyjny {
            align-items: center;
            margin: 30px;
        }

        #blok_informacyjny b {
            font-size: 24px;
        }

        #zachęta {
            text-align: center;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div id="tłobmw">
        <div class="bezstopki">
            <div id="blok_zakładki">
                <a href="strona_główna.php">STRONA GŁÓWNA</a>
                <a href="oferta.php">OFERTA</a>
                <a href="flota.php">FLOTA</a>
                <a href="faq.php">FAQ</a>
                <a href="kontakt.php">KONTAKT</a>
                <a href="logowanie.php" style="background-color: #FE9000; color: #fff; font-size: 20px;">LOGOWANIE</a>
            </div>
            <div id="glowny_i_informacyjny">
                <div id="blok_glowny">
                    <div id="zaloguj">
                        <h1>Zaloguj się już dziś!</h1>
                        <p id="zachęta">Wejdź do świata wygody i dostępności!</p>
                        <?php
                        if (isset($_SESSION["login_error"])) {
                            echo "<h3 style='color:red; margin-bottom:-30px; letter-spacing:5px;'>Nieprawidłowy login lub hasło.<br>Spróbuj ponownie!</h3><br/>";
                            unset($_SESSION["login_error"]);
                        }
                        ?>
                        <form method="post" action="logowanie.php">
                            <input type="text" name="login" placeholder="Login" autofocus="true" required /><br>
                            <input type="password" name="haslo" placeholder="Hasło" required />
                            <button type="submit">Zaloguj się!</button>
                            <p>Nowy użytkownik?<a href="zarejestruj_sie.php"> Zarejestruj się!</a></p>
                        </form>
                    </div>
                </div>
                <div id="blok_informacyjny">
                    <div id="nad1">
                        <p><b>Sprawdzaj historie Twoich rezerwacji.</b></p>
                        <p>Masz stały dostęp do przeglądu historii swoich rezerwacji.</p>
                    </div>
                    <div id="nad2">
                        <p><b>Odkrywaj nowe możliwości.</b></p>
                        <p>Znajdź samochód idealny na każdą okazję.</p>
                    </div>
                    <div id="nad3">
                        <p><b>Rezerwuj samochody jeszcze szybciej.</b></p>
                        <p>Dzięki naszym nowym funkcjom, proces rezerwacji jest jeszcze bardziej intuicyjny i szybki.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require("stopka.php");
        ?>
    </div>
    <script>
    window.onload = function() {
            <?php
            if (isset($_SESSION['message_rejestracja'])) {
                echo "setTimeout(function() { alert('" . $_SESSION['message_rejestracja'] . "'); }, 100);";
                unset($_SESSION['message_rejestracja']);
            }
            ?>
        }
    </script>
</body>

</html>