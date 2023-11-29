<?php

require_once 'mail.php';

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];


if(empty($_POST["name"]) ||  empty($_POST["email"] || empty($_POST["message"]))){
    echo "please enter ur information";
}else if(!preg_match("/[A-Za-z\s]/", $message)){
    echo "name invalid";
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "email invalid";
}else if(strlen($message)<30){
    echo "it must contain more than 30 car";
}
else{
    $mail->setFrom($email, $message);
    $mail->addAddress('yassinelouissi67@gmail.com', 'test');

    $mail->Subject = 'Here is the subject';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location:contact.php");
}   