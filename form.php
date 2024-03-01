<?php
    $fullName = "";
    $flag = 0;
    $trimmed = "";
    $namePattern = '/^[a-zA-Z]+$/';
    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST' && isset ($_POST['Submit'])) {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $fullName = $fName." ".$lName;
        $trimmed = preg_replace ($namePattern, " ", $fullName);
        if (preg_match ($namePattern,$fName) && preg_match ($namePattern,$lName)) {
            $flag = 1;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <div>
    <form method = "post" action = "form.php">
        <label for = "firstname">First Name</label>
        <input type = "text" id = "fName" name = "fName" placeholder = "Your name.." maxlength = "20">
        <label for = "lastname">Last Name</label>
        <input type = "text" id = "lName" name = "lName" placeholder = "Your last name.." maxlength = "20">
        <label for = "fullname">Full Name</label>
        <input type = "text" id = "full" name = "fullName"  disabled>
        <input type = "submit" name = "Submit">
    </form>
    <p class="check">
    <?php
        if (isset($_POST['Submit'])) {
            $maxLength = 20;
            if (strlen($fName) > $maxLength || strlen($lName) > $maxLength) {
                echo "limit exceeds";
                return 0;
                }
                if ($flag == 1) {
                    echo "Hello " . $fullName;
                }
                else {
                    echo "first name and last name should be contain only alphabets";
                }
        }
    ?>
    </p> 
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
