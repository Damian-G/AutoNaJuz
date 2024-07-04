<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: logowanie.php");
    exit();
}
require ('db.php');
$idAuta = htmlspecialchars($_POST['idAuta']);


$sql = "SELECT * FROM flota WHERE id = $idAuta";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezerwacja</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .formularz {
            max-width: 80%;
            margin:15px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
        }

        input[type="text"],
        input[type="datetime-local"],
        select {
            display: block;
            width: 90%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px auto;
            font-size:18px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #FE9000;
            border: none;
            border-radius: 4px;
            color: black;
            font-size: 22px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #e07b00;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #FE9000;
            text-decoration: none;
            transition: color 0.3s;
            font-size:22px;
        }

        a:hover {
            color: #e07b00;
        }


        #tłobmw {
    background-image: url("bmw.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    width: auto;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

        #bezstopki {
            min-height: 100vh;
        }

        .oferta {
            background-color: #f5f5f5;
            width: 90%;
            min-height: 200px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .oferta .zawartoscr {
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
        }

        .tytul-oferty {
            font-size: 24px;
            margin-bottom: 10px;
            color: #FE9000;
        }

        .kolumny {
            display: flex;
            gap: 20px;
        }

        .kolumna p {
            color: #555;
            margin-bottom: 5px;
        }

        .rezerwacje {
            width: 100%;
            background-color: #f5f5f5;
            border-top: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .rezerwacje h1 {
            font-size: 22px;
            letter-spacing: 10px;
        }
        .rezerwacje_lista {
            list-style-type: none;
            margin:0;
        }
        .rezerwacje_lista li {
            margin:5px;
        }

        label {
            text-align: center;
            font-weight: bold;
            font-size:18px;
        }

        .formularz h2 {
            margin:0;
        }
    </style>
</head>

<body>
    <div id="tłobmw">
        <div id="bezstopki">
            <div class="formularz">
                <h2>Zaledwie chwila dzieli Cię od sprawdzenia tego wspaniałego pojazdu!<br>Stań się częścią tej wyjątkowej przygody klikając "ZAREZERWUJ"!</h2>
                <div class="oferta">
                    <?php
                    $conn = new mysqli("localhost", "root", "", "wypozyczalniaautdb");

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
                            $rok = $row['rok'];
                            $stawka_dzienna = $row['stawka_dzienna'];
                            $stawka_miesieczna = $row['stawka_miesieczna'];
                            $stawka_kilometrowa = $row['stawka_kilometrowa'];
                            $obrazek = $row['obrazek'];
                            $opis = $row['opis'];
                            echo "<div class='oferta'>";
                            echo "<div class='zawartoscr'>";
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
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='rezerwacje'>";
                            echo "<h1>TERMINY REZERWACJI</h1>";
                            $idAuta = $row['id'];
                            $sql_rezerwacje = "SELECT * FROM rezerwacje WHERE idAuta = $idAuta";
                            $result_rezerwacje = $conn->query($sql_rezerwacje);

                            if ($result_rezerwacje->num_rows > 0) {
                                echo "<ul class='rezerwacje_lista'>";
                                while ($row_rezerwacja = $result_rezerwacje->fetch_assoc()) {
                                    $data_rezerwacji = $row_rezerwacja['data_rezerwacji'];
                                    $koniec_rezerwacji = $row_rezerwacja['koniec_rezerwacji'];
                                    echo "<li>Data rezerwacji: od <i>$data_rezerwacji</i> do <i>$koniec_rezerwacji</i></li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "<p>Aktualnie brak rezerwacji dla tego auta.</p>";
                            }
                            echo "</div>";
                        }
                    } else {
                        echo "Brak dostępnych ofert.";
                    }
                    $conn->close();
                    ?>
                </div>
                <form method="post" action="dodaj_rezerwacje.php">
                    <input type="hidden" name="idAuta" value="<?php echo $idAuta; ?>">
                    <input type="hidden" name="idUser" value="<?php echo $_SESSION['id']; ?>">
                    <label for="metoda_rezerwacji">Wybierz metodę rezerwacji:</label>
                    <select name="metoda_rezerwacji" id="metoda_rezerwacji" required>
                        <option value="dzień">Na dzień</option>
                        <option value="miesiąc">Na miesiąc</option>
                        <option value="kilometry">Na kilometry</option>
                    </select>
                    <label for="data_rezerwacji">Wybierz datę i godzinę rezerwacji:</label>
                    <input type="datetime-local" id="data_rezerwacji" name="data_rezerwacji" required>
                    <input type="submit" name="rezerwuj" value="DOKONAJ REZERWACJI">
                </form>
            </div>
            <a id="powrot" href="flota.php">Powrót do ofert</a>
        </div>
    </div>
</body>
</html>