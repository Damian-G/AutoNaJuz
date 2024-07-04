<?php
session_start();
require("db.php");

if (!isset($_SESSION["login"])) {
    header("Location: logowanie.php");
    exit();
}
$sql = "SELECT zg.id, u.login AS loginUzytkownika, zg.tresc, zg.data, odp.tresc AS odpowiedz 
        FROM zgloszenia zg
        LEFT JOIN odpowiedzi odp ON zg.id = odp.idZgloszenia
        LEFT JOIN uzytkownicy u ON zg.idUzytkownika = u.id";
$result = $conn->query($sql);

$konwersacje = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idZgloszenia = $row['id'];
        $loginUzytkownika = $row['loginUzytkownika'];
        $tresc = $row['tresc'];
        $data = $row['data'];
        $odpowiedz = $row['odpowiedz'];

        if (!isset($konwersacje[$loginUzytkownika])) {
            $konwersacje[$loginUzytkownika] = array();
        }
        $wpis = array(
            'id' => $idZgloszenia,
            'tresc' => $tresc,
            'data' => $data,
            'odpowiedz' => $odpowiedz
        );

        $konwersacje[$loginUzytkownika][] = $wpis;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
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

        #tłobmw {
            background-image: url("img/bmw.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            width: auto;
            min-height: 100vh;
        }

        #bezstopki {
            min-height: 100vh;
        }

        .sekcja_konta {
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .sekcja_konta h2 {
            margin-bottom: 20px;
            font-size: 40px;
            color: #FE9000;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 5px;
        }

        .zakladka {
            background-color: #222;
            color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            display: block;
            margin: 20px auto;
            max-width: 60%;
            text-align: center;
            font-size: 28px;
        }

        .zakladka:hover {
            background-color: #FE9000;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .powitanie {
            font-size: 24px;
            line-height: 1.6;
            color: #666;
            margin-top: 30px;
        }

        .powitanie span {
            display: block;
            font-size: 28px;
            font-weight: bold;
            color: #FE9000;
            margin-top: 10px;
        }

        .konwersacja {
            margin-top: 10px;
            padding: 5px;
            background-color: #222;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.9);
            border-radius: 10px;
        }



        .zgloszenie {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #222;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.9);
            color: white;
        }

        .zgloszenie p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .zgloszenie strong {
            font-weight: bold;
        }

        .zgloszenie textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
            resize: vertical;
        }

        .zgloszenie button {
            background-color: #FE9000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .zgloszenie button:hover {
            background-color: #FFA533;
        }

        #odp {
            background-color: #FE9000;
            color: black;
        }


        .konwersacja-header {
            background-color: #222;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 8px;
            margin: 5px auto;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.9);
        }

        .konwersacja-body {
            display: none;
            

            border-radius: 8px;
        }
    </style>

</head>

<body>
    <div id="tłobmw">
        <div id="bezstopki">
            <div id="blok_zakładki">
                <a href="strona_główna.php">STRONA GŁÓWNA</a>
                <a href="oferta.php">OFERTA</a>
                <a href="flota.php">FLOTA</a>
                <a href="faq.php">FAQ</a>
                <a href="kontakt.php">KONTAKT</a>
                <a href="admin.php" style="background-color: #FE9000; color: #fff; font-size: 20px;">ZARZĄDZANIE</a>
                <a href="logout.php">WYLOGUJ</a>
            </div>
            <div class="sekcja_konta">
                <h2>Witaj, <?php echo $_SESSION["login"]; ?>!</h2>
                <div class="powitanie">
                    Panel administratora<br>
                    <span>Oto kilka opcji do wyboru</span>
                </div>
                <a class="zakladka" href="dodaj_pojazd_form.php">DODAJ POJAZD</a>
                <a class="zakladka" href="usun_pojazd_form.php">USUŃ POJAZD</a>
                <a class="zakladka" href="aktualizacja_pojazdow.php">EDYTUJ POJAZD</a>
                <a class="zakladka" href="rezerwacje_klientow.php">REZERWACJE KLIENTÓW</a>
                <div id="lista-zgloszen">
                    <?php foreach ($konwersacje as $loginUzytkownika => $konwersacja) : ?>
                        <div class="konwersacja" data-id="<?php echo $loginUzytkownika; ?>">
                            <div class="konwersacja-header">
                                <h3><?php echo 'Zgłoszenie użytkownika: ' . $loginUzytkownika; ?></h3>
                            </div>
                            <div class="konwersacja-body">
                                <?php foreach ($konwersacja as $wpis) : ?>
                                    <div class='zgloszenie' data-id='<?php echo $wpis["id"]; ?>'>
                                        <p><strong><?php echo $wpis["data"] . ' ' . $loginUzytkownika; ?>:</strong> <?php echo $wpis["tresc"]; ?></p>
                                        <?php if (!empty($wpis["odpowiedz"])) : ?>
                                            <p id="odp"><strong>Twoja odpowiedź:</strong><br><?php echo $wpis["odpowiedz"]; ?></p>
                                        <?php else : ?>
                                            <form class='odpowiedz-form'>
                                                <input type='hidden' name='idZgloszenia' value='<?php echo $wpis["id"]; ?>'>
                                                <textarea name='trescOdpowiedzi' placeholder='Odpowiedź...' required></textarea>
                                                <button type='submit'>Odpowiedz</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>



                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($konwersacje)) : ?>
                        <p style="color:white;">Brak zgłoszeń do wyświetlenia.</p>
                    <?php endif; ?>
                </div>

            </div>
            <?php require("stopka.php"); ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/admin.js"></script>
</body>

</html>