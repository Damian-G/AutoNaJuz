<?php
session_start();
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPojazdu = $_POST["idPojazdu"];

    $sql = "SELECT obrazek FROM flota WHERE id = '$idPojazdu'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $obrazek = $row['obrazek'];

        if (file_exists($obrazek)) {
            unlink($obrazek);
        }

    $sql_delete_recenzje = "DELETE FROM recenzje WHERE idAuta = '$idPojazdu'";
    $sql_delete_ulubione = "DELETE FROM ulubione WHERE idAuta = '$idPojazdu'";
    $sql_delete_rezerwacje = "DELETE FROM rezerwacje WHERE idAuta = '$idPojazdu'";
    $conn->query($sql_delete_recenzje);
    $conn->query($sql_delete_ulubione);
    $conn->query($sql_delete_rezerwacje);

    $sql_delete_flota = "DELETE FROM flota WHERE id = '$idPojazdu'";
    if ($conn->query($sql_delete_flota) === TRUE) {
        $_SESSION['message'] = "Pojazd został usunięty pomyślnie.";
    } else {
        $_SESSION['message'] = "Wystąpił błąd podczas usuwania pojazdu: " . $conn->error;
    }

    $conn->close();
    header("Location: usun_pojazd_form.php");
    exit;
}
}
?>
