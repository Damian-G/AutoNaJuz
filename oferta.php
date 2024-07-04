<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
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
            transition: background-color 0.3s, color 0.3s, transform 0.3s, box-shadow 0.3s;
            letter-spacing: 2px;
            font-weight: 5px;
            font-size: 22px;
        }

        #blok_zakładki a:hover {
            background-color: #FE9000;
            color: #fff;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
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

        .wynajmij_na {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            padding: 20px;
        }

        .wynajmij_na div {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            flex: 1 1 40%;
            max-width: 35%;
            overflow: hidden;
            position: relative;
            text-align: center;
            transition: transform 0.3s ease;
            padding: 20px;
        }

        .wynajmij_na div:hover {
            transform: scale(1.03);
        }

        .wynajmij_na img {
            width: 100%;
            height: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
        }

        #nagłówek {
            font-size: 30px;
            margin: 10px 0;
            padding: 0 20px;
            letter-spacing: 2px;
        }


        @media (max-width: 768px) {
            .wynajmij_na div {
                flex: 1 1 100%;
                max-width: 100%;
            }
        }

        #wynajem {
            font-size: 22px;
            text-decoration: none;
            color: black;
            font-weight: bold;
            border-bottom: 3px solid black;
        }

        #wynajem:hover {
            background-color: #1B998B;
            padding: 10px 5px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="tłobmw">
        <div id="bezstopki">
            <div id="blok_zakładki">
                <a href="strona_główna.php">STRONA GŁÓWNA</a>
                <a href="oferta.php" style="background-color: rgb(255, 145, 0); color: #ffffff; font-size: 20px;">OFERTA</a>
                <a href="flota.php">FLOTA</a>
                <a href="faq.php">FAQ</a>
                <a href="kontakt.php">KONTAKT</a>
                <?php require("sprawdz_konto.php"); ?>
            </div>
            <div class="wynajmij_na">
                <div id="na_dni">
                    <img id="dni_zdj" src="img/dni.png" alt="zdjęcie podglądowe">
                    <p id="nagłówek">Wynajem na dzień</p>
                    <a id="wynajem" href="wynajem_dzien.php">CZYTAJ WIĘCEJ...</a>
                </div>
                <div id="na_miesiące">
                    <img id="miesiac_zdj" src="img/miesiace.png" alt="zdjęcie podglądowe">
                    <p id="nagłówek">Wynajem na miesiąc</p>
                    <a id="wynajem" href="wynajem_miesiac.php">CZYTAJ WIĘCEJ...</a>
                </div>
                <div id="na_kilometry">
                    <img id="km_zdj" src="img/km.png" alt="zdjęcie podglądowe">
                    <p id="nagłówek">Wynajem na kilometry</p>
                    <a id="wynajem" href="wynajem_kilometry.php">CZYTAJ WIĘCEJ...</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    require("stopka.php");
    ?>
    <script>
        window.addEventListener('load', function() {
            document.getElementById('tłobmw').classList.add('active');
        });
    </script>
</body>

</html>