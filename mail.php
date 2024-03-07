<?php
  require 'validation.php';
  require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  use Dotenv\Dotenv;
  $dotenv = Dotenv::createImmutable(__DIR__);
  $dotenv -> load();
  // Storing the user name and password from .env file.
  $user = $_ENV["username"];
  $psw = $_ENV["password"];
  // Checking the email format.
  if (!$ob->valid($_POST['email'])) {
    echo "Invalid email format.";
  }
  else {
    if (isset($_POST['submit'])) {
      // Creating a object of PHPMailer class.
      $mail = new PHPMailer(TRUE);
      try {                                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                             
        $mail->Username   = $user;                 
        $mail->Password   = $psw;                        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                              
        $mail->Port       = 465;  
        // Adding sender's email address.
        $mail->setFrom($user); 
        // Adding email address of recipient's mail.          
        $mail->addAddress($_POST['email']);
        
        $mail->isHTML(true);                                  
        $mail->Subject = 'Subject ' . $i;
        $mail->Body    = 'Assignment 2 ';
        $mail->AltBody = "Thank you for your submission";
        // Sending email.
        $mail->send();
        echo "Mail has been sent successfully!";
        
    } 
    // Exception handling done here.
    catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
    }
  }

  }
  ?>
