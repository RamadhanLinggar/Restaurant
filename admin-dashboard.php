<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin-login.html");
    exit;
}

include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <style>
    body { font-family: Arial; background: #fafafa; margin: 40px; }
    table {
      border-collapse: collapse;
      width: 80%;
      margin: auto;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      background: white;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
    th {
      background: #ff9900;
      color: white;
    }
    .logout {
      display: block;
      text-align: right;
      margin: 20px 100px;
    }
    .logout a {
      color: #ff0000;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="logout">
    <a href="logout.php">Logout</a>
  </div>

  <h2 style="text-align:center;">📋 Daftar Pesanan</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Tanggal</th>
      <th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= $row['nama']; ?></td>
      <td><?= $row['jumlah']; ?></td>
      <td><?= $row['tanggal']; ?></td>
      <td><a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus pesanan ini?')">Hapus</a></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
