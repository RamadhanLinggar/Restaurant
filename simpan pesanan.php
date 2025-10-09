<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $jumlah = $_POST['jumlah'];

  $sql = "INSERT INTO pesanan (nama, jumlah) VALUES ('$nama', '$jumlah')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Pesanan berhasil disimpan!'); window.location.href='pesan.html';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
