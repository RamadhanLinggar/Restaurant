<?php
session_start();
include 'Koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = md5($_POST['password']); // terenkripsi

  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['admin'] = $username;
    header("Location: daftar_pesanan.php");
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - Restoran</title>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <div class="container">
    <h1>🔐 Login Admin</h1>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
      <label>Username:</label>
      <input type="text" name="username" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
