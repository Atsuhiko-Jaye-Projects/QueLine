<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'utils/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'alexisdumale@gmail.com';                     //SMTP username
    $mail->Password   = 'lqil fxqb kyrl wezh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // $mail->setFrom('ajcodalify@gmail.com', 'Alexis');
    $mail->addAddress($user->email_address, $user->firstname);     //Add a recipient

    //Content
    $mail->isHTML(true);   
    $mail->Subject = 'ICC Password Reset Instructions';                               //Set email format to HTML
    $token = bin2hex(random_bytes(16)); // Secure reset token
    $link = "http://localhost/queline/reset_password.php?action=reset&token={$token}";

    $body = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Password Reset</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color: #003968; color: #f2bc39;">
  <table width="100%" cellspacing="0" cellpadding="20">
    <tr>
      <td align="center">
        <table width="600" style="background-color: #003968; border-radius: 8px;">
          <tr>
            <td style="text-align: center;">
              <h2 style="color: #f2bc39;">Password Reset Request</h2>
              <p style="color: #f2bc39; font-size: 16px;">
                You requested to reset your password. Click the button below to proceed:
              </p>
              <a href="http://localhost/queline/reset_password.php?action=reset&token=YOURTOKEN"
                 style="display: inline-block; margin-top: 20px; padding: 12px 24px; background-color: #f2bc39; color: #003968; text-decoration: none; font-weight: bold; border-radius: 5px;">
                Reset Password
              </a>
              <p style="color: #f2bc39; margin-top: 30px; font-size: 14px;">
                If you didn’t request this, you can safely ignore this email.
              </p>
              <p style="color: #f2bc39; font-size: 14px;">
                — Immaculada Concepcion College
              </p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
';


    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);


    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}