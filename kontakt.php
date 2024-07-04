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

        p {
            color: white;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .blok_glowny {
            color: white;
            display: flex;
            justify-content: center;
            width: 72%;
            margin: auto;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);

        }

        #logo2 {
            height: 200px;
            width: auto;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
            border-radius: 100px;
        }

        #maile_telefony {
            color: #FE9000;
        }

        h1 {
            position: relative;
            padding-top: 15px;
            color: #ffffff;
            border-top: 2px solid #FE9000;
        }

        #glowny1,
        #glowny2,
        #glowny3 {
            margin: 20px;
            width: 34%;
            font-size: 22px;
        }

        #glowny3 {
            text-align: right;
        }

        #glowny2 {
            text-align: center;
        }

        #bezstopki {
            min-height: 100vh;
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
                <a href="kontakt.php" style="background-color: rgb(255, 145, 0); color: #ffffff; font-size: 20px;">KONTAKT</a>
                <?php require("sprawdz_konto.php"); ?>
            </div>
            <div class="blok_glowny">
                <div id="glowny1">
                    <h1>Chcesz zarezerwować samochód przez telefon?</h1>
                    <p><b>Infolinia 24h/7</b><br><a id="maile_telefony" href="tel:(+48) 755 665 343">(+48) 755 665
                            343</a></p>
                    <p>Nasze biuro obsługi klienta jest dostępne 7 dni w tygodniu, 365 dni w roku.</p>
                    <p>Zapraszamy do kontaktu o każdej porze dnia i nocy. Nasz zespół jest gotowy, aby pomóc Ci z
                        rezerwacją samochodu, odpowiadając na wszelkie pytania i rozwiewając wszelkie wątpliwości.</p>
                    <p><a id="maile_telefony" href="mailto:zapytanie@autonajuz.pl">zapytanie@autonajuz.pl</a></p>
                    <p>Dbamy o prywatność naszych klientów. Twoje dane są bezpieczne, używane wyłącznie do celów
                        związanych z obsługą, rezerwacją samochodów.</p>
                </div>
                <div id="glowny2">
                    <h1>Dane rejestracyjne firmy</h1>
                    <img id="logo2" src="img/logo2.png">
                    <h2>AutoNaJuz Sp. z o.o.</h2>
                    <p>ul. HALOALO 12,<br>17-300 Siemiatycze</p>
                    <p><b>NIP:</b> 111 222 33 44<br><b>REGON:</b> 123456789<br><b>KRS:</b> 0000556677</p>
                </div>
                <div id="glowny3">
                    <h1>Dane kontaktowe</h1>
                    <p><b>Telefon kontaktowy</b><br><a id="maile_telefony" href="tel:(+48) 85 111 22 33">(+48) 85 111 22
                            33</a></p>
                    <p><b>Telefon kontaktowy</b><br><a id="maile_telefony" href="tel:(+48) 755 665 343">(+48) 755 665
                            343</a></p>
                    <p><b>Obsługa rezerwacji:</b><br><a id="maile_telefony" href="mailto:obsluga@autonajuz.pl">obsluga@autonajuz.pl</a></p>
                    <p><b>Biuro obsługi Klienta:</b><br><a id="maile_telefony" href="mailto:biuro@autonajuz.pl">biuro@autonajuz.pl</a></p>
                    <p><b>Dział marketingu:</b><br><a id="maile_telefony" href="mailto:rezerwacje@autonajuz.pl">marketing@autonajuz.pl</a></p>
                    <p><b>Dział księgowości:</b><br><a id="maile_telefony" href="mailto:ksiegowosc@autonajuz.pl">ksiegowosc@autonajuz.pl</a></p>
                    <p><b>Dział IT:</b><br><a id="maile_telefony" href="mailto:admin@autonajuz.pl">admin@autonajuz.pl</a></p>
                    <p><b>Reklamacje:</b><br><a id="maile_telefony" href="mailto:reklamacje@autonajuz.pl">reklamacje@autonajuz.pl</a></p>
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