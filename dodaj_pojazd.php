<?php
session_start();
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marka = $_POST["marka"];
    $model = $_POST["model"];
    $rok = $_POST["rok"];
    $idKategorii = $_POST["idKategorii"];
    $rodzaj_paliwa = $_POST["rodzaj_paliwa"];
    $spalanie = $_POST["spalanie"];
    $skrzynia_biegow = $_POST["skrzynia_biegow"];
    $rodzaj_napedu = $_POST["rodzaj_napedu"];
    $ilosc_miejsc = $_POST["ilosc_miejsc"];
    $kolor = $_POST["kolor"];
    $stawka_dzienna = $_POST["stawka_dzienna"];
    $stawka_miesieczna = $_POST["stawka_miesieczna"];
    $stawka_kilometrowa = $_POST["stawka_kilometrowa"];
    $opis = $_POST["opis"];
    $obrazek = basename($_FILES["obrazek"]["name"]);
    $target_dir = "flota/";
    $target_file = $target_dir . $obrazek;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!move_uploaded_file($_FILES["obrazek"]["tmp_name"], $target_file)) {
        die("Wystąpił błąd podczas przesyłania pliku.");
    }

    $sql = "INSERT INTO flota (idKategorii, marka, model, rok, rodzaj_paliwa, skrzynia_biegow, rodzaj_napedu, spalanie, ilosc_miejsc, kolor, stawka_dzienna, stawka_miesieczna, stawka_kilometrowa, obrazek, opis) 
            VALUES ('$idKategorii', '$marka', '$model', '$rok', '$rodzaj_paliwa', '$spalanie', '$skrzynia_biegow', '$rodzaj_napedu', '$ilosc_miejsc', '$kolor', '$stawka_dzienna', '$stawka_miesieczna', '$stawka_kilometrowa', '$obrazek', '$opis')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Pojazd dodany pomyślnie.";
    } else {
        $_SESSION['message'] = "Wystąpił błąd podczas dodawania pojazdu: " . $conn->error;
    }
    $conn->close();
    header("Location: dodaj_pojazd_form.php");
    exit;
}
