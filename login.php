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
  <form action="" method="post">
    <span id="email_error" style="color: red;"></span><br>
    <label for="email">Masukkan Email anda:</label>
    <input type="email" name="email" id="email">
    <button type="button" onclick="kirim_otp()" id="btn_kirim_otp">Kirim OTP</button>
    <input type="text" name="kode_otp" id="kode_otp">
  </form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
  jQuery('#kode_otp').hide();

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
            jQuery('#email').attr('disabled', true);
            jQuery('#btn_kirim_otp').hide();
            jQuery('#kode_otp').show();
          }
        }
      })
      console.log(b);
    }
  }
</script>

</html>