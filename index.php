<?php
session_start();
if (isset($_SESSION['email'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <p>Selamat datang <?= $_SESSION['name'] ?></p>
    <p>Anda telah login!</p>
    <a href="logout.php">Logout</a>
  </body>

  </html>
<?php
} else {
  echo "Anda belom login, silahkan login ke <a href='login.php'>Login</a>";
}
?>