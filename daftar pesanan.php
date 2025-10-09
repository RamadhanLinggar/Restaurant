<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM pesanan ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pesanan</title>
</head>
<body>
  <h2>Daftar Pesanan Masuk</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Tanggal</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['nama']) ?></td>
      <td><?= $row['jumlah'] ?></td>
      <td><?= $row['tanggal'] ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
