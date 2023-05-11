<?php

include 'koneksi.php';

session_start();

$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$hasil = $koneksi->query($sql)->fetchObject();

if (!empty($email)) {
  $_SESSION['email'] = $hasil->email;
  $_SESSION['name'] = $hasil->name;
  header("location: index.php");
} else {
  echo "Email tidak ada";
}