<?php
session_start();
include 'Koneksi.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Pesanan</title>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <div class="container">
    <h1>📜 Daftar Pesanan</h1>
    <a href="logout.php" class="logout">Logout</a>
    <table>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>

      <?php
      $result = $conn->query("SELECT * FROM pesanan ORDER BY id DESC");
      while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['nama']}</td>
                  <td>{$row['jumlah']}</td>
                  <td>{$row['tanggal']}</td>
                  <td><a href='hapus_pesanan.php?id={$row['id']}' class='hapus'>Hapus</a></td>
                </tr>";
      }
      ?>
    </table>
  </div>
</body>
</html>
