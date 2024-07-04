<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pytania</title>
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
            width: auto;
            min-height: 100vh;
        }

        .accordion {
            border: none;
            background-color: transparent;
            color: #ffffff;
            cursor: pointer;
            padding: 15px;
            text-align: left;
            outline: none;
            font-size: 22px;
            transition: 0.4s;
            font-weight: bold;
            border-bottom: 3px solid #864700;
            position: relative;
            display: block;
            width: 100%;
            margin-top: 10px;
        }

        .accordion::after {
            content: '+';
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 24px;
            transition: transform 0.3s;
        }

        .accordion:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
        }

        .active::after {
            content: '~~';
            transform: translateY(-50%) rotate(45deg);
        }

        .panel {
            padding: 0 15px;
            display: none;
            overflow: hidden;
            font-size: 24px;
            color: #ffffff;
            text-align: center;
            border-bottom: 3px solid #864700;
            background: rgba(86, 135, 109, 0.9);
            font-family: Arial, Helvetica, sans-serif;
        }

        .blok_pytan {
            padding: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pytania {
            width: 72%;
            padding: 20px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #37604a;
            text-align: center;
            font-size: 35px;
            font-style: italic;
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(86, 135, 109, 0.9);
            letter-spacing: 5px;
        }

        h4 {
            text-align: center;
            color: #8DB38B;
            font-size: 22px;
            text-shadow: 0 0 10px rgba(141, 179, 139, 0.7);
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
                <a href="faq.html" style="background-color: #FE9000; color: #fff; font-size: 20px;">FAQ</a>
                <a href="kontakt.php">KONTAKT</a>
                <?php require("sprawdz_konto.php"); ?>
            </div>
            <div class="blok_pytan">
                <div class="pytania">
                    <div class="header">
                        <h2>Znajdź odpowiedź na Twoje pytanie:</h2>
                    </div>

                    <button class="accordion">Jakie dokumenty są potrzebne do wynajęcia samochodu?</button>
                    <div class="panel">
                        <p>Wymagane dokumenty obejmują ważne prawo jazdy, dowód osobisty lub paszport oraz kartę
                            kredytową na potrzeby depozytu.</p>
                    </div>

                    <button class="accordion">Jakie są opcje ubezpieczenia?</button>
                    <div class="panel">
                        <p>Oferujemy różne opcje ubezpieczenia, w tym podstawowe ubezpieczenie odpowiedzialności
                            cywilnej, ubezpieczenie od kradzieży oraz ubezpieczenie od szkód. Prosimy o kontakt w celu
                            uzyskania pełnej gamy ofert ubezpieczeniowych.</p>
                    </div>

                    <button class="accordion">Jak mogę zarezerwować samochód?</button>
                    <div class="panel">
                        <p>Możesz zarezerwować samochód online poprzez naszą stronę internetową lub skontaktować się z
                            naszym biurem obsługi klienta telefonicznie.</p>
                    </div>

                    <button class="accordion">Czy istnieją ograniczenia dotyczące przejechanego dystansu?</button>
                    <div class="panel">
                        <p>Zazwyczaj oferujemy ograniczoną liczbę kilometrów w ramach umowy wynajmu. Prosimy o
                            sprawdzenie warunków umowy wypożyczenia.</p>
                    </div>

                    <button class="accordion">Czy mogę zwrócić samochód w innym miejscu niż miejsce wynajmu?</button>
                    <div class="panel">
                        <p>Tak, oferujemy usługę zwrotu samochodu w innym miejscu, jednak może obowiązywać dodatkowa
                            opłata za usługę "one-way".</p>
                    </div>

                    <button class="accordion">Czy mogę wynająć dodatkowe wyposażenie, takie jak fotelik dziecięcy lub
                        nawigacja GPS?</button>
                    <div class="panel">
                        <p>Tak, oferujemy różne dodatki i akcesoria wypożyczalnicze. Prosimy o kontakt w celu uzyskania
                            pełnej listy dostępnych opcji i opłat.</p>
                    </div>

                    <button class="accordion">Czy istnieją dodatkowe opłaty, których powinienem się spodziewać?</button>
                    <div class="panel">
                        <p>Oprócz opłaty za wynajem samochodu, mogą wystąpić dodatkowe opłaty, takie jak opłata za
                            paliwo, opłata za dodatkowego kierowcę, opłata za opóźnione zwroty itp. Prosimy o zapoznanie
                            się z warunkami umowy wypożyczenia.</p>
                    </div>

                    <button class="accordion">Co powinienem zrobić w przypadku awarii lub wypadku?</button>
                    <div class="panel">
                        <p>W przypadku awarii lub wypadku prosimy o niezwłoczne skontaktowanie się z naszym biurem
                            obsługi klienta, a także z odpowiednimi służbami ratunkowymi, jeśli jest to konieczne.
                            Udostępnimy Ci niezbędne wsparcie i instrukcje postępowania.</p>
                    </div>

                    <button class="accordion">Czy istnieje możliwość anulowania rezerwacji?</button>
                    <div class="panel">
                        <p>Tak, możesz anulować rezerwację, ale mogą obowiązywać opłaty anulacyjne, zwłaszcza jeśli
                            anulacja następuje blisko daty wynajmu. Prosimy o zapoznanie się z naszymi warunkami
                            anulacji.</p>
                    </div>

                    <h4>Jeśli masz inne pytania lub potrzebujesz dodatkowych informacji, prosimy o kontakt z naszym
                        biurem obsługi klienta. Chętnie Ci pomożemy!</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    require("stopka.php");
    ?>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                    this.style.fontSize = "22px";
                } else {
                    panel.style.display = "block";
                    this.style.fontSize = "26px";
                }
            });
        }
    </script>
</body>

</html>