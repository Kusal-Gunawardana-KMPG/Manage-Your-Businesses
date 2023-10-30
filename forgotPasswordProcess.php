<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];
    
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");
        
        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kgunawardana942@gmail.com';
            $mail->Password = 'rnzmtcegtxlgpzuz';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kgunawardana942@gmail.com', 'Reset Password');
            $mail->addReplyTo('kgunawardana942@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = ' "Bzness Guide" Verification Code to Recover Your Password';
            $bodyContent = '<h1 style="color:gray;">Your verification code is <b style="font-weight:bold;color:maroon;">'.$code.'</b></h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification Code Sending Failed';
            } else {
                echo 'Success';
            }

    }else{
        echo ("Invalid Email Address");
    }

}

?>