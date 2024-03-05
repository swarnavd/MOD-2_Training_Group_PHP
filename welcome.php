<?php
    session_start();
    $uname = "swarnav";
    $psw = "admin";
    if (isset($_POST['Submit'])) {
        if ($_POST['uname'] == $uname && $_POST['psw'] == $psw) {
            $_SESSION['uname'] = $uname;
        }
        else {
                header('location:login.php');
        }
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <div class="welcome">
        <h1 class="greet">
            <?php
                if(isset($_SESSION['uname'])) {
                    echo "Welcome " . $_SESSION['uname'];
            ?>    
        </h1>
                    <div class="questions">
                        <a href="q1.php">Question 1</a>
                        <a href="q2.php">Question 2</a>
                        <a href="q3.php">Question 3</a>
                        <a href="q4.php">Question 4</a>
                        <a href="q5.php">Question 5</a>
                        <a href="q6.php">Question 6</a>
                    </div>
            <?php
                }
            ?>
        <div class="logout-div">
        <a href="logout.php" class="logout">
          Log out
        </a>
        </div>
        
    </div>
    
    
    
</body>
</html>