<?php
require 'vendor/autoload.php';
require 'validation.php';
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/**
 * A class used for sending email to recipient;
 */
class mail
{
  /**
   * A function used for sending email using phpmailer package.
   *
   * @return void
   */
  public function mailSet()
  {
    $ob = new validation();
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    // Storing user name and password from .env file.
    $user = $_ENV["username"];
    $psw = $_ENV["password"];
    // If email format is not valid then throws a error message.
    if (!$ob->valid($_POST['email'])) {
      $message = "Invalid email format.";
      header('location:index.php?message=' . $message);
    } 
    else {
      if (isset($_POST['submit'])) {
        // Creating a object of PHPMailer class.
        $mail = new PHPMailer(TRUE);
        try {
          $mail->isSMTP();
          $mail->Host       = 'smtp.gmail.com';
          $mail->SMTPAuth   = true;
          $mail->Username   = $user;
          $mail->Password   = $psw;
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
          $mail->Port       = 465;
          // Adding sender's email address.
          $mail->setFrom($user);
          // Adding email address of recipient's mail.          
          $mail->addAddress($_POST['email']);
          $mail->isHTML(true);
          $mail->Subject = 'Subject ';
          $mail->Body    = "Thank you for your submission";

          // Sending email.
          $mail->send();
          if ($mail->send()) {
            $message = "Invalid email format.";
            header('location:index.php?message=' . $message);
          }
        }
        // Exception handling done here.
        catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
        }
      }
    }
  }
}
$obj = new mail();
$obj->mailSet();
