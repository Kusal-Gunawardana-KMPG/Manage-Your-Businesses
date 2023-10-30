<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST["e"])){
    $email = $_POST["e"];
    $password = $_POST["p"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."' AND `password`='".$password."'");
    $admin_num = $admin_rs->num_rows;

    if($admin_num > 0){

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `verification_code`='".$code."' WHERE `email`='".$email."' AND `password`='".$password."'");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kgunawardana942@gmail.com';
            $mail->Password = 'rnzmtcegtxlgpzuz';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kgunawardana942@gmail.com', 'Admin Verification ');
            $mail->addReplyTo('kgunawardana942@gmail.com', 'Admin Verification ');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Bzness Guide Admin Verification Code';
            $bodyContent = '<h1 style="color:blue;">Your verification code is <b style="color:maroon;">'.$code.'</b></h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification Code Sending Failed';
            } else {
                echo 'Success';
            }

    }else{
        echo ("You are not a valid user");
    }

}else{
    echo ("Email field & Password field Should Not Be Empty.");
}

?>