<?php
session_start();
if (isset($_SESSION['uname'])) {
  header('location:landing.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
  <?php
  if (isset($_GET['Message'])) {
    echo $_GET['Message'];
  }
  ?>
  <h2>Login Form</h2>
  <form action="validation.php" method="post">
    <div class="container">
      <label for="uname"><b>Enter your email id:</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" >
      <button type="submit" name="login">Login</button>
    </div>
    <div class="container btn-container" style="background-color:#f1f1f1">
      <a href="../Signup/RegistrationForm.php" class="button">signup</a>
      <a href="../Reset/passwordResetForm.php" class="button">Reset Password</a>
    </div>
  </form>
</body>
</html>
