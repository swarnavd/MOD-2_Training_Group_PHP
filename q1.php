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
            Question 1
        </h1>
        <p>
            Create a form with below fields:
                First Name - User will input only alphabets
                Last Name - User will input only alphabets
                Full name: User cannot enter a value in Full name field. It will be disabled by default. When the first name and last name fields are filled, this field outputs the sum of the above 2 fields.
                Submit Button
                On submit, the form gets submitted and the page will reload
                Hello [full-name]” will appear on the page
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
