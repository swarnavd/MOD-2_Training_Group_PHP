<?php
    use Fpdf\Fpdf;
    require 'vendor/autoload.php';
    $pdf = new Fpdf();
    $pdf -> AddPage();
    $pdf -> SetFont('Arial', 'B', 18);
    $pdf -> Cell(80);
    $pdf -> Cell(20, 10, 'Report Card', 0, 1, 'C');

    $fullName = "";
    $namePattern = '/^[a-zA-Z]+$/';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $fullName = $fName . " " . $lName;

        $phoneNumber = $_POST['phoneNumber'];
        $numberPattern = "/^\+91\s?\d{10}$/";
        $phFlag = 0;
        if (preg_match($numberPattern, $phoneNumber)) {
            $phFlag = 1;
        }
        if (!$phFlag){
            echo "Wrong phone number.";
        }

        $email = $_POST['email'];
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, 'https://emailvalidation.abstractapi.com/v1/?api_key=74ee25cc702b416fb45384394734e747&email=' . $email);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        if (isset($_POST['Submit'])) {
            if (!$data['is_smtp_valid'] && !$data['is_valid_format']) {
                echo "Email is not valid.";
            } 
        }

        $subject = $_POST['marks'];
        $subjectPattern = "/^[A-Za-z]+$/";
        $marksPattern = "/^[0-9\s]+$/";
        $subjectArray = preg_split('~\R+~', $subject);
            
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
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize > 50000000) {
                    echo "file is too big";
                }
                else {
                    $newFile = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination='uploads/' . $newFile;
                    move_uploaded_file($fileTmpName, $fileDestination);
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
            
    
    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(30,20,"FULL NAME : $fullName",0,0,'c');
    
    $pdf -> Ln();

    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(40, 20, "PHONE NUMBER : $phoneNumber", 0, 0, 'c');

    $pdf -> Ln();

    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(30, 30, "EMAIL : $email", 0, 0, 'c');

    $pdf -> Ln();

    $pdf -> Cell(90, 10, 'Subject', 1, 0, 'C');
    $pdf -> Cell(90, 10, 'Marks', 1, 0, 'C');
    $pdf -> Ln();

    foreach ($subjectArray as $x) {
        $subjectMarks = explode('|', $x);
        $subjectActual = current($subjectMarks);
        $marksActual = end($subjectMarks);{
        if (!preg_match($subjectPattern, $subjectActual)) {
                echo "Subject Pattern not matched";
        }
        elseif (!preg_match($marksPattern, $marksActual)) {
                echo "Marks pattern not matched.";
        }
        $pdf -> Cell(90, 6, "$subjectActual", 1, 0, 'C');
        $pdf -> Cell(90, 6, "$marksActual", 1, 0, 'C');
        $pdf -> Ln();
        }   
    }
    $pdf->Image($fileTmpName, 140, 20, 50, 0,'jpeg');
    $pdf->Output('F','report.pdf');
    $pdf->Output('D','report.pdf');
?>
