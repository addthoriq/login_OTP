<?php

require 'koneksi.php';

$sql = 'SELECT * FROM users';

$res = $koneksi->query($sql);

// var_dump($res->fetchObject());

// foreach ($res as $row) {
//   print $row['user_id'] . " | ";
//   print $row['name'] . " | ";
//   print $row['email'] . " | <br>";
// }