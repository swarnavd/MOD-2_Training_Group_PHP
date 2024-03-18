
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2</title>
    <link rel = "stylesheet" href="./CSS/style.css">
</head>
<body>
    
    <div>
    <?php
    if (isset($_GET['message'])) {
        echo $_GET['message'];
    }
    ?>
      <form method = "post" action="mailSend.php">
          Enter your mail:<input type = "text" name="email" placeholder="enter recipient's email"><br>
          <input type="submit" name="submit" value="submit">
      </form>
    </div>
</body>
</html>
