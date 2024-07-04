<?php
session_start();
require("db.php");

$idUzytkownika = $_SESSION["id"];
$tresc = $_POST["tresc"];

$sql = "INSERT INTO zgloszenia (idUzytkownika, tresc) VALUES ($idUzytkownika, '$tresc')";
if ($conn->query($sql) === TRUE) {
    echo "sukces";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
