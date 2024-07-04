<?php 
$conn = new mysqli("localhost", "root", "", "wypozyczalniaautdb");
 if ($conn->connect_error)
 { exit("Connection failed: " . $conn->connect_error); } 
 ?> 