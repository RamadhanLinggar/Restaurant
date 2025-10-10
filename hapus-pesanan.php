<?php
session_start();
include 'Koneksi.php';

// Pastikan hanya admin
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}

$id = $_GET['id'];
$conn->query("DELETE FROM pesanan WHERE id=$id");

header("Location: daftar_pesanan.php");
exit();
?>
