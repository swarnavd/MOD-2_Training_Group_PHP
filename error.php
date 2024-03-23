<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
  <div>
    <h1>ERROR!</h1>
    <ul>
      <?php
      // Prints error messages in list format.
      for ($x = 0; $x < count($errorArray); $x++) {
      ?>
        <li class="red"><?= $errorArray[$x] ?></li>
      <?php
      }
      ?>
    </ul>
  </div>
</body>
</html>