<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem na Dzień</title>
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
            width: 80%;
            margin: 30px auto;
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
                <h1>Wynajem na dzień</h1>
                <h2>Oferujemy Ci możliwość wynajmu samochodu na dni</h2>
                <p>Idealną opcję dla osób poszukujących elastyczności i komfortu podczas podróży. Czy to krótki wyjazd biznesowy, weekendowy wypad z rodziną czy spontaniczna podróż z przyjaciółmi, nasza oferta wynajmu na dni dostosowana jest do Twoich potrzeb.</p>

                <h2>Dlaczego warto skorzystać z wynajmu krótkoterminowego?</h2>
                <ul>
                    <li><strong>Elastyczność:</strong> Niezależnie od tego, czy potrzebujesz samochodu na kilka dni czy kilka tygodni, nasza flota pojazdów jest gotowa do spełnienia Twoich oczekiwań. Możesz wybierać spośród różnych modeli samochodów, aby dopasować pojazd do charakteru Twojej podróży.</li>
                    <li><strong>Wygoda:</strong> Wypożyczenie samochodu na krótki okres eliminuje konieczność dostosowania się do rozkładów transportu publicznego czy organizowania transportu bagażu na dworzec czy lotnisko. Wsiadasz do wybranego auta i jesteś gotowy do drogi, kiedy tylko tego potrzebujesz.</li>
                    <li><strong>Prostota rezerwacji:</strong> Proces rezerwacji jest szybki i intuicyjny. Możesz dokonać rezerwacji online, wybierając miejsce odbioru oraz daty rozpoczęcia i zakończenia wynajmu. Nasz system umożliwia filtrowanie wyników wyszukiwania według Twoich preferencji, co pozwala znaleźć idealny samochód dostosowany do Twoich potrzeb.</li>
                    <li><strong>Obsługa klienta:</strong> Nasz zespół konsultantów jest gotowy, aby pomóc Ci w każdym etapie wynajmu. Możesz skontaktować się z nami telefonicznie, aby uzyskać dodatkowe informacje, poradę dotyczącą wyboru pojazdu lub zmienić szczegóły Twojej rezerwacji.</li>
                </ul>

                <h2>Jak przebiega wynajem na dni w naszej wypożyczalni?</h2>
                <p>Po dokonaniu rezerwacji online lub telefonicznie, przygotujemy wybrany przez Ciebie samochód na umówiony dzień i miejsce. Po podpisaniu umowy wynajmu i dokonaniu niezbędnych formalności, możesz wyruszyć w podróż, ciesząc się komfortem i niezależnością, jaką zapewnia wynajem krótkoterminowy.</p>

                <h2>Dodatkowe opcje i usługi:</h2>
                <p>Oferujemy różnorodne opcje dodatkowe, takie jak ubezpieczenia, dodatkowe wyposażenie czy programy lojalnościowe, które mogą zwiększyć komfort Twojej podróży. Naszym celem jest zapewnienie Ci pełnej satysfakcji i bezpieczeństwa podczas korzystania z naszych usług.</p>

                <h2>Podsumowanie:</h2>
                <p>Wynajem samochodu na dni to doskonałe rozwiązanie dla wszystkich, którzy cenią swobodę podróżowania i chcą uniknąć ograniczeń wynikających z korzystania z transportu publicznego. Zapraszamy do skorzystania z naszej oferty i dołączenia do grona zadowolonych klientów, którzy odkryli zalety wynajmu krótkoterminowego w naszej wypożyczalni. Gotowi na drogę? Wynajmij samochód już dziś!</p>
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