<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ladytech35@gmail.com';
        $mail->Password = 'kgfrrxxptoxgvvje';
        $mail->SMTPSecure = "tls";
        $mail->Port = '587';

        $mail->setFrom('ladttech35@gmail.com');
        $mail->addAddress('ladytech35@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Message Received From Contact: ' . $name;
        $mail->Body = "Name: $name <br> Email: $email <br> Subject: $subject <br> Message: $message";

        $mail->send();

        header("Location: sent.html");

    }catch(Exception $e){
        echo "Sorry, Message not sent. Try again";
    }
}

?>