<?php
$servername = "localhost";
$username = "root"; // ganti jika pakai user lain
$password = "";     // isi kalau MySQL kamu pakai password
$database = "db_pemesanan";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>
