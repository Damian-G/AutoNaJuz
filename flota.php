<?php
session_start();
require("db.php");
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

        #tłobmw {
            background-image: url("img/bmw.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            min-height: 100vh;
        }

        a:hover {
            font-size: 24px;
            transition: font-size 0.3s;
        }

        .bezstopki {
            min-height: 100vh;
        }

        .kategorie {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px;
            font-size: 24px;
        }

        .kategoria {
            background-color: #222;
            color: #fff;
            padding: 15px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            transition: transform 0.3s;
        }

        .kategoria:hover {
            padding-bottom: 4px;
            border-bottom: 4px solid #FE9000;
            transform: translateY(-4px);
            transition: background-color 0.3s;
            transition: transform 0.3s;
        }

        .kategoria:active {
            transform: translateY(2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2) inset;
        }

        .oferta {
            background-color: #f5f5f5;
            width: 72%;
            min-height: 200px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .oferta .zawartosc {
            display: flex;
            flex-direction: row;
            gap: 20px;
            padding: 20px;
        }

        .zdj_auta {
            flex: 0 0 40%;
            box-shadow: 5px 4px 8px rgba(0, 0, 0, 0.2);
            margin: auto;
        }

        .zdj_auta img {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.9));
        }

        .opis-oferty {
            flex: 1;
            font-size: 16px;
            display: flex;
            flex-direction: column;
        }

        .tytul-oferty {
            font-size: 24px;
            margin-bottom: 10px;
            color: #FE9000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .kolumny {
            display: flex;
            gap: 20px;
        }

        .kolumna p {
            color: #555;
            margin-bottom: 5px;
        }

        #zarezerwuj,
        #wyszukaj_przycisk {
            display: block;
            font-size: 26px;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
            margin: 10px auto;
            outline: none;
        }

        #zarezerwuj:hover {
            background-color: #FE9000;
            transform: translateY(-2px);
        }
        #wyszukaj_przycisk:hover {
            background-color: #FE9000;
            transform: translateY(-2px);
        }

        #wyszukaj_przycisk:active {
            transform: translateY(2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) inset;
        }

        #zarezerwuj:active {
            transform: translateY(2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) inset;
        }

        .blok_opinii {
            width: 100%;
            background-color: #f5f5f5;
            border-top: 1px solid #ddd;
            padding: 10px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .opinie_tresc {
            display: none;
            background-color: #fafafa;
            padding: 20px;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        .blok_opinii:hover {
            background-color: #FE9000;
            color: #fff;
        }

        .opinia {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            margin-bottom: 15px;
        }

        .opinia p {
            margin: 5px 0;
            line-height: 1.6;
        }

        .opinia .login_tresc {
            margin-bottom: 5px;
        }

        .opinia .login_tresc strong {
            font-weight: bold;
        }

        .opinia .opinia_data {
            color: #999;
            font-size: 14px;
        }

        .fav {
            height: 60px;
            width: 60px;
            cursor: pointer;

        }

        #wyszukaj {
            width:40%;
            display: block;
            font-size: 26px;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px auto;
            outline: none;
        }

        #wyszukaj_przycisk {
            width:40%;
        }
    </style>
</head>
<body>
    <div id="tłobmw">
        <div class="bezstopki">
            <div id="blok_zakładki">
                <a href="strona_główna.php">STRONA GŁÓWNA</a>
                <a href="oferta.php">OFERTA</a>
                <a href="flota.php" style="background-color: #FE9000; color: #fff; font-size: 20px;">FLOTA</a>
                <a href="faq.php">FAQ</a>
                <a href="kontakt.php">KONTAKT</a>
                <?php require ("sprawdz_konto.php");?>
            </div>
            <div class="kategorie">
                <a href="flota.php" class="kategoria">WSZYSTKIE</a>
                <?php
                $conn = new mysqli("localhost", "root", "", "wypozyczalniaautdb");
                $sql = "SELECT * FROM kategorie";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $nazwa = $row['nazwa'];
                        echo "<a href='flota.php?kategoria=$id' class='kategoria'>$nazwa</a>";
                    }
                } else {
                    echo "Brak kategorii dostępnych w bazie danych.";
                }
                $conn->close();
                ?>
            </div>
            <form method="GET" action="flota.php">
    <p>
        <input id="wyszukaj" type="text" name="fraza" placeholder="Wyszukaj frazę">
        <input id="wyszukaj_przycisk" type="submit" value="Wyszukaj">
    </p>
</form>

<div id="oferty">
    <?php
    require('db.php');

    $sql = "SELECT * FROM flota";
    $conditions = [];

    if (isset($_GET['kategoria'])) {
        $idKategorii = intval($_GET['kategoria']);
        $conditions[] = "idKategorii = $idKategorii";
    }

    if (isset($_GET['fraza']) && !empty($_GET['fraza'])) {
        $fraza = $conn->real_escape_string($_GET['fraza']);
        $conditions[] = "(marka LIKE '%$fraza%' OR model LIKE '%$fraza%' OR opis LIKE '%$fraza%')";
    }

    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idAuta = $row['id'];
            $marka = $row['marka'];
            $model = $row['model'];
            $rok = $row['rok'];
            $rodzaj_paliwa = $row['rodzaj_paliwa'];
            $spalanie = $row['spalanie'];
            $skrzynia_biegow = $row['skrzynia_biegow'];
            $rodzaj_napedu = $row['rodzaj_napedu'];
            $ilosc_miejsc = $row['ilosc_miejsc'];
            $rok = $row['rok'];
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
            echo "<div class='tytul-oferty'>";
            echo "<h1 class='tytul-oferty'>$marka $model $rok</h1>";

                        if (isset($_SESSION["id"])) {
                            $idUzytkownika = $_SESSION["id"];
                            $sql_ulubione = "SELECT id FROM ulubione WHERE idAuta = $idAuta AND idUzytkownika = $idUzytkownika";
                            $result_ulubione = $conn->query($sql_ulubione);
                            $added = $result_ulubione->num_rows > 0;
                            $src = $added ? "img/liked.png" : "img/unliked.png";

                            echo "<img class='fav' src='$src' data-auto='$idAuta'>";
                        }
                        echo "</div>";
                        echo "<p id='opis'>$opis</p>";
                        echo "<div class='kolumny'>";
                        echo "<div class='kolumna'>";
                        echo "<p><b>Ilość miejsc:</b> $ilosc_miejsc</p>";
                        echo "<p><b>Spalanie:</b> $spalanie</p>";
                        echo "<p><b>Rodzaj paliwa:</b> $rodzaj_paliwa</p>";
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
                        echo "<form method='POST' action='rezerwacje.php'>";
                        echo "<input id='zarezerwuj' type='hidden' name='idAuta' value='" . ($row['id']) . "'>";
                        echo "<input id='zarezerwuj' type='submit' name='rezerwuj' value='Zarezerwuj'>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='blok_opinii'>Opinie</div>";
                        echo "<div class='opinie_tresc'>";
                        $sqlOpinie = "SELECT login, tresc, data FROM recenzje WHERE idAuta = $idAuta";
                        $resultOpinie = $conn->query($sqlOpinie);

                        if ($resultOpinie->num_rows > 0) {
                            while ($row = $resultOpinie->fetch_assoc()) {
                                echo '<div class="opinia">';
                                echo '<p class="login_tresc">' . '<strong>' . $row['login'] . '</strong>' . ' napisał/a: ' . '<br>' . $row['tresc'] . '</p>';
                                echo '<p class="opinia_data">Data: ' . $row['data'] . '</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>Brak opinii dla tego pojazdu.</p>';
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "Brak dostępnych ofert.";
                }
                $conn->close();
                ?>
            </div>
        </div>
        <?php require("stopka.php"); ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const opinieBlocks = document.querySelectorAll('.blok_opinii');
            opinieBlocks.forEach(block => {
                block.addEventListener('click', function () {
                    const content = this.nextElementSibling;
                    if (content.style.display === "none" || content.style.display === "") {
                        content.style.display = "block";
                    } else {
                        content.style.display = "none";
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/ulubione.js"></script>
    <script>
        window.onload = function() {
            <?php
            if (isset($_SESSION['message_rezerwacja'])) {
                echo "setTimeout(function() { alert('" . $_SESSION['message_rezerwacja'] . "'); }, 100);";
                unset($_SESSION['message_rezerwacja']);
            }
            ?>
        }
    </script>
</body>
</html>
