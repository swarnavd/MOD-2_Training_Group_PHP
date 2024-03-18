<?php
session_start();
if (!isset($_SESSION['flag'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
  <div class = "container">
    <h1>
      Question 2
    </h1>
    <p>
      Add a new field to accept user image in addition to the above fields. On submit store the image in the backend and display it with the full name below it.
    </p>
    <a href = "logout.php" class = "logout">
      Log out
    </a>
    <a href = "welcome.php" class = "home">
      Home Page
    </a>
  </div>
</body>
</html>
