<?php
$servername = "localhost";
$username = "root"; // sesuaikan dengan konfigurasi Laragon Anda
$password = "Sepedamotor2"; // biasanya kosong untuk Laragon
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
