<?php
    session_start();
    if (!isset($_SESSION['uname'])) {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="./CSS/style.css">
</head>
<body>
    <div class="container">
        <h1>
            Question 5
        </h1>
        <p>
            Add a new single text field to the above form that will accept email id. Do not use email id input field type.
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
