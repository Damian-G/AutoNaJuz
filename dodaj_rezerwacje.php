<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: logowanie.php");
    exit();
}
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rezerwuj'])) {
    $idAuta = $_POST['idAuta'];
    $idUser = $_POST['idUser'];
    $metoda_rezerwacji = $_POST['metoda_rezerwacji'];
    $data_rezerwacji = $_POST['data_rezerwacji'];

    $timestamp_rezerwacji = strtotime($data_rezerwacji);

    switch ($metoda_rezerwacji) {
        case 'dzień':
            $koniec_rezerwacji = date('Y-m-d H:i:s', strtotime('+1 day', $timestamp_rezerwacji));
            break;
        case 'miesiąc':
            $koniec_rezerwacji = date('Y-m-d H:i:s', strtotime('+1 month', $timestamp_rezerwacji));
            break;
        case 'kilometry':
            $koniec_rezerwacji = date('Y-m-d H:i:s', strtotime('+1 day', $timestamp_rezerwacji));
            break;
        default:
            $koniec_rezerwacji = date('Y-m-d H:i:s', strtotime('+1 day', $timestamp_rezerwacji));
            break;
    }
    
    $sprawdz_dostepnosc = "SELECT id FROM rezerwacje 
                           WHERE idAuta = $idAuta 
                           AND ((data_rezerwacji <= '$data_rezerwacji' AND koniec_rezerwacji > '$data_rezerwacji') 
                                OR (data_rezerwacji < '$koniec_rezerwacji' AND koniec_rezerwacji >= '$koniec_rezerwacji'))";

    $result = $conn->query($sprawdz_dostepnosc);
    if ($result->num_rows > 0) {
        $_SESSION['message_rezerwacja'] = "Wybrane auto jest już zarezerwowane w tym terminie. Wybierz inną datę lub metodę rezerwacji.";
    } else {
        $sql_insert = "INSERT INTO rezerwacje (idAuta, idUzytkownika, metoda_rezerwacji, data_rezerwacji, koniec_rezerwacji) 
                       VALUES ('$idAuta', '$idUser', '$metoda_rezerwacji', '$data_rezerwacji', '$koniec_rezerwacji')";

        if ($conn->query($sql_insert) === TRUE) {
            $_SESSION['message_rezerwacja'] = "Rezerwacja została pomyślnie zapisana.";
        } else {
            $_SESSION['message_rezerwacja'] = "Błąd podczas zapisu rezerwacji: " . $conn->error;
        }
    }

    $conn->close();
    header("Location: flota.php");
    exit;
}
?>
