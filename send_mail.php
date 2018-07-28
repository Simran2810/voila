<?php
require 'PHPMailer/PHPMailerAutoload.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

$msg = nl2br( "FirstName: " . $fname . "\r\n" . "LastName: " . $lname . "\r\n" . "Email: " . $email . "\r\n" . "Message: " . $message);

//echo $to;
$to1 = '';
$pass = '';
$flag = 0;
$mail = new PHPMailer;
{
    $mail->SMTPDebug = 2;                               // Enable verbose debug output

      $mail->isSMTP();    
   $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
                                 // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'voiladigi@gmail.com';                 // SMTP username
    $mail->Password = 'vinit@123';                           // SMTP password
    $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                      // TCP port to connect to

    $mail->setFrom('voiladigi@gmail.com', 'Simran');
    // $mail->addAddress('@gmail.com');     // Add a recipient
    $mail->addAddress('voiladigi@gmail.com');               // Name is optional
    $mail->addReplyTo('voiladigi@gmail.com');
    $mail->addCC('voiladigi@gmail.com');
    $mail->addBCC('voiladigi@gmail.com');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = $msg;

   if (!$mail->send()) {
        header("location: index.html?connection_failure=mailnotsent". $mail->ErrorInfo);
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header("location: index.html");
        echo "Done with submission";
    }
}
