<?php
session_start();

// Username & password bisa kamu ubah sesuai keinginan
$admin_user = "admin";
$admin_pass = "12346";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin-dashboard.php");
        exit;
    } else {
        echo "<script>alert('Username atau password salah!'); window.location.href='admin-login.html';</script>";
    }
}
?>
