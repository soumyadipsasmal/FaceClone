<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

      //Load Composer's autoloader
    require 'vendor/autoload.php';
    

function emailSend($to=null,$subject=null,$message=null){
    // echo $to;
    // exit();
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'omprakashbhagat1995@gmail.com';                     //SMTP username
    $mail->Password   = 'zclzlrcxlltamooj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sd5831017@gmail.com', 'Mailer');
    //$mail->addAddress('omprakashbhagat1995@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress($to);     //Add a recipient

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
}