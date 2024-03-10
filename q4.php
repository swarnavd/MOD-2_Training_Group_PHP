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
            Question 4
        </h1>
        <p>
            Add a new text field to the above form to accept the phone number from the user. The number will belong to an Indian user. So, the number should begin with +91 and not be more than 10 digits.
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
