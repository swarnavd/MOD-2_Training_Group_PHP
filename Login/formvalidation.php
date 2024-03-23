<?php
require __DIR__ .  '/../vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();
$apiKey = $_ENV["apiKey"];
/**
 * A class to check validation of all field of the form which will come after
 * login.
 */
class formvalidation {
  /**
   * Array to store subject and marks.
   *
   * @var array $tabledata
   */
  public $tabledata = [];
  /**
   * Variable to store fullname.
   *
   * @var string $fullName
   */
  public $fullName = "";
  /**
   * Variable to store the marks.
   *
   * @var int $marksActual
   */
  public $marksActual = "";
  /**
   * Variable to store the subject name.
   *
   * @var string $subjectActual
   */
  public $fName;
  public $lName;
  public $subjectActual = "";
  public $fileDestination = "hello";
  /**
   * A variable to store the marks of individual subject.
   *
   * @var array $subjectMarks
   */
  public $subjectMarks = "";
  /**
   * A function to check if first name or last name contains any character other
   *  than alphabets.
   *
   * @return bool
   */
  function nameValidaion() {
    $namePattern = '/^[a-zA-Z]+$/';
    $this->fName = $_POST['fName'];
    $this->lName = $_POST['lName'];
    $this->fullName = $this->fName . " " . $this->lName;
    if (!preg_match($namePattern, $this->fName) || !preg_match($namePattern, $this->lName)) {
        return FALSE;
    }
    else {
        return TRUE;
    }
  }
/**
 * A function to validate that if the image file uploaded properly or not.
 *
 * @return bool
 */
  public function imageValidation() {
    $fileDestination = "";
    $fileName = $_FILES['image']['name'];
    $fileError = $_FILES['image']['error'];
    $fileTmpName = $_FILES['image']['tmp_name'];

    $allowed = array('jpg', 'jpeg', 'png');
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if (in_array($fileActualExt, $allowed)) {
      if (!$fileError) {
        $fileDestination =  '../uploads/' . $_FILES['image']['name'];
        move_uploaded_file($fileTmpName, $fileDestination);
      }
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
/**
 * A function to validate that if the number starts with +91.
 *
 * @return bool
 */
  public function phoneValidation() {
    $phoneNumber = $_POST['phoneNumber'];
    $numberPattern = "/^\+91\s?\d{10}$/";
    if (preg_match($numberPattern, $phoneNumber)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
/**
 * A function to validate the email with api.
 *
 * @param string $apiKey
 * @return void
 */
  public function mailValidation($apiKey) {
    $email = $_POST['email'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://emailvalidation.abstractapi.com/v1/?api_key=' . $apiKey . '&email=' . $email);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    // if ($data['deliverability'] == 'DELIVERABLE' || $data['is_valid_format'] || !$data['is_disposable_email']) {
    //   return true;
    // }
    // else {
      return TRUE;
    // }
  }
/**
 * A function to validate that if subject or marks format is is proper pattern
 * or not.
 *
 * @return bool
 */
  public function reportValidation() {
    $subject = $_POST['marks'];
    $subjectPattern = "/^[A-Za-z]+$/";
    $marksPattern = "/^[0-9\s]+$/";
    $subjectArray = preg_split('~\R+~', $subject);
    foreach ($subjectArray as $x) {
      $this->subjectMarks = explode('|', $x);
      $this->subjectActual = current($this->subjectMarks);
      $this->marksActual = end($this->subjectMarks);
      if (!preg_match($subjectPattern, $this->subjectActual) || (!preg_match($marksPattern, $this->marksActual))) {
        return FALSE;
      }
      else {
        $tid = [$this->subjectActual, $this->marksActual];
        array_push($this->tabledata, $tid);
      }
    }
    return TRUE;
  }
}
$val = new formvalidation();
?>

