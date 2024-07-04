<?php
session_start();
require("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAuta = $_POST['idAuta'];
    $login = $_POST['login'];
    $tresc = $_POST['tresc'];
    $data = date("Y-m-d H:i:s");

    $tresc = $conn->real_escape_string($tresc);

    $sql = "INSERT INTO recenzje (idAuta, login, tresc, data) 
            VALUES ('$idAuta', '$login', '$tresc', '$data')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message_opinia'] = "Opinia pomyślnie dodana.";
    } else {
        $_SESSION['message_opinia'] = "Błąd podczas dodawania opinii." . $conn->error;
    }

    $conn->close();
    header("Location: moje_recenzje.php");
    exit;
}
