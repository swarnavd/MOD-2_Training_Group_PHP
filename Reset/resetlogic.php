<?php
require '../Database/connection.php';
require __DIR__ .  '/../vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class resetlogic {

  private $sql = "";
  private $sql1 = "";
  function reset() {
    $ob = new Connection();
    session_start();
    try {
      $this->sql1 = $ob->conn->prepare("SELECT * FROM creds WHERE user = '{$_SESSION['email']}'");
      $this->sql1->execute();
      $rowCount = $this->sql1->rowCount();
      if ($rowCount <= 0) {
        $Message = urlencode("User not exists!!!");
        header('location:../Login/login.php?Message=' . $Message);
      }
      else {
        $hash = password_hash($_POST['psw'], PASSWORD_DEFAULT);
        $this->sql = $ob->conn->prepare("UPDATE creds SET password = '{$hash}' WHERE user = '{$_SESSION['email']}'");
        $exec = $this->sql->execute();
        if ($exec == TRUE) {
          $pswChanged = urlencode("Password changed successfully!!");
          header('location:../Login/login.php?Message=' . $pswChanged);
        }
        else {
          $pswChanged = urlencode("User not exists!!");
          header('location:../Login/login.php?Message=' . $pswChanged);
        }
      }
    }
    catch (Exception $e) {
      echo $e;
    }
  }
}

?>
