<?php
session_start();
require("db.php");

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$idUzytkownika = $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje Ulubione</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
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

        .bezstopki {
            min-height: 100vh;
        }

        .blok_ulubione {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .oferta {
            background-color: rgba(30, 30, 30, 0.9);
            color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
            padding: 20px;
            margin: 20px;
            width: calc(33% - 40px);
            position: relative;
        }

        .oferta img {
            max-width: 100%;
            border-radius: 10px;
        }

        .oferta h3 {
            margin: 10px 0;
            font-size: 24px;
        }

        .oferta b {
            font-weight: bold;
            color: #FE9000
        }

        .oferta p {
            font-size: 18px;
            margin: 10px 0;
        }

        .brak-ulubione {
            text-align: center;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 20px;
            color: white;
            background-color: rgba(30, 30, 30, 0.9);
        }

        #powrot a {
            font-size: 22px;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            letter-spacing: 2px;
            margin: 20px;
            border-bottom: 2px solid #FE9000;
        }

        #powrot {
            text-align: center;
        }

        #powrot a:hover {
            background-color: #FE9000;
        }

        .opcje {
            text-align: center;
            margin-top: 10px;
        }

        #zarezerwuj {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FE9000;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        #zarezerwuj:hover {
            background-color: #FFA933;
        }
    </style>
</head>

<body>
    <div id="tłobmw">
        <div id="powrot">
            <a href="uzytkownik.php">POWRÓT</a>
        </div>
        <div class="blok_ulubione">
            <?php
            $conn = new mysqli("localhost", "root", "", "wypozyczalniaautdb");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT f.* FROM flota f
                        JOIN ulubione u ON f.id = u.idAuta
                        WHERE u.idUzytkownika = $idUzytkownika";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $marka = $row['marka'];
                    $model = $row['model'];
                    $rok = $row['rok'];
                    $rodzaj_paliwa = $row['rodzaj_paliwa'];
                    $spalanie = $row['spalanie'];
                    $skrzynia_biegow = $row['skrzynia_biegow'];
                    $rodzaj_napedu = $row['rodzaj_napedu'];
                    $ilosc_miejsc = $row['ilosc_miejsc'];
                    $stawka_dzienna = $row['stawka_dzienna'];
                    $stawka_miesieczna = $row['stawka_miesieczna'];
                    $stawka_kilometrowa = $row['stawka_kilometrowa'];
                    $obrazek = $row['obrazek'];
                    $opis = $row['opis'];

                    echo "<div class='oferta'>";
                    echo "<div class='zawartosc'>";
                    echo "<div class='zdj_auta'>";
                    echo "<img src='flota/$obrazek' alt='$marka $model'>";
                    echo "</div>";
                    echo "<div class='opis-oferty'>";
                    echo "<h1 class='tytul-oferty'>$marka $model $rok</h1>";
                    echo "<p id='opis'>$opis</p>";
                    echo "<div class='kolumny'>";
                    echo "<div class='kolumna'>";
                    echo "<p><b>Ilość miejsc:</b> $ilosc_miejsc</p>";
                    echo "<p><b>Spalanie:</b> $spalanie</p>";
                    echo "</div>";
                    echo "<div class='kolumna'>";
                    echo "<p><b>Rodzaj napędu:</b> $rodzaj_napedu</p>";
                    echo "<p><b>Skrzynia biegów:</b> $skrzynia_biegow</p>";
                    echo "<p><b>Rok:</b> $rok</p>";
                    echo "</div>";
                    echo "<div class='kolumna'>";
                    echo "<p><b>Stawka miesięczna:</b> $stawka_miesieczna PLN</p>";
                    echo "<p><b>Stawka za kilometr:</b> $stawka_kilometrowa PLN/km</p>";
                    echo "<p><b>Stawka dzienna:</b> $stawka_dzienna PLN</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='opcje'>";
                    echo "<form method='POST' action='rezerwacje.php'>";
                    echo "<input id='zarezerwuj' type='hidden' name='idAuta' value='" . ($row['id']) . "'>";
                    echo "<input id='zarezerwuj' type='submit' name='rezerwuj' value='Zarezerwuj'>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='brak-ulubione'>Brak ulubionych samochodów.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>