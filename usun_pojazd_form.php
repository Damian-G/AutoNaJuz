<?php
session_start();
require("db.php");

if (!isset($_SESSION["login"])) {
    header("Location: logowanie.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto użytkownika</title>
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

        .blok_pojazdu {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .pojazd {
            background-color: rgba(30, 30, 30, 0.9);
            color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
            padding: 20px;
            margin: 20px;
            width: calc(33% - 40px);
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
            position: relative;
        }
        .pojazd img {
            max-width: 100%;
            border-radius: 10px;
        }
        .pojazd h3 {
            margin: 10px 0;
            font-size: 24px;
        }
        .pojazd p {
            font-size: 18px;
            margin: 10px 0;
        }
        .pojazd form {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
        .pojazd button {
            background-color: #FE9000;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .pojazd button:hover {
            background-color: #e07a00;
        }

        #powrot a {
            font-size:22px;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            letter-spacing: 2px;
            margin:20px;
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
        <div id="powrot">
            <a href="admin.php">POWRÓT DO ZARZĄDZANIA</a>
        </div>
            <div class="blok_pojazdu">
                <?php
                $sql = "SELECT id, marka, model, rok, obrazek FROM flota";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="pojazd">';
                        echo '<img src="flota/'. $row['obrazek'] . '" alt="Obrazek pojazdu">';
                        echo '<h3>' . $row['marka'] . ' ' . $row['model'] . '</h3>';
                        echo '<p>Rok: ' . $row['rok'] . '</p>';
                        echo '<form method="post" action="usun_pojazd.php">';
                        echo '<input type="hidden" name="idPojazdu" value="' . $row['id'] . '">';
                        echo '<button type="submit">Usuń pojazd</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Brak pojazdów w bazie danych.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            <?php
            if (isset($_SESSION['message'])) {
                echo "setTimeout(function() { alert('" . $_SESSION['message'] . "'); }, 100);";
                unset($_SESSION['message']);
            }
            ?>
        }
    </script>
</body>
</html>
