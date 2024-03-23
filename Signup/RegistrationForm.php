<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
  <h2>Signup Form</h2>
  <form action="registrationvalidation.php" method="post">
    <div class="container">
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="uname"><b>Create Username</b></label>
      <input type="text" placeholder="Enter a new Email" name="uname" id="email" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter a new Password" name="psw" id="psw" required>
      <label for="psw"><b>Confirm Password</b></label>
      <input type="password" placeholder="Re Enter the Password" name="pswre" required>
      <div class="btn-container">
        <input type="submit" class="button" name="submit">Sign up</a>
      </div>
      <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
  </form>
  <div id="message">
    <h3>Password must contain the following:</h3>
    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
    <p id="number" class="invalid">A <b>number</b></p>
    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
  </div>
  <div id="mail">
    <h3>Email should be:</h3>
    <p id="green" class="invalid">Should <b>be mail format</b></p>
  </div>
</body>
<script src="../Javascript/script.js"></script>
</html>
