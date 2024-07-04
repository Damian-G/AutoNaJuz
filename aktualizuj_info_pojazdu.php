<?php
session_start();
require("db.php");

$id = $_POST['id'];
$idKategorii = $_POST['idKategorii'];
$marka = $_POST['marka'];
$model = $_POST['model'];
$rok = $_POST['rok'];
$rodzaj_paliwa = $_POST['rodzaj_paliwa'];
$spalanie = $_POST['spalanie'];
$skrzynia_biegow = $_POST['skrzynia_biegow'];
$rodzaj_napedu = $_POST['rodzaj_napedu'];
$ilosc_miejsc = $_POST['ilosc_miejsc'];
$stawka_dzienna = $_POST['stawka_dzienna'];
$stawka_miesieczna = $_POST['stawka_miesieczna'];
$stawka_kilometrowa = $_POST['stawka_kilometrowa'];
$opis = $_POST['opis'];

$obrazek = basename($_FILES["obrazek"]["name"]);
if ($obrazek) {
    $target_dir = "flota/";
    $target_file = $target_dir . $obrazek;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["obrazek"]["tmp_name"]);
    if($check === false) {
        die("Plik nie jest obrazkiem.");
    }

    if (file_exists($target_file)) {
        die("Plik o tej nazwie już istnieje.");
    }

    if ($_FILES["obrazek"]["size"] > 5000000) {
        die("Plik jest za duży.");
    }

    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_types)) {
        die("Dozwolone są tylko pliki JPG, JPEG, PNG i GIF.");
    }

    if (!move_uploaded_file($_FILES["obrazek"]["tmp_name"], $target_file)) {
        die("Wystąpił błąd podczas przesyłania pliku.");
    }

    $sql = "SELECT obrazek FROM flota WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['obrazek']) {
        unlink("flota/" . $row['obrazek']);
    }

    $id = $_POST['id'];
    $idKategorii = $_POST['idKategorii'];
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $rok = $_POST['rok'];
    $rodzaj_paliwa = $_POST['rodzaj_paliwa'];
    $spalanie = $_POST['spalanie'];
    $skrzynia_biegow = $_POST['skrzynia_biegow'];
    $rodzaj_napedu = $_POST['rodzaj_napedu'];
    $ilosc_miejsc = isset($_POST['ilosc_miejsc']) ? $_POST['ilosc_miejsc'] : 0;
    $stawka_dzienna = $_POST['stawka_dzienna'];
    $stawka_miesieczna = $_POST['stawka_miesieczna'];
    $stawka_kilometrowa = $_POST['stawka_kilometrowa'];
    $opis = $_POST['opis'];

    $sql = "UPDATE flota SET marka = '$marka', model = '$model', rok = '$rok', rodzaj_paliwa = '$rodzaj_paliwa', spalanie = '$spalanie', 
    idKategorii = '$idKategorii', skrzynia_biegow = '$skrzynia_biegow', rodzaj_napedu = '$rodzaj_napedu', ilosc_miejsc = '$ilosc_miejsc',
    stawka_dzienna = '$stawka_dzienna', stawka_miesieczna = '$stawka_miesieczna', stawka_kilometrowa = '$stawka_kilometrowa',
    opis = '$opis', obrazek = '$obrazek' WHERE id = $id";
} else {
    $sql = "UPDATE flota SET marka = '$marka', model = '$model', rok = '$rok', rodzaj_paliwa = '$rodzaj_paliwa', spalanie = '$spalanie', 
    idKategorii = '$idKategorii', skrzynia_biegow = '$skrzynia_biegow', rodzaj_napedu = '$rodzaj_napedu', ilosc_miejsc = '$ilosc_miejsc',
    stawka_dzienna = '$stawka_dzienna', stawka_miesieczna = '$stawka_miesieczna', stawka_kilometrowa = '$stawka_kilometrowa',
    opis = '$opis' WHERE id = $id";
}

if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Auto zostało zaktualizowany pomyślnie.";
} else {
    echo "Błąd: " . $conn->error;
    $_SESSION['message'] = "Wystąpił błąd podczas aktualizacji." . $conn->error;
}
$conn->close();
header("Location: aktualizacja_pojazdow.php");
exit;
?>