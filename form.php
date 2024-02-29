<?php
    $full_name = "";
    $flag = 0;
    $trimmed = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $full_name = $fname." ".$lname;
        $trimmed = preg_replace("/[^a-zA-Z]+/", " ", $full_name);
        if (preg_match('/^[a-zA-Z]+$/',$fname) && preg_match('/^[a-zA-Z]+$/',$lname)) {
            $flag = 1;
        }
        else {
            $flag = 0;
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
    <form method = "post" action = "form.php" enctype = "multipart/form-data">
        <label for = "firstname">First Name</label>
        <input type = "text" id = "fname" name = "fname" placeholder = "Your name.." maxlength = "20">
        <label for = "lastname">Last Name</label>
        <input type = "text" id = "lname" name = "lname" placeholder = "Your last name.." maxlength = "20">
        <label for = "fullname">Full Name</label>
        <input type = "text" id = "full" name = "fullname"  disabled>
        <input type = "submit" name = "Submit">
    </form>
    <?php
        if (isset($_POST['Submit'])) {
            $maxLength = 20;
            if (strlen($fname) > $maxLength || strlen($lname) > $maxLength) {
                echo "limit exceeds";
                return 0;
                }
                if ($flag == 1) {
                    echo "Hello " . $full_name;
                }
                else {
                    echo "first name and last name should be contain only alphabets";
                }
        }
    ?>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
