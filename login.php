<?php

session_start();

if (isset($_SESSION['email'])) {
  header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <form action="proses_login.php" method="post">
    <label for="email">Masukkan Email anda:</label>
    <input type="email" name="email" id="email">
    <button type="submit">Kirim</button>
  </form>
</body>
</html>