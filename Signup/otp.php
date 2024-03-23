<?php
require __DIR__ .  '/../vendor/autoload.php';
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/**
 * A class to generate OTP and sending it through email.
 */
class Otp {
  /**
   * @var string $otp
   *
   * Stores generated OTP.
   */
  private $otp;
  /**
   * A function which generates OTP and stores in session.
   *
   * @return void
   */
  public function store() {
    session_start();
    $this->otp = rand(1000, 9999);
    if (isset($_POST['submit'])) {
      $_SESSION['otp'] = $this->otp;
      $_SESSION['uname'] = $_POST['uname'];
      $_SESSION['psw'] = $_POST['psw'];
      $_SESSION['pswre'] = $_POST['pswre'];
    }
  }
  /**
   * A function to send OTP through email using PHPMAILER package.
   *
   * @return void
   */
  public function sendOtp() {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $user = $_ENV["username"];
    $psw = $_ENV["psw"];
    // Creating a object of PHPMailer class.
    $mail = new PHPMailer(TRUE);
    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = TRUE;
      $mail->Username = $user;
      $mail->Password = $psw;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port = 465;
      // Adding sender's email address.
      $mail->setFrom($user);
      // Adding email address of recipient's mail.
      $mail->addAddress($_POST['uname']);
      $mail->isHTML(TRUE);
      $mail->Subject = 'OTP For password reset ';
      $mail->Body = "Hello user, your otp for changing password is " . $this->otp;
      // Sending email.
      try {
        $mail->send();
        header('location:entry.php');
      }
      catch (Exception $e) {
        echo $e;
      }
    }
    // Exception handling done here.
    catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
    }
  }
}
$ob = new Otp();
$ob->store();
$ob->sendOtp();
?>
