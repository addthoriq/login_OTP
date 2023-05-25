<?php
function generateOTP()
{
  $char = 'abcdefghijklmnopqrstuvwxyz';
  $random = '';
  for ($i = 0; $i < 4; $i++) {
    $random .= $char[random_int(0, strlen($char) - 1)];
  }
  return $random;
}

function get_safe_value($con, $str)
{
  if ($str != '') {
    $str = trim($str);
    return $con->quote($str);
  }
}