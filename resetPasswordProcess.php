<?php

require "connection.php";

$email = $_POST["e"];
$np = $_POST["n"];
$rnp = $_POST["r"];
$vcode = $_POST["v"];

if(empty($email)){
    echo ("Email Field Should Not Be Empty");
}else if(empty ($np)){
    echo ("Please Enter Your New Password");
}else if(strlen($np) < 5 || strlen($np) > 20){
    echo ("New Password Length Must Be Between 5 and 20");
}else if(empty($rnp)){
    echo ("Please Retype your New Password");
}else if($np != $rnp){
    echo ("Passwords Does Not Matched");
}else if(empty($vcode)){
    echo ("Please Enter Your Verification Code");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE 
    `email`='".$email."' AND `verification_code`='".$vcode."'");
    $n = $rs->num_rows;

    if($n == 1){

        Database::iud("UPDATE `user` SET `password`='".$np."' WHERE 
        `email`='".$email."'");
        echo ("Success");

    }else{

        echo ("Invalid Email or Verification Code, Please try again");

    }

}

?>