<?php

$sql = "SELECT * FROM users WHERE user_id = '00001'";

$res = $koneksi->query($sql);

var_dump($res->fetchObject()->email);

foreach ($res as $row) {
print $row['user_id'] . " | ";
print $row['name'] . " | ";
print $row['email'] . " | <br>";
}