<?php
session_start();
require("db.php");

if (!isset($_SESSION["login"])) {
    header("Location: logowanie.php");
    exit();
}
$login = $_SESSION["login"];
$userId = $_SESSION["id"];

$sql = "SELECT zg.id, zg.tresc, zg.data, odp.tresc AS odpowiedz 
        FROM zgloszenia zg
        LEFT JOIN odpowiedzi odp ON zg.id = odp.idZgloszenia
        WHERE zg.idUzytkownika = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$konwersacje = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idZgloszenia = $row['id'];
        $tresc = $row['tresc'];
        $data = $row['data'];
        $odpowiedz = $row['odpowiedz'];

        $wpis = array(
            'id' => $idZgloszenia,
            'tresc' => $tresc,
            'data' => $data,
            'odpowiedz' => $odpowiedz
        );

        $konwersacje[] = $wpis;
    }
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto użytkownika</title>
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
            max-width: 50%;
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

        #reportForm textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            margin-top: -30px;
        }

        #reportForm button {
            background-color: #FE9000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        #reportForm button:hover {
            background-color: #FFA533;
        }

        #reportForm p {
            color: white;
            width: 60%;
            font-size: 22px;
            font-weight: bold;
            border-radius: 5px;
            background-color: black;
            margin: 20px auto;
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
                <a href="uzytkownik.php" style="background-color: #FE9000; color: #fff; font-size: 20px;">MOJE KONTO</a>
                <a href="logout.php">WYLOGUJ</a>
            </div>

            <div class="sekcja_konta">
                <h2>Witaj, <?php echo $login; ?>!</h2>
                <div class="powitanie">
                    Cieszymy się, że jesteś z nami!<br>
                    <span>Oto kilka opcji do wyboru</span>
                </div>
                <a class="zakladka" href="moje_rezerwacje.php">HISTORIA REZERWACJI<br>DODAJ OPINIE</a>
                <a class="zakladka" href="aktualne_rezerwacje.php">AKTUALNE REZERWACJE</a>
                <a class="zakladka" href="moje_recenzje.php">MOJE RECENZJE</a>
                <a class="zakladka" href="moje_ulubione.php">MOJE ULUBIONE</a>

                <div id="lista-zgloszen">
                    <div class="konwersacja">
                        <div class="konwersacja-header">
                            <h3>Konwersacja z Administratorem</h3>
                        </div>
                        <div class="konwersacja-body">
                            <?php foreach ($konwersacje as $wpis) : ?>
                                <div class='zgloszenie' data-id='<?php echo $wpis["id"]; ?>'>
                                    <p><strong><?php echo $wpis["data"]; ?>:</strong><br>Ty: <?php echo $wpis["tresc"]; ?></p>
                                    <?php if (!empty($wpis["odpowiedz"])) : ?>
                                        <p id="odp"><strong>Administrator:</strong><br><?php echo $wpis["odpowiedz"]; ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            <?php if (empty($konwersacje)) : ?>
                                <p>Brak zgłoszeń do wyświetlenia.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <form id="reportForm" action="addReport.php" method="post">
                        <p>ZGŁOŚ/ZAPYTAJ/ODPOWIEDZ:</p>
                        <br>
                        <textarea name="tresc" required></textarea>
                        <br>
                        <button type="submit">Wyślij</button>
                    </form>
                </div>
            </div>

            <?php require("stopka.php"); ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/uzytkownik.js"></script>
</body>

</html>