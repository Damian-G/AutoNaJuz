<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem na Miesiąc</title>
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



        .blok_główny img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .tekst-reklamowy {
            width:80%;
            margin:30px auto;
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .tekst-reklamowy h1 {
            font-size: 32px;
            color: #294936;
        }

        .tekst-reklamowy h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #1B998B;
        }

        .tekst-reklamowy ul {
            padding-left: 20px;
            margin-bottom: 15px;
        }

        .tekst-reklamowy li {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .tekst-reklamowy strong {
            color: #1B998B;
        }

        .tekst-reklamowy {
    opacity: 0;
    transition: opacity 0.5s;
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


                <div class="tekst-reklamowy">
                <h1>Wynajem na miesiąc</h1>
                <h2>Oferujemy również możliwość wynajmu samochodów na miesiąc</h2>
                <p>Idealną opcję dla osób potrzebujących długoterminowej mobilności bez konieczności posiadania własnego pojazdu. Niezależnie od tego, czy potrzebujesz samochodu na dłuższy wyjazd służbowy, miesięczne podróże po kraju czy okresowe wyjazdy rodzinne, nasza oferta wynajmu na miesiąc jest dostosowana do Twoich potrzeb i preferencji.</p>

                <h2>Dlaczego warto skorzystać z wynajmu na miesiąc?</h2>
                <ul>
                    <li><strong>Elastyczność i wygoda:</strong> Długoterminowy wynajem samochodu eliminuje konieczność regularnego korzystania z transportu publicznego czy zależność od osób trzecich. Posiadanie wynajętego pojazdu zapewnia Ci pełną niezależność i komfort podróżowania w dowolnym momencie i miejscu.</li>
                    <li><strong>Oszczędność czasu i pieniędzy:</strong> Stały dostęp do samochodu na miesiąc pozwala zaoszczędzić czas na organizację codziennych podróży, a także unikać dodatkowych kosztów związanych z utrzymaniem własnego pojazdu, takich jak naprawy czy ubezpieczenia.</li>
                    <li><strong>Zróżnicowana oferta pojazdów:</strong> Nasza bogata flota samochodów pozwala wybrać pojazd odpowiadający Twoim potrzebom, niezależnie od tego, czy preferujesz kompaktowe auto miejskie, rodzinny van czy elegancki sedan. Oferujemy również możliwość wymiany pojazdu w trakcie wynajmu, dostosowując ofertę do zmieniających się potrzeb.</li>
                    <li><strong>Proces rezerwacji i obsługa klienta:</strong> Rezerwacja wynajmu na miesiąc odbywa się szybko i bezproblemowo. Możesz dokonać rezerwacji online lub skontaktować się z naszym zespołem obsługi klienta, który pomoże Ci wybrać idealny pojazd oraz odpowiedzieć na wszystkie pytania dotyczące warunków wynajmu, ubezpieczeń i dodatkowych usług.</li>
                </ul>

                <h2>Jak przebiega wynajem na miesiąc w naszej wypożyczalni?</h2>
                <p>Po podpisaniu umowy wynajmu, która uwzględnia szczegółowe warunki i koszty, możesz odebrać wybrany pojazd w dogodnym dla Ciebie miejscu. Nasze samochody są regularnie serwisowane i utrzymywane w doskonałym stanie, zapewniając bezpieczeństwo i komfort podczas długoterminowego użytkowania.</p>

                <h2>Dodatkowe opcje i usługi:</h2>
                <p>Oferujemy szereg opcji dodatkowych, takich jak ubezpieczenia rozszerzone, dodatkowe wyposażenie czy programy lojalnościowe, które mogą zwiększyć komfort Twojej podróży na dłuższy okres.</p>

                <h2>Podsumowanie:</h2>
                <p>Wynajem samochodu na miesiąc to idealne rozwiązanie dla osób, które potrzebują długoterminowego rozwiązania transportowego bez zobowiązań związanych z posiadaniem własnego pojazdu. Zapraszamy do skorzystania z naszej elastycznej oferty i dołączenia do grona zadowolonych klientów, którzy doceniają wygodę i niezależność wynikającą z wynajmu na dłuższy okres. Gotowi na długoterminową mobilność? Skontaktuj się z nami już dziś i zarezerwuj swoje idealne auto na miesiąc!</p>
            </div>


            
        </div>
    
    <?php
    require("stopka.php");
    ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/ładowanie_nagłówków.js"></script>
</body>

</html>
