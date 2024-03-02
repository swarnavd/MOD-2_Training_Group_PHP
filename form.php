<?php
    $fullName = "";
    $flag = 0;
    $trimmed = "";
    $namePattern = '/^[a-zA-Z]+$/';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $fullName = $fName." ".$lName;
        $trimmed = preg_replace($namePattern, " ", $fullName);
        if (preg_match($namePattern,$fName) && preg_match($namePattern,$lName)) {
            $flag = 1;
        }
    }
?>
<?php
    if(isset($_POST['Submit'])){
        $fileDestination = "";
        $file = $_FILES['image'];
        $fileName = $_FILES['image']['name'];
        $fileType = $_FILES['image']['type'];
        $fileError = $_FILES['image']['error'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $allowed = array('jpg','jpeg','png');
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        if (in_array($fileActualExt,$allowed)) {
            if ($fileError===0) {
                if ($fileSize>50000000) {
                    echo "file is too big";
                }
                else {
                    $newFile=uniqid('',true).".".$fileActualExt;
                    $fileDestination='uploads/'.$newFile;
                    move_uploaded_file($fileTmpName,$fileDestination);
                }
            }
            else {
                    echo "There is a error in your image";
            }
        }
        else {
                echo "<br>Your image doesnt match with permitted extension";
        }
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
        $phoneNumber = $_POST['phoneNumber'];
        $numberPattern="/^\+91\s?\d{10}$/";
        $phFlag=0;
        if (preg_match($numberPattern,$phoneNumber)) {
            $phFlag=1;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel = "stylesheet" href = "./CSS/style.css">
</head>
<body>
    <div>
        <form method = "post" action = "form.php" enctype = "multipart/form-data">
            <label for = "firstname">First Name</label>
            <input type = "text" id = "fName" name = "fName" placeholder = "Your name.." maxlength = "20">
            <label for = "lastname">Last Name</label>
            <input type = "text" id = "lName" name = "lName" placeholder = "Your last name.." maxlength = "20">
            <label for = "fullname">Full Name</label>
            <input type = "text" id = "full" name = "fullName"  disabled>
            <label for = "image">Upload a image</label>
            <input type = "file" id = "image" name = "image" accept = "image/*">
            <label for="marks">Enter Marks</label>
            <textarea id="marks" name="marks" rows="4" cols="50" placeholder="SUBJECT|MARKS"></textarea>
            <label for = "phoneNumber">Phone Number</label>
            <input type = "text" id = "phoneNumber" name = "phoneNumber" placeholder = "Enter your phone number(+91)">
            <input type = "submit" name = "Submit">
        </form>
        <img src = "<?php
                    if (isset($_POST['Submit'])) {
                        echo $fileDestination;
                    }
            ?>" class = "myimg">
        <p class = "check">
        <?php
            if (isset($_POST['Submit'])) {
                $maxLength = 20;
                if (strlen($fName) > $maxLength || strlen($lName) > $maxLength) {
                    echo "limit exceeds";
                    return 0;
                    }
                    if ($flag == 1) {
                        echo "Hello " .  $fullName;
                    }
                    else {
                        echo "first name and last name should be contain only alphabets";
                    }
            }
        ?>
        </p>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
            $subject = $_POST['marks'];
            $subjectPattern = "/^[A-Za-z]+$/";
            $marksPattern = "/^[0-9\s]+$/";
            $subjectArray = preg_split('~\R+~', $subject);
            echo "<table border = '1'>
            <tr>
            <th>Subject</th>
            <th>Marks</th>
            </tr>";
            foreach ($subjectArray as $x) {
                $subjectMarks = explode('|', $x);
                $subjectActual = current($subjectMarks);
                $marksActual = end($subjectMarks);
                if (!preg_match($subjectPattern, $subjectActual)) {
                    echo "Subject Pattern not matched";
                }
                elseif (!preg_match ($marksPattern,$marksActual)) {
                    echo "Marks pattern not matched.";
                }
                else {
                    echo "<tr>";
                    echo "<td>" . $subjectActual . "</td>";
                    echo "<td>" . $marksActual . "</td>";
                    echo "</tr>";
                }
            }
        }
        ?> 
        <p class = "numbercheck" >
            <?php
                if (isset($_POST['Submit'])) {
                    if ($phFlag) {
                        echo "Phone number is accepted.";
                    }
                    else {
                        echo "Phone number is not accepted.";
                    }
                }
            ?>
        </p>
    </div>
    <script type="text/javascript" src="./JS/script.js"></script>
</body>
</html>
