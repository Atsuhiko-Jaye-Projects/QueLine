<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


class Sender{

  private PHPMailer $mail;

  public $email;
  public $password;
  public $username;
  public $access_code;
  public $firstname;
  public $lastname;

  public function __construct(){

    $this->mail = new PHPMailer(true);
    // SMTP Configuration
    $this->mail->isSMTP();
    $this->mail->Host       = 'smtp.gmail.com';
    $this->mail->SMTPAuth   = true;
    $this->mail->Username   = 'alexisdumale@gmail.com'; // 🔐 Move to env/config
    $this->mail->Password   = 'lqil fxqb kyrl wezh';     // 🔐 Move to env/config
    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $this->mail->Port       = 465;
    $this->mail->isHTML(true);
  }

  function sendResetPassword($email, $lastname, $id, $token){
    try {
      //Content
      $this->mail->isHTML(true);   
      $this->mail->Subject = 'ICC Password Reset Instructions'; //Set email format to HTML
      $link = "http://localhost/queline/reset_password.php?id={$id}action=reset_password&token={$token}";

      $this->mail->setFrom($this->mail->Username, 'OQMC Support');
      $this->mail->addAddress($email, $lastname);

      ob_start();
      include "email_templates/forgot_password_email.php";
      $body = ob_get_clean();

      $this->mail->Body= $body;
      if ($this->mail->send()) {
        // echo "<div class='forgot-alert-message-info'>";
        //   echo "We've emailed you a link to reset your password. If it doesn't arrive soon, check your spam folder.";
		    // echo "</div>";
    }

    } catch (Exception $e) {
       echo "❌ Failed to send email. Error: {$this->mail->ErrorInfo}";
    }
  }

  function notifyPasswordChange($email, $firstname, $lastname){
    try {
      //Content
      $this->mail->isHTML(true);   
      $this->mail->Subject = 'ICC Password Changed Notification'; //Set email format to HTML
        

      $this->mail->setFrom($this->mail->Username, 'OQMC Support');
      $this->mail->addAddress($email);

      ob_start();
      include "email_templates/password_changed_email.php";
      $body = ob_get_clean();

      $this->mail->Body= $body;
      if ($this->mail->send()) {
        // echo "<div class='forgot-alert-message-info'>";
        //   echo "We've emailed you a link to reset your password. If it doesn't arrive soon, check your spam folder.";
		    // echo "</div>";
    }

    } catch (Exception $e) {
       echo "❌ Failed to send email. Error: {$this->mail->ErrorInfo}";
    }
  }


}

