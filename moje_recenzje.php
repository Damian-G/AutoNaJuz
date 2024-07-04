<?php
session_start();
require("db.php");

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$login = $_SESSION['login'];

$sql = "SELECT recenzje.idAuta, recenzje.tresc, recenzje.data, flota.marka, flota.model 
        FROM recenzje 
        INNER JOIN flota ON recenzje.idAuta = flota.id 
        WHERE recenzje.login = '$login'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje opinie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        #tłobmw {
            background-image: url("bmw.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            width: auto;
            min-height: 100vh;
        }

        .moje_opinie {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .opinia {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .opinia p {
            margin: 5px 0;
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
        <div id="powrot">
            <a href="uzytkownik.php">POWRÓT</a>
        </div>
        <div class="moje_opinie">
            <h2>Moje opinie</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="opinia">';
                    echo '<p><b>Zrecenzowane auto:</b> ' . $row['marka'] . ' ' . $row['model'] . '</p>';
                    echo '<p><b>Treść opinii:</b> ' . $row['tresc'] . '</p>';
                    echo '<p><b>Data dodania:</b> ' . $row['data'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Brak opinii do wyświetlenia.</p>';
            }
            ?>
        </div>
    </div>
    <script>
        window.onload = function() {
            <?php
            if (isset($_SESSION['message_opinia'])) {
                echo "setTimeout(function() { alert('" . $_SESSION['message_opinia'] . "'); }, 100);";
                unset($_SESSION['message_opinia']);
            }
            ?>
        }
    </script>
</body>

</html>

<?php
$conn->close();
?>