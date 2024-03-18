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
  <div class="container">
    <h1>
      Question 3
    </h1>
    <p>
      Add a text area to the above form and accept marks of different subjects in the format, English|80. One subject in each line. Once values entered and submitted, accept them to display the values in the form of a table.
    </p>
    <a href="logout.php" class="logout">
      Log out
    </a>
    <a href="welcome.php" class="home">
      Home Page
    </a>
  </div>
</body>
</html>
