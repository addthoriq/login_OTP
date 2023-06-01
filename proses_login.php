<?php

require 'koneksi.php';
require 'func_generateOTP.php';

// $tipe = get_safe_value($koneksi, $_POST['tipe']);
$otp = $_POST['kode_otp'];
$email = get_safe_value($koneksi, $_POST['email']);

$sql = "SELECT * FROM users WHERE email_pengguna = $email";
$hasil = $koneksi->query($sql)->fetchObject();

if ($otp == $_SESSION['EMAIL_OTP']) {
  unset($_SESSION['EMAIL_OTP']);
  $_SESSION['email'] = $hasil->email_pengguna;
  $_SESSION['name'] = $hasil->nama_pengguna;
  header("location: index.php");
} else {
  echo "gagal";
}

// if ($tipe == "'email'") {
  
// }

// $email = $_POST['email'];

// $sql = "SELECT * FROM users WHERE email = '$email'";
// $hasil = $koneksi->query($sql)->fetchObject();

// if (!empty($email)) {
//   $_SESSION['email'] = $hasil->email;
//   $_SESSION['name'] = $hasil->name;
//   header("location: index.php");
// } else {
//   echo "Email tidak ada";
// }
