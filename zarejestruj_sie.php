<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
            margin: 40px auto;
            font-size: 22px;
            color: white;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        #rejestracja_formularz {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        #zaloguj h3 {
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
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
            min-height: 100vh;
            width: auto;
        }

        ul {
            list-style-type: none;
            text-align: left;
        }

        #jakzarejestrowany {
            text-decoration: none;
            color: #FE9000;
            transition: font-size 0.3s;
        }

        #jakzarejestrowany:hover {
            font-size: 24px;
            transition: font-size 0.3s;
        }

        #linki {
            color: #FE9000;
        }

        #zaloguj p {
            width: 40%;
        }

        #do_logowania {
            text-align: center;
        }

        #zaloguj h1 {
            letter-spacing: 20px;
        }

        .bezstopki {
            min-height: 100vh;
        }

        #zachęta {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    require ("db.php");
    if (isset($_POST["login"])) {
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
        $email = $_POST["email"];

        $sql = "INSERT INTO uzytkownicy (login, haslo, email) VALUES ('$login', '" . md5($haslo) . "', '$email')";
        $result = $conn->query($sql);


        if ($result) {
            $_SESSION['message_rejestracja'] = "Zostałeś pomyślnie zarejestrowany.";
        } else {
            $_SESSION['message_rejestracja'] = "Wystąpił błąd podczas rejestracji. Spróbuj ponownie.'" . $conn->error;
        }
        $conn->close();
        header("Location: logowanie.php");
        exit;
    }
    ?>
    <div id="tłobmw">
        <div class="bezstopki">
            <div id="blok_zakładki">
                <a href="strona_główna.php">STRONA GŁÓWNA</a>
                <a href="oferta.html">OFERTA</a>
                <a href="flota.php">FLOTA</a>
                <a href="faq.html">FAQ</a>
                <a href="kontakt.html">KONTAKT</a>
                <a href="logowanie.php">LOGOWANIE</a>
                <a href="zarejestruj_sie.html"
                    style="background-color: #FE9000; color: #fff; font-size: 20px;">REJESTRACJA</a>
            </div>
            <div id="zaloguj">
                <h1>Zarejestruj się już teraz.</h1>
                <p id="zachęta">Dołącz do naszej ekipy i Twórz z nami historię!</p>
                <form id="rejestracja_formularz" class="form" action="zarejestruj_sie.php" method="post">
                    <input type="text" name="login" placeholder="Login" required />
                    <input type="email" name="email" placeholder="Adres email" required />
                    <input type="password" id="password" name="haslo" placeholder="Hasło" required>
                    <input type="password" id="password2" name="haslo2" placeholder="Powtórz hasło" required>
                    <p><input type="checkbox" name="regulamin" required>Akceptuję <a id="linki"
                            href="regulamin.php">regulamin</a>.</p>
                    <p>Administratorem danych osobowych jest AUTO NA JUZ Polska sp. z o.o. z siedzibą w Siemiatyczach
                        (17-300), ul. Haloalo 12. Twoje dane osobowe są przetwarzane w celu umożliwienia założenia konta
                        i
                        korzystania z serwisu, w tym usług świadczonych elektronicznie za jego pośrednictwem.</p>
                    <button type="submit">Zarejestruj się!</button>
                    <p id="do_logowania">Już zarejestrowany? <a id="jakzarejestrowany" href="logowanie.php">Zaloguj
                            się!</a></p>
                </form>
            </div>
        </div>
        <?php
        require ("stopka.php");
        ?>
    </div>
</body>

</html>