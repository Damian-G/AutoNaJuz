<?php
require("db.php");
session_start();
$sql = "SELECT * FROM rezerwacje";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wszystkie rezerwacje</title>
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

        #bezstopki {
            min-height: 100vh;
        }

        .blok_rezerwacji {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .rezerwacja {
            background-color: rgba(30, 30, 30, 0.9);
            color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
            padding: 20px;
            margin: 20px;
            width: calc(33% - 40px);
            position: relative;
        }

        .rezerwacja img {
            max-width: 100%;
            border-radius: 10px;
        }

        .rezerwacja h3 {
            margin: 10px 0;
            font-size: 24px;
        }

        .rezerwacja b {
            font-weight: bold;
            color: #FE9000
        }

        .rezerwacja p {
            font-size: 18px;
            margin: 10px 0;
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

        .brak-rezerwacji {
            text-align: center;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 20px;
            color: white;
            background-color: rgba(30, 30, 30, 0.9);
        }
    </style>
</head>

<body>
    <div id="tłobmw">
        <div id="powrot">
            <a href="admin.php">POWRÓT</a>
        </div>
        <div class="blok_rezerwacji">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $idRezerwacji = $row['id'];
                    $idAuta = $row['idAuta'];
                    $idUzytkownika = $row['idUzytkownika'];
                    $metoda_rezerwacji = $row['metoda_rezerwacji'];
                    $data_rezerwacji = $row['data_rezerwacji'];
                    $koniec_rezerwacji = $row['koniec_rezerwacji'];

                    $sql_pojazd = "SELECT marka, model, obrazek FROM flota WHERE id = $idAuta";
                    $result_pojazd = $conn->query($sql_pojazd);
                    
                    if ($result_pojazd->num_rows > 0) {
                        $row_pojazd = $result_pojazd->fetch_assoc();
                        $marka = $row_pojazd['marka'];
                        $model = $row_pojazd['model'];
                        $obrazek = $row_pojazd['obrazek'];
                    } else {
                        $marka = "Nieznana marka";
                        $model = "Nieznany model";
                        $obrazek = "brak-zdjecia.jpg";
                    }

                    $sql_uzytkownik = "SELECT login FROM uzytkownicy WHERE id = $idUzytkownika";
                    $result_uzytkownik = $conn->query($sql_uzytkownik);
                    
                    if ($result_uzytkownik->num_rows > 0) {
                        $row_uzytkownik = $result_uzytkownik->fetch_assoc();
                        $login_uzytkownika = $row_uzytkownik['login'];
                    } else {
                        $login_uzytkownika = "Nieznany użytkownik";
                    }

                    echo '<div class="rezerwacja">';
                    echo '<img src="flota/' . $obrazek . '" alt="' . $marka . ' ' . $model . '">';
                    echo '<h3>ID rezerwacji: ' . $idRezerwacji . '</h3>';
                    echo '<h3>Rezerwujący: ' . '<b>' . $login_uzytkownika . '</b>' .'</h3>';
                    echo '<p><b>Pojazd:</b> ' . $marka . ' ' . $model . '</p>';
                    echo '<p><b>Metoda rezerwacji:</b> ' . $metoda_rezerwacji . '</p>';
                    echo '<p><b>Data rezerwacji:</b> ' . $data_rezerwacji . '</p>';
                    echo '<p><b>Koniec rezerwacji:</b> ' . $koniec_rezerwacji . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p class="brak-rezerwacji">Brak rezerwacji.</p>';
            }
            $conn->close();
            ?>
        </div>
    </div>

</body>

</html>
