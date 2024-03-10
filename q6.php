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
            Question 6
        </h1>
        <p>
            When the user submits the above form, 2 copies of the data will get created in a doc format. One will store on the server and the other will be downloaded to the user submitting the data. The information in the doc should be presented in a well-defined manner.
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
