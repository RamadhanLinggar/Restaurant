<?php
// Aktifkan tampilan error agar bisa tahu penyebab HTTP ERROR 500
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil data dari form
$nama     = $_POST['nama'];
$makanan  = $_POST['makanan'];
$jumlah   = $_POST['jumlah'];
$total    = $_POST['total'];

// =====================
// 1️⃣ Simpan ke Database
// =====================
$host = "sql307.infinityfree.com";
$user = "if0_40154546";
$pass = "kadal21gakel";
$db   = "if0_40154546_db_pemesanan"; // ganti sesuai nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Query insert
$sql = "INSERT INTO pesanan (nama, makanan, jumlah, total) 
        VALUES ('$nama', '$makanan', '$jumlah', '$total')";

if (mysqli_query($conn, $sql)) {
  // =====================
  // 2️⃣ Kirim ke WhatsApp
  // =====================
  $nomorWA = "6281212023290"; // ganti dengan nomor WA kamu (pakai format internasional)
  $pesan = "Halo, saya ingin memesan:\n\n" .
           "🍽️ Makanan: $makanan\n" .
           "👤 Nama: $nama\n" .
           "📦 Jumlah: $jumlah\n" .
           "💰 Total: Rp " . number_format($total, 0, ',', '.') . "\n\n" .
           "Terima kasih!";

  $urlWA = "https://wa.me/$nomorWA?text=" . urlencode($pesan);

  // Redirect ke WhatsApp
  echo "<script>
          alert('Pesanan berhasil disimpan ke database!');
          window.location.href='$urlWA';
        </script>";
} else {
  echo "Gagal menyimpan pesanan: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
