<?php

$server = "localhost";
$username = "loginOTP";
$password = "123";
$dbname = "loginOTP";
$dsn = "pgsql:dbname=$dbname;host=$server";

$koneksi = new PDO($dsn, $username, $password);

if (!$koneksi) {
  die("Koneksi gagal");
}