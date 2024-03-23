<?php
require '../Database/connection.php';
/**
 * A class to inserts data to database.
 */
class insert {
  // Declaring variable for executing query.
  private $sql = "";
  // Declaring variable for executing another query.
  private $sqlRepeat = "";
  /**
   * A function to inserts details in database from registration form.
   *
   * @return void
   */
  public function insertion() {
    // Session is started.
    session_start();
    // If password and confirm password are both same then execute the query.
      if ($_SESSION['psw'] == $_SESSION['pswre']) {
        $ob = new Connection();
        try {
          $this->sqlRepeat = $ob->conn->prepare("SELECT * FROM creds WHERE user = '{$_SESSION['uname']}' ");
          $this->sqlRepeat->execute();
        }
        catch (Exception $e) {
          echo $e;
        }
        $rowCount = $this->sqlRepeat->rowCount();
        // If record founds then username already exists.
        if ($rowCount >= 1) {
          $Message = urlencode("User exists!!");
          session_unset();
          session_destroy();
          header("Location:../Login/login.php?Message=" . $Message);
        }
        // Else inserts user details into database.
        else {
          try {
            $hash = password_hash($_SESSION['psw'], PASSWORD_DEFAULT);
            $this->sql = $ob->conn->prepare("INSERT INTO creds (user, password) VALUES ('" . $_SESSION['uname'] . "', '" . $hash . "')");
            $this->sql->execute();
          }
          catch (Exception $e) {
            echo $e;
          }
          if ($this->sql) {
            $Message = urlencode("Successfully registered!!");
            session_unset();
            session_destroy();
            header("Location:../Login/login.php?Message=" . $Message);
          }
        }
      }
      else {
        $Message = urlencode("Password not matched!!");
        header("Location:login.php?Message=" . $Message);
      }
  }
}
$ob1 = new insert();
$ob1->insertion();
