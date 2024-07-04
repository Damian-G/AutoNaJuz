<?php
session_start();
require("db.php");

$idAuta = $_POST['idAuta'];
$idUzytkownika = $_SESSION["id"];

$conn = new mysqli("localhost", "root", "", "wypozyczalniaautdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_check = "SELECT id FROM ulubione WHERE idAuta = $idAuta AND idUzytkownika = $idUzytkownika";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    $sql = "DELETE FROM ulubione WHERE idAuta = $idAuta AND idUzytkownika = $idUzytkownika";
    $conn->query($sql);
    echo json_encode(["status" => "removed"]);
} else {
    $sql = "INSERT INTO ulubione (idAuta, idUzytkownika) VALUES ($idAuta, $idUzytkownika)";
    $conn->query($sql);
    echo json_encode(["status" => "added"]);
}

$conn->close();
?>
