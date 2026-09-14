<?php
$servername = "sql307.infinityfree.com";
$username = "if0_40154546";
$password = "kadal21gakel";
$database = "if0_40154546_db_pemesanan";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>
