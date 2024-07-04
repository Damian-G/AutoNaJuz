<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytowanie pojazdu...</title>
</head>

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

    .blok_formularz {
        margin: auto;
        padding: 40px;
        background-color: rgba(30, 30, 30, 0.9);
        color: #fff;
        border-radius: 20px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
        max-width: 800px;
        width: 100%;
        font-family: 'Roboto', sans-serif;
    }

    .blok_formularz h2 {
        margin: 0 0 30px;
        font-size: 36px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .blok_formularz label {
        display: block;
        margin-bottom: 10px;
        font-size: 20px;
    }

    .blok_formularz input[type="text"],
    .blok_formularz input[type="number"],
    .blok_formularz select,
    .blok_formularz textarea,
    .blok_formularz option {
        min-width: calc(100% - 20px);
        max-width: calc(100% - 20px);
        padding: 15px;
        margin-bottom: 20px;
        font-size: 18px;
        border: none;
        border-radius: 10px;
        background-color: rgba(50, 50, 50, 0.8);
        color: #fff;
        outline: none;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .blok_formularz input[type="text"]:focus,
    .blok_formularz input[type="number"]:focus,
    .blok_formularz select:focus,
    .blok_formularz textarea:focus {
        background-color: rgba(70, 70, 70, 0.8);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);

    }

    .blok_formularz button {
        background-color: #FE9000;
        color: #fff;
        padding: 18px 40px;
        font-size: 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        display: block;
        width: 100%;
        margin-top: 30px;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: background-color 0.3s;
    }

    h2 {
        letter-spacing: 5px;
    }

    .blok_formularz button:hover {
        background-color: #e07a00;
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
<div id="tłobmw">
    <div id="powrot">
        <a href="admin.php">POWRÓT DO ZARZĄDZANIA</a>
    </div>
    <div class="blok_formularz">
        <?php
        session_start();
        require("db.php");
        $auto_id = $_GET['id'];
        $sql = "SELECT * FROM flota WHERE id = $auto_id";
        $result = $conn->query($sql);
        $auto = $result->fetch_assoc();

        if (!$auto) {
            die("Auto o podanym ID nie istnieje.");
        }
        ?>

        <form method="post" action="aktualizuj_info_pojazdu.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $auto['id']; ?>">

            <label for="marka">Marka:</label>
            <input type="text" id="marka" name="marka" value="<?php echo $auto['marka']; ?>" required>

            <label for="model">Model:</label>
            <input type="text" id="model" name="model" value="<?php echo $auto['model']; ?>" required>

            <label for="rok">Rok:</label>
            <input type="number" id="rok" name="rok" value="<?php echo $auto['rok']; ?>" required>

            <label for="idKategorii">Kategoria:</label>
            <select name="idKategorii" required>
                <?php
                $sql = "SELECT id, nazwa FROM kategorie ORDER BY nazwa ASC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $selected = $row['id'] == $auto['idKategorii'] ? 'selected' : '';
                    echo "<option value='{$row['id']}' $selected>{$row['nazwa']}</option>";
                }
                ?>
            </select>

            <label for="rodzaj_paliwa">Rodzaj paliwa:</label>
            <select name="rodzaj_paliwa" required>
                <?php
                $sql = "SELECT DISTINCT rodzaj_paliwa FROM flota";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $selected = $row['rodzaj_paliwa'] == $auto['rodzaj_paliwa'] ? 'selected' : '';
                    echo "<option value='{$row['rodzaj_paliwa']}' $selected>{$row['rodzaj_paliwa']}</option>";
                }
                ?>
            </select>

            <label for="spalanie">Spalanie (l/100km):</label>
            <input type="number" id="spalanie" step="0.1" name="spalanie" value="<?php echo $auto['spalanie']; ?>" required>

            <label for="skrzynia_biegow">Skrzynia biegów:</label>
            <select name="skrzynia_biegow" required>
                <option value="Automatyczna" <?php if ($auto['skrzynia_biegow'] == 'Automatyczna') echo 'selected'; ?>>Automatyczna</option>
                <option value="Manualna" <?php if ($auto['skrzynia_biegow'] == 'Manualna') echo 'selected'; ?>>Manualna</option>
            </select>

            <label for="rodzaj_napedu">Rodzaj napędu:</label>
            <select name="rodzaj_napedu" required>
                <option value="Przód" <?php if ($auto['rodzaj_napedu'] == 'Przód') echo 'selected'; ?>>Przód</option>
                <option value="Tył" <?php if ($auto['rodzaj_napedu'] == 'Tył') echo 'selected'; ?>>Tył</option>
            </select>

            <label for="ilosc_miejsc">Ilość miejsc:</label>
            <input type="number" min="2" max="9" id="ilosc_miejsc" name="ilosc_miejsc" value="<?php echo $auto['ilosc_miejsc']; ?>" required>

            <label for="kolor">Kolor:</label>
            <input type="text" id="kolor" name="kolor" value="<?php echo $auto['kolor']; ?>" required>

            <label for="stawka_dzienna">Stawka dzienna (kwota):</label>
            <input type="number" id="stawka_dzienna" name="stawka_dzienna" value="<?php echo $auto['stawka_dzienna']; ?>" required>

            <label for="stawka_miesieczna">Stawka miesięczna (kwota):</label>
            <input type="number" id="stawka_miesieczna" name="stawka_miesieczna" value="<?php echo $auto['stawka_miesieczna']; ?>" required>

            <label for="stawka_kilometrowa">Stawka za kilometr (kwota):</label>
            <input type="number" id="stawka_kilometrowa" name="stawka_kilometrowa" value="<?php echo $auto['stawka_kilometrowa']; ?>" required>

            <label for="opis">Opis:</label>
            <textarea id="opis" name="opis" required><?php echo $auto['opis']; ?></textarea>

            <label for="obrazek">Aktualne djęcie podglądowe auta:</label>
            <img src="flota/<?php echo $auto['obrazek']; ?>" width="300"><br>
            <label for="zmien_obrazek">Nowe zdjęcie podglądowe::</label>
            <input type="file" name="obrazek">

            <button type="submit">Zapisz zmiany</button>
        </form>
    </div>
</div>
</body>

</html>