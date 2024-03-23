<?php
require '../Database/connection.php';
require __DIR__ .  '/../vendor/autoload.php';
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
/**
 * A class to send the link of reset form to mail.
 */
class Send {
  /**
   * A object which prepares a statement which will require to check that a
   * user already exists or not
   *
   * @var object $sqlRepeat
   */
  public $sqlRepeat;
  /**
   * A function to check if requested user is present in database or not,if yes
   * then send reset link to his/her mail.
   *
   * @return void
   */
  public function userCheck() {
    $ob = new Connection("mysql:host=localhost;dbname=login", "root", "root");
    session_start();
    if (isset($_POST['submit'])) {
      $_SESSION['email'] = $_POST['email'];
    }

    try {
      $this->sqlRepeat = $ob->conn->prepare("SELECT * FROM creds WHERE user = '{$_SESSION['email']}' ");
      $this->sqlRepeat->execute();
      $result = $this->sqlRepeat->rowCount();
    }
    catch (Exception $e) {
      echo $e;
    }
    $rowCount = $this->sqlRepeat->rowCount();
    if ($rowCount == 0) {
      $Message = urlencode("User not found!!");
      session_unset();
      session_destroy();
      header("Location:../Login/login.php?Message=" . $Message);
    }
    else {
      $username = $_ENV["username"];
      $psw = $_ENV["psw"];
      session_start();
      $_SESSION['email'] = $_POST['email'];
      $mail = new PHPMailer(TRUE);
      try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE;
        $mail->Username = $username;
        $mail->Password = $psw;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        // Adding sender's email address.
        $mail->setFrom($username);
        // Adding email address of recipient's mail.
        $mail->addAddress($_POST['email']);
        $mail->isHTML(TRUE);
        $mail->Subject = 'Subject ';
        $mail->Body = "http://example.com/phpmysql/Reset/resetform.php";
        // Sending email.
        $mail->send();
        if ($mail->send()) {
          $Message = urlencode("Check your email!!");
          header('location:passwordResetForm.php?Message=' . $Message);
        }
      }
      // Exception handling done here.
      catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
      }
    }
  }
}
$ob = new Send();
$ob->userCheck();
