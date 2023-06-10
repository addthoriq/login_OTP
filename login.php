<?php

session_start();

if (isset($_SESSION['email'])) {
  header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
</head>

<body>

  <?php
    if (isset($_SESSION['error'])) {
      echo $_SESSION['error'];
    }
  ?>

  <form action="proses_login.php" method="post">
    <span id="email_error" style="color: red;"></span><br>
    <label for="email">Masukkan Email anda:</label>
    <input type="email" name="email" id="email">
    <button type="button" onclick="kirim_otp()" id="btn_kirim_otp">Kirim OTP</button>
    <br>
    <label for="kode_otp" id="label_otp">Masukkan Kode OTP</label>
    <input type="text" name="kode_otp" id="kode_otp">
    <button type="submit" id="btn_submit">Login</button>
  </form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
  jQuery('#kode_otp').hide();
  jQuery('#label_otp').hide();
  jQuery('#btn_submit').hide();

  function kirim_otp() {
    jQuery('#email_error').html('');
    var email_otp = jQuery('#email').val();
    if (email_otp == '') {
      jQuery('#email_error').html('Masukkan Email');
    } else {
      jQuery('#btn_kirim_otp').html('Tunggu Sebentar');
      jQuery('#btn_kirim_otp').attr('disabled', true);
      var b = jQuery.ajax({
        url: 'kirim_otp.php',
        type: 'post',
        data: 'email=' + email_otp + '&tipe=email',
        success: (result) => {
          console.log(result);
          if (result == 'done') {
            jQuery('#email').attr('readonly', true);
            jQuery('#btn_kirim_otp').hide();
            jQuery('#kode_otp').show();
            jQuery('#label_otp').show();
            jQuery('#btn_submit').show();
          }
        }
      })
      console.log(b);
    }
  }

  
</script>

</html>