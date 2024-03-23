<?php
require '../Database/connection.php';
echo "helo";
/**
 * A class to validate the login details provided by user and if validation is
 * succesful then redirect to landing page.
 */
class Validation {
  /**
   * A function to validate login details provided by user and if authentication
   * successful then redirect to landing page.
   *
   * @return void
   */
  function valid() {
    if (isset($_POST['login'])) {
      $ob = new Connection();
      $usr = $_POST['uname'];
      $psw = $_POST['psw'];
      $sql = $ob->conn->prepare("SELECT * FROM creds WHERE user = '$usr'");
      $sql->execute();
      $user = $sql->fetch();
      if ($user) {
        if ($usr == $user['user'] && password_verify( $psw, $user['password'])) {
          session_start();
          $_SESSION['uname'] = $usr;
           header('location:landing.php');

           
        }
        else {
          $Message = urlencode("Record not matched.");
          header("Location:login.php?Message=" . $Message);
        }
      }
      else {
        $Message = urlencode("User not found");
        header("Location:login.php?Message=" . $Message);
      }
    }
  }
}
$check = new Validation();
$check->valid();
?>
