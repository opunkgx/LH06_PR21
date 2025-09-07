<?php
session_start();

// kalau belum login, arahkan balik ke login
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .dashboard {
      background: rgba(255, 255, 255, 0.1);
      padding: 40px;
      border-radius: 15px;
      text-align: center;
      backdrop-filter: blur(10px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }
    h1 {
      margin-bottom: 20px;
    }
    .btn {
      display: inline-block;
      padding: 12px 20px;
      margin-top: 20px;
      border: none;
      border-radius: 8px;
      background: #ff4d6d;
      color: #fff;
      font-size: 16px;
      text-decoration: none;
      transition: 0.3s;
    }
    .btn:hover {
      background: #e63e5c;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h1>Selamat Datang, <?php echo $_SESSION['username']; ?> 🎉</h1>
    <p>Anda berhasil login ke sistem.</p>
    <a href="logout.php" class="btn">Logout</a>
  </div>
</body>
</html>