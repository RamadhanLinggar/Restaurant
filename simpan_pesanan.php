<?php
include 'Koneksi.php'; // panggil koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];

    // Simpan ke database
    $sql = "INSERT INTO pesanan (nama, jumlah) VALUES ('$nama', '$jumlah')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Pesanan berhasil disimpan!');
                window.location.href = 'daftar_pesanan.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
