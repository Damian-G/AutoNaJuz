<?php
session_start();
require("db.php");

    $idZgloszenia = $_POST["idZgloszenia"];
    $trescOdpowiedzi = $_POST["trescOdpowiedzi"];
    
    $sql = "INSERT INTO odpowiedzi (idZgloszenia, tresc) VALUES ($idZgloszenia, '$trescOdpowiedzi')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
?>


