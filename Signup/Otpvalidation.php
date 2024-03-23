<?php
/**
 * A class to valid if user given OTP is matched with actual otp or not.
 */
class Otpvalidation {
  /**
   * A function to validate otp.
   *
   * @return void
   */
  public function otpValidation() {
    // Session started.
    session_start();
    // If generated otp and user provided otp is same then inserts data.
    if ($_SESSION['otp'] == $_POST['otp']) {
      header('location:insert.php');
    }
    // If otp not matched and insertion operation shouldn't be perform.
    else {
      session_unset();
      session_destroy();
      $message = urlencode("OTP doesn't match!!!!");
      header('location:../Login/login.php?message=' . $message);
    }
  }
}
$ob = new Otpvalidation();
$ob->otpValidation();
?>
