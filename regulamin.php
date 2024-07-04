<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulamin</title>
    <link rel="stylesheet" href="style.css">
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

        .tresc_regulaminu {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            line-height: 1.6;
            margin: 20px auto;
        }

        .tresc_regulaminu h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .tresc_regulaminu h2 {
            color: #FE9000;
            border-bottom: 2px solid #FE9000;
            padding-bottom: 5px;
            margin-top: 20px;
        }

        .tresc_regulaminu p {
            color: #555;
            margin: 10px 0;
        }

        .tresc_regulaminu ul {
            padding-left: 20px;
            margin: 10px 0;
        }

        .tresc_regulaminu li {
            margin-bottom: 10px;
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
                <?php require("sprawdz_konto.php"); ?>
            </div>
            <div id="powrot">
            <a href="zarejestruj_sie.php">POWRÓT</a>
        </div>
            <div class="tresc_regulaminu">
                <h1>Regulamin Wypożyczalni Samochodów</h1>

                <h2>1. Postanowienia ogólne</h2>
                <p>Niniejszy regulamin określa zasady korzystania z usług wypożyczalni samochodów XYZ.</p>

                <h2>2. Warunki wynajmu</h2>
                <ul>
                    <li>Wynajmującym może być osoba, która ukończyła 21 lat i posiada ważne prawo jazdy od co najmniej 2 lat.</li>
                    <li>Wynajem samochodu odbywa się na podstawie umowy wynajmu.</li>
                </ul>

                <h2>3. Obowiązki Najemcy</h2>
                <ul>
                    <li>Najemca zobowiązuje się do zwrotu pojazdu w stanie niepogorszonym, w miejscu i terminie określonym w umowie.</li>
                    <li>Najemca ponosi pełną odpowiedzialność za wszelkie szkody powstałe z jego winy w okresie wynajmu.</li>
                </ul>

                <h2>4. Płatności</h2>
                <ul>
                    <li>Opłata za wynajem samochodu ustalana jest indywidualnie i zależy od modelu samochodu oraz okresu wynajmu.</li>
                    <li>Płatność za wynajem dokonywana jest z góry.</li>
                </ul>

                <h2>5. Polityka paliwowa</h2>
                <ul>
                    <li>Samochód wynajmowany jest z pełnym bakiem paliwa i powinien być zwrócony z pełnym bakiem paliwa.</li>
                    <li>W przypadku zwrotu samochodu z niepełnym bakiem paliwa, Najemca zostanie obciążony kosztami uzupełnienia paliwa.</li>
                </ul>

                <h2>6. Ubezpieczenie</h2>
                <ul>
                    <li>Wszystkie wynajmowane samochody są ubezpieczone zgodnie z obowiązującymi przepisami prawa.</li>
                    <li>Najemca może wykupić dodatkowe ubezpieczenie zmniejszające jego odpowiedzialność finansową w przypadku szkody.</li>
                </ul>

                <h2>7. Postanowienia końcowe</h2>
                <ul>
                    <li>Wypożyczalnia zastrzega sobie prawo do zmiany regulaminu. Zmiany wchodzą w życie z dniem ich publikacji na stronie internetowej.</li>
                    <li>W sprawach nieuregulowanych niniejszym regulaminem mają zastosowanie przepisy kodeksu cywilnego.</li>
                </ul>
            </div>
        </div>

        <?php
        require("stopka.php");
        ?>
    </div>
</body>

</html>
