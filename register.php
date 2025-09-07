<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username sudah ada
    $check = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah digunakan, pilih yang lain!'); window.location='register.php';</script>";
    } else {
        // Simpan user baru (gunakan password_hash agar lebih aman)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='index.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #667eea, #764ba2);
      font-family: Arial, sans-serif;
    }
    .register-box {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      width: 350px;
    }
    .register-box h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #667eea;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
    button:hover {
      background: #5563c1;
    }
    .links {
      text-align: center;
      margin-top: 10px;
    }
    .links a {
      text-decoration: none;
      color: #667eea;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <h2>Register</h2>
    <form action="register.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
    <div class="links">
      <p>Sudah punya akun? <a href="index.html">Login di sini</a></p>
    </div>
  </div>
</body>
</html>