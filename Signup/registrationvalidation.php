<?php
/**
 * A class to validate if username or password matches with format or not.
 */
class Registrattionvalidation {
  /**
   * A variable to store the regular expression of password which consists of
   * minimum 8 characters, a uppercase letter,a lowercase letter and a number.
   *
   * @var string $passwordRegex
   */
  private $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/";
  public function validation() {

      if (isset($_POST['submit'])) {
      if (!empty($_POST['uname']) && !empty($_POST['uname']) && !empty($_POST['pswre'])) {
        if (strlen($_POST['psw']) < 5) {
          $Message = urlencode("Password must be of atleast 8 character!!!");
          header('location:../Login/login.php?Message=' . $Message);
        }
        else if (!preg_match($this->passwordRegex, $_POST['psw'])) {
          $Message = urlencode("Password must follow some standard e.g-Abc@123!!!");
          header('location:../Login/login.php?Message=' . $Message);
        }
        else if (!filter_var($_POST['uname'], FILTER_VALIDATE_EMAIL)) {
          $Message = urlencode("Check user name please!!!!");
          header('location:../Login/login.php?Message=' . $Message);
        } else if ($_POST['psw'] !== $_POST['pswre']) {
          $Message = urlencode("Confirm your password please!!!!");
          header('location:../Login/login.php?Message=' . $Message);
        }
        else {
          require 'otp.php';
        }
    }

    }
    else {
      $Message = urlencode("All fields are required!!!!");
      header('location:../Login/login.php?Message=' . $Message);
    }
  }
}
$ob = new Registrattionvalidation();
$ob->validation();
?>
