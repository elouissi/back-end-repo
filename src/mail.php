
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


$mail = new PHPMailer(true);

//Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
$mail->isSMTP();                                          //Send using SMTP
$mail->Host = 'smtp.gmail.com';                           //Set the SMTP server to send through
$mail->SMTPAuth = true;                                   //Enable SMTP authentication
$mail->Username = 'yassinelouissi67@gmail.com';          //SMTP username
$mail->Password = 'fezt twjq vpwg atwg';                  //SMTP password
$mail->SMTPSecure = 'ssl';                                //Enable implicit TLS encryption
$mail->Port = 465;                                        //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

$mail->isHTML(true);



