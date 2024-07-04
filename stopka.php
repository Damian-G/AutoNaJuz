<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .infowstopce {
            display: flex;
            justify-content: center;
            gap: 40px;
        }

        .infowstopce img {
            width: 30px;
            height: 30px;
        }

        #stopka {
            background-color: #222;
            color: #fff;
            padding: 20px;
            text-align: center;
            background-image: url("stopka/grafika.png");
            border-top: 1px solid white;
        }

        .autor img {
            width: 200px;
            height: auto;
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.227));
        }

        #copyright_paragraf {
            margin-top: 10px;
            font-family: cursive;
            background-color: #171717;
            letter-spacing: 5px;
        }

        #dane_firmy p {
            display: flex;
            align-items: center;
            font-family: cursive;
            font-weight: bold;
            font-size: 20px;
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.267);
        }

        #ikonka {
            margin-right: 10px;
            filter: invert(100%) drop-shadow(0 0 5px rgb(255, 255, 255));
        }

        #stopka p {
            font-size: 22px;
        }
    </style>
</head>

<body>
    <div id="stopka">
        <div class="infowstopce">
            <div id="dane_firmy">
                <p><img id="ikonka" src="stopka/lokalizacja.png" alt="lokalizacja">ODDZIAŁ SIEMIATYCZE<br>UL. HALOALO 12
                </p>
                <p><img id="ikonka" src="stopka/telefon.png" alt="Telefon">747 495 030</p>
                <p><img id="ikonka" src="stopka/poczta.png" alt="Poczta">autonajuz@wp.pl</p>
                <p><img id="ikonka" src="stopka/kciuk.png" alt="Godziny otwarcia">7 dni w tygodniu 24/h na dobę</p>
            </div>
            <div id="mapka">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2433.7429399587654!2d22.86796867702486!3d52.41133494426851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4721d0e5b04e850d%3A0xe934892a81b741bf!2s11%20Listopada%2C%2017-300%20Siemiatycze!5e0!3m2!1spl!2spl!4v1713990817727!5m2!1spl!2spl" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="autor">
                <img src="stopka/madeby.png" alt="Wykonane przez Damian">
            </div>
        </div>
        <hr>
        <p id="copyright_paragraf">&copy; Copyright (c) AutoNaJuz.pl. All rights reserved.</p>
    </div>
</body>

</html>