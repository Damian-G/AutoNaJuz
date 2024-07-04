<?php
if (isset($_SESSION["rola"])) {
                    if ($_SESSION["rola"] == "admin") {
                        echo '<a href="admin.php">ZARZĄDZANIE</a>';
                    } else {
                        echo '<a href="uzytkownik.php">MOJE KONTO</a>';
                    }
                    echo '<a href="logout.php">WYLOGUJ</a>';
                } else {
                    echo '<a href="logowanie.php"">LOGOWANIE</a>';
                }
                ?>