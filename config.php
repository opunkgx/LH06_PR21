<?php
$host = "localhost"; // ganti kalau pakai hosting
$user = "root";      // default user XAMPP/MAMP
$pass = "";          // password MySQL (biasanya kosong di XAMPP)
$db   = "userdb";    // nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>