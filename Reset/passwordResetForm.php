<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel = "stylesheet" href="../CSS/style.css">
</head>
<body>
  <?php
  if (isset($_GET['Message'])) {
    echo $_GET['Message'];
  }
  ?>
  <form action="send.php" method="post">
    <div class="container">
      <label for="email"><b>Enter your email id:</b></label>
      <input type="email" placeholder="Enter email.." name="email" required>
    </div>
    <div class="container btn-container" style="background-color:#f1f1f1">
      <input type="submit" value="send" name = "submit" class="button">
    </div>
  </form>
</body>
</html>
