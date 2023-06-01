<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';
require 'koneksi.php';
require 'func_generateOTP.php';

$type = get_safe_value($koneksi, $_POST['tipe']);

// var_dump($type == "'email'");

if ($type == "'email'") {
  $email = get_safe_value($koneksi, $_POST['email']);
  $sql = "SELECT * FROM users where email_pengguna = $email";
  $check_user = $koneksi->query($sql)->rowCount();

  // var_dump($check_user->rowCount());

  // if ($check_user > 0) {
  //   echo "Email ga ada";
  //   die();
  // }

  $otp = generateOTP();
  $_SESSION['EMAIL_OTP'] = $otp;
  $html = "Kode OTP anda adalah $otp";
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'thoriq.kudou@gmail.com';                     //SMTP username
  $mail->Password   = 'tusdqeugjsdlircm';                               //SMTP password
  $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('thoriq.kudou@gmail.com');
  $mail->addAddress($_POST['email']);     //Add a recipient

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Kode Login anda';
  $mail->Body    = $html;
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  if ($mail->send()) {
    echo "done";
  }
} else {
  echo 'gagal';
}
