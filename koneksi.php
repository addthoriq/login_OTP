<?php

$server = "localhost";
$username = "loginOTP";
$password = "123";
$dbname = "loginOTP";
$port = "5432";

// $koneksi = new PDO("pgsql:dbname=$dbname;host=$server", $username, $password);

if (!$koneksi) {
  die("Koneksi gagal");
}