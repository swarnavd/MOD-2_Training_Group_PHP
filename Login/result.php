<?php
require __DIR__ .  '/../vendor/autoload.php';
require './formvalidation.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();
$apiKey = $_ENV["apiKey"];
$errorArray = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/landing-style.css">
</head>
<body>
  <div>
    <p class="check">
      <?php
      if (isset($_POST['Submit'])) {
        $maxLength = 20;

        if (strlen($fName) > $maxLength || strlen($lName) > $maxLength) {
          array_push($errorArray, "Limit exceeds");
        }
        if (!$val->nameValidaion()) {
          $nameErr = "Name error exist in your submission.";
          array_push($errorArray, $nameErr);
        }
        if (!$val->phoneValidation()) {
          $phError = "Error exists in Phone number format";
          array_push($errorArray, $phError);
        }
        if (!$val->imageValidation()) {
          $imgError = "Error exists in picture format";
          array_push($errorArray, $imgError);
        }
        if (!$val->mailValidation($apiKey)) {
          $mailError = "Error exists in mail format";
          array_push($errorArray, $mailError);
        }
      }
      ?>
    </p>
    <?php if (isset($_POST['Submit'])) : ?>
      <?php if (count($errorArray) == 0) : ?>
        <?php $t = '../uploads/' . $_FILES['image']['name']; ?>

        <p class="green">Hello <?= $val->fullName ?></p>
        <img src="<?php if (isset($_POST['Submit'])) {
                    echo $t;
                  } ?>" class="myimg">
        <table border='1'>
          <tr>
            <th>Subject</th>
            <th>Marks</th>
          </tr>
          <?php
          if (isset($_POST['Submit'])) : ?>
            <?php if ($val->reportValidation()) : ?>
              <?php foreach ($val->tabledata as $x) : ?>
                <tr class="green">
                  <td> <?= $x[0] ?> </td>
                  <td> <?= $x[1] ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          <?php endif; ?>
        <p class="green">Number format is valid.</p>
        <p class="green">Email id is valid.</p>
        <?php else:?>
        <h1>ERROR!</h1>
        <ul>
          <?php for ($x = 0; $x < count($errorArray); $x++) : ?>
            <li class="red"><?= $errorArray[$x] ?></li>
          <?php endfor; ?>
        </ul>
      <?php endif; ?>
      <?php endif;?>
  </div>
</body>
</html>
