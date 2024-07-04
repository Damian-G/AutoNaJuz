<?php
session_start();
require("db.php");

$sql = "SELECT f.marka, f.model, f.obrazek, COUNT(r.idAuta) as ilosc_wypozyczen
        FROM rezerwacje r
        JOIN flota f ON r.idAuta = f.id
        GROUP BY r.idAuta
        ORDER BY ilosc_wypozyczen DESC
        LIMIT 3";
$result = $conn->query($sql);

$top_auta = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $top_auta[] = $row;
    }
} else {
    echo "0 wyników";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Strona Główna</title>
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
            width: 100%;
            min-height: 100vh;
        }


        #blok_logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }

        #logo2 {
            width: 230px;
            height: auto;
            padding: -55px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
            border-radius: 150px;
        }

        #pod_logo h2 {
            color: #c4c4c4;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
            letter-spacing: 5px;
            font-size: 40px;
        }

        #pod_logo {
            justify-content: center;
            align-items: center;
            text-align: center;
            z-index: 1;
            margin-bottom: -30px;
        }

        #pod_logo a {
            display: inline-block;
            padding: 15px 30px;
            background-color: #cfac00;
            color: black;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            transform: skew(-20deg);
        }

        #pod_logo a:hover {
            background-color: #ffdd00;
            color: black;
        }

        b {
            font-weight: bold;
            color: red;
            font-size: 20px;
        }

        #tresc h3 {
            font-size: 35px;
            color: white;
            letter-spacing: 10px;
            border-top: 2px dotted #FE9000;
            border-bottom: 2px dotted #FE9000;
            width: 100%;
            padding: 10px;
            margin-top:20%;
            text-align: center;
        }

        #tresc p {
            color: white;
            font-size: 22px;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        h2 {
            font-size: 35px;
            color: #FE9000;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #tresc {
            width: 70%;
            margin:25vh auto auto auto;
            padding: 10px;
        }


#slajdy {
    width: 60%;
    margin: 20px auto;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.6);
    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    overflow: hidden; 
}



.slajd {
    display: none;
    text-align: center;
    padding: 20px;
    color: white;
}

.slajd.fade {
    animation: fade 1s ease-in-out;
}

.slajd img {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
    border-radius: 5px;
}

@keyframes fade {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.kropka {
    display: inline-block;
    height: 10px;
    width: 10px;
    margin: 0 5px;
    background-color: #bbb;
    border-radius: 50%;
    cursor: pointer;
}

.kropka.active {
    background-color: #717171;
}

.slajd h2 {
    font-size: 28px;
    color: #FE9000;
    margin-bottom: 10px;
}

.slajd p {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.slajd.fade img {
    max-width: 80%;
}

#top {
    width:400px;
    height:auto;
}

#slajdy_top_auta {
            width: 60%;
            margin: auto;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .slajdy_wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slajd_top_auta {
            min-width: 100%;
            box-sizing: border-box;
            text-align: center;
            padding: 20px;
            color: white;
        }

        .slajd_top_auta img {
            max-width: 60%;
            height: auto;
            border-radius: 5px;
        }

        .strzalka {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: 30px;
            height: 30px;
            background-color: #FE9000;
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: translateY(-50%);
            z-index: 10;
        }

        .strzalka.lewa {
            left: 10px;
        }

        .strzalka.prawa {
            right: 10px;
        }

        .slajd_top_auta h4 {
            font-size: 28px;
            color: #FE9000;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div id="tłobmw">
        <div class="bezstopki">
            <div id="blok_zakładki">
                <a href="strona_główna.php" style="background-color: #FE9000; color: #fff; font-size: 20px;">STRONA
                    GŁÓWNA</a>
                <a href="oferta.php">OFERTA</a>
                <a href="flota.php">FLOTA</a>
                <a href="faq.php">FAQ</a>
                <a href="kontakt.php">KONTAKT</a>
                <?php require ("sprawdz_konto.php");?>
            </div>
            <div id="blok_logo">
                <img id="logo2" src="img/logo2.png" alt="logo firmy"><br>
            </div>
            <div id="pod_logo">
                <h2>Elegancja na Kołach</h2>
                <a href="flota.php">FLOTA POJAZDÓW</a>
            </div>
        
        <div id="tresc">
            <h3 id="wypozyczalniah3">WYPOŻYCZALNIA SAMOCHODÓW</h3>
            <h2>Wypożyczalnia aut AutoNaJuz</h2>
            <p>AutoNaJuz to sprawdzony partner w dziedzinie wynajmu samochodów, który sprosta Twoim oczekiwaniom,
                niezależnie od celu podróży. Czy planujesz wyjazd poza swoje miejsce zamieszkania, czy może szukasz
                niezawodnego pojazdu na długą trasę? A może po prostu chcesz przetestować konkretny model, zanim
                podejmiesz
                decyzję o zakupie? Nasza firma oferuje usługi najwyższej jakości, spełniając wszystkie te potrzeby i
                więcej.</p>

            <p>AutoNaJuz to renomowana firma świadcząca usługi wynajmu różnego rodzaju pojazdów. Serdecznie
                zapraszamy
                do
                zapoznania się z naszą bogatą flotą pojazdów. Jesteśmy przekonani, że znajdziesz u nas rozwiązanie
                idealnie
                dopasowane do Twoich potrzeb. Działamy na terenie całego kraju, a nasze liczne oddziały gwarantują
                nie
                tylko
                szeroki wybór, ale także atrakcyjne ceny. Dlatego wynajem samochodu w AutoNaJuz to gwarancja
                satysfakcji
                i komfortu
                podczas podróży!</p>

            <h2>Nasza oferta</h2>
            <p>AutoNaJuz to nie tylko renomowane usługi wynajmu różnych pojazdów, ale także gwarancja doskonałej
                jakości
                i
                szerokiej gamy możliwości. Zachęcamy do zapoznania się z naszą bogatą flotą, która zaspokoi nawet
                najbardziej
                wymagające oczekiwania. Działamy na terenie całego kraju, aby zapewnić Ci wygodę i dostępność,
                gdziekolwiek
                się znajdujesz.</p>

            <h2>Dla każdego!</h2>
            <p>Nasza oferta skierowana jest zarówno do klientów indywidualnych, jak i przedsiębiorstw. Niezależnie
                od tego, czy potrzebujesz auta na krótką czy długą trasę, czy też szukasz rozwiązania dla swojej
                firmy
                - w AutoNaJuz znajdziesz to, czego potrzebujesz. Obsługujemy zarówno turystów, jak i klientów
                biznesowych,
                zapewniając kompleksową i profesjonalną obsługę.</p>

            <h2>Bezpieczeństwo i wygoda</h2>
            <p>Wypożyczając samochód w AutoNaJuz, możesz być pewien nie tylko wysokiej jakości usług, ale także
                bezpieczeństwa i wygody. Nasza flota jest regularnie serwisowana i poddawana kontroli, aby zapewnić
                Ci
                spokojną podróż. Dodatkowo, nasze atrakcyjne ceny i elastyczne warunki wynajmu sprawią, że
                korzystanie z
                naszych usług będzie czystą przyjemnością.</p>

            <h2>Wynajem online</h2>
            <p>Chcemy, aby korzystanie z naszych usług było jak najbardziej wygodne i bezproblemowe. Dlatego
                oferujemy
                możliwość rezerwacji samochodu online, dzięki czemu oszczędzasz czas i unikasz stresu związanego z
                kolejkami i formalnościami. Wystarczy kilka kliknięć, aby zarezerwować swój samochód na naszej
                stronie
                internetowej - szybko, łatwo i wygodnie!</p>

            <h2>Skontaktuj się z nami</h2>
            <p>Jeśli masz jakiekolwiek pytania lub potrzebujesz dodatkowych informacji, skontaktuj się z naszym
                biurem
                obsługi klienta. Nasz profesjonalny zespół chętnie pomoże Ci w każdej sprawie i upewni się, że Twój
                wynajem samochodu przebiegnie bezproblemowo i zgodnie z oczekiwaniami. Zaufaj AutoNaJuz i ciesz się
                bezpieczną i komfortową podróżą! Szczegóły w zakładce KONTAKT</p>


                
               
        </div>
        <div id="slajdy">
                <div class="slajd fade">
                    <h2>Odkryj nasze nowe modele: Audi, BMW, Toyota, Mercedes i Porsche!</h2>
                    <p>Przekonaj się o wyjątkowym komforcie i niezawodności naszej floty. Rezerwuj teraz i zacznij swoją podróż marzeń!</p>
                    <img src="img/top.png">
                </div>

                <div class="slajd fade">
                    <h2>Przyjemna podróż z AutoNaJuz</h2>
                    <p>Zapewniamy kompleksową dezynfekcję i czyszczenie samochodów przed każdym wynajmem. Dbamy o komfort naszych klientów!</p>
                    <img src="img/detailing.png">
                </div>

                <div style="text-align:center">
                    <span class="kropka" onclick="wybierzSlajd(2)"></span>
                    <span class="kropka" onclick="wybierzSlajd(1)"></span>

                </div>
                
            </div>
            
                <div id="slajdy_top_auta">
                <h2 style="text-align:center;">Top 3 Najczęściej Wypożyczane Auta</h2>
                    <button class="strzalka lewa" onclick="zmienSlajd(-1)">&#10094;</button>
                    <div class="slajdy_wrapper">
                        <?php foreach($top_auta as $auto): ?>
                            <div class="slajd_top_auta">
                                <h4><?php echo $auto['marka'] . ' ' . $auto['model']; ?></h4>
                                <p>Ilość wypożyczeń: <?php echo $auto['ilosc_wypozyczen']; ?></p>
                                <img src="flota/<?php echo $auto['obrazek']; ?>" alt="<?php echo $auto['marka'] . ' ' . $auto['model']; ?>">

                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="strzalka prawa" onclick="zmienSlajd(1)">&#10095;</button>
                </div>
            </div>
        <?php
        require("stopka.php");
        ?>
</div>
<script src="js/zmien_slajd.js"></script>
<script src="js/slajdy.js"></script>
</body>

</html>