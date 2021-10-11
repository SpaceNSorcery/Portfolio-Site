<?php

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "JoJoDigitalNomad@gmail.com";
    $mail->Password = 'NewChapter22!';
    $mail->Port = 8887;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("JoJoDigitalNomad@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Message = $message;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something went wrong: <br>" . $mail->ErrorInfo;   
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}


?>