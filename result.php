<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();
$apiKey = $_ENV["apiKey"];

// Declaring array for storing error messages in array format.
$errorArray = [];
$fullName = "";
$trimmed = "";
// Storing regex for checking.
$namePattern = '/^[a-zA-Z]+$/';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $fullName = $fName . " " . $lName;
  $trimmed = preg_replace($namePattern, " ", $fullName);

  $fileDestination = "";
  $file = $_FILES['image'];
  $fileName = $_FILES['image']['name'];
  $fileType = $_FILES['image']['type'];
  $fileError = $_FILES['image']['error'];
  $fileTmpName = $_FILES['image']['tmp_name'];
  $fileSize = $_FILES['image']['size'];
  $allowed = array('jpg', 'jpeg', 'png');
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  // Checking if the extension matches with permitted extensions.
  if (in_array($fileActualExt, $allowed)) {
    // If there is no error in file.
    if (!$fileError) {
      // If file size is in defined range.
      if ($fileSize > 50000000) {
        echo "file is too big";
      } 
      else {
        // Creating new file name with extension.
        $newFile = uniqid('', TRUE) . "." . $fileActualExt;
        // Destination of file sets here.
        $fileDestination = 'uploads/' . $newFile;
        // File is being moved from temporary location to actual location.
        move_uploaded_file($fileTmpName, $fileDestination);
      }
    }
  }
  // If file contains any error then it push the error message to the array.
  else {
    array_push($errorArray, "Error exists in your image.");
  }
  // Storing phone number from input field. 
  $phoneNumber = $_POST['phoneNumber'];
  // Regex for checking the number right or not.
  $numberPattern = "/^\+91\s?\d{10}$/";
  if (preg_match($numberPattern, $phoneNumber)) {
    $phFlag = 1;
  }

  // Storing the marks and subject from input field.
  $subject = $_POST['marks'];
  $subjectPattern = "/^[A-Za-z]+$/";
  $marksPattern = "/^[0-9\s]+$/";

  // Splitting the whole array based on line breaks occur or not.
  $subjectArray = preg_split('~\R+~', $subject);
  // Storing email address from input field.
  $email = $_POST['email'];
  // Initializing Curl session.
  $ch = curl_init();
  // Setting option and value.
  curl_setopt($ch, CURLOPT_URL, 'https://emailvalidation.abstractapi.com/v1/?api_key=' . $apiKey .'&email=' . $email);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $response = curl_exec($ch);
  // Closing session of curl.
  curl_close($ch);
  // Decoding JSON data in array format.
  $data = json_decode($response, true);    
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
  <div>
    <p class="check">
      <?php
      // This whole block checks if there is any error in input data.
      if (isset($_POST['Submit'])) {
        $maxLength = 20;
        // If numbers of character exceeds from predefined array length.
        if (strlen($fName) > $maxLength || strlen($lName) > $maxLength) {
          array_push($errorArray, "Limit exceeds");
        }
        // If first name or last name contains other than alphabets.
        if (!preg_match($namePattern, $fName) || !preg_match($namePattern, $lName)) {
          $nameErr = "Name error exist in your submission.";
          array_push($errorArray, $nameErr);
        }
        // If phone number doesn't follow the indian valid format.
        if (!$phFlag) {
          $phError = "Error exists in Phone number format";
          array_push($errorArray, $phError);
        }
        if ($data['deliverability'] == 'UNKNOWN' || !$data['is_valid_format'] || !$data['is_disposable_email']) {
          array_push($errorArray,"Email address is not valid");
        } 
        // Checks if subeject and marks follows the predefined pattern or not.
        foreach ($subjectArray as $x) {
          $subjectMarks = explode('|', $x);
          $subjectActual = current($subjectMarks);
          $marksActual = end($subjectMarks);
          if (!preg_match($subjectPattern, $subjectActual) || (!preg_match($marksPattern, $marksActual))) {
            $reportErr = "Error exists in marks or subject format";
            // If format of inputing data is wrong then push a error message in error message array.
            array_push($errorArray, $reportErr);
          }
          
        }
      }
      ?>
    </p>
    <?php
    if (isset($_POST['Submit'])) {
      // If error message array's length is zero then it contains no error and displays the data to users.
      if (count($errorArray) == 0) {
    ?>
        <p class = "green">Hello <?= $fullName ?></p>
        <img src = "<?php if (isset($_POST['Submit'])) {
                    echo $fileDestination;
                  } ?>" class="myimg">
        <table border = '1'>
          <tr>
            <th>Subject</th>
            <th>Marks</th>
          </tr>
          <?php
          if (isset($_POST['Submit'])) {
            // Prints the subject and marks in table format.
            foreach ($subjectArray as $x) {
              $subjectMarks = explode('|', $x);
              $subjectActual = current($subjectMarks);
              $marksActual = end($subjectMarks);
          ?>
              <tr class = "green">
                <td> <?= $subjectActual ?> </td>
                <td> <?= $marksActual ?></td>
              </tr>
            <?php
            }
            ?>
            <p class = "green">Number format is valid.</p>
            <p class = "green">Email id is valid.</p>
          <?php
          }
        } 
        // If length of errorArray is more than 0 then there is error in input data so it shows only specific error messages.
        else {
          ?>
          <h1>ERROR!</h1>
          <ul>
            <?php
            // Prints error messages in list format.
            for ($x = 0; $x < count($errorArray); $x++) {
            ?>
              <li class = "red"><?= $errorArray[$x] ?></li>
            <?php
            }
            ?>
          </ul>
      <?php
        }
      }
      ?>
  </div>
</body>
</html>
