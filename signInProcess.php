<?php
session_start();
require "connection.php";

$email = $_POST["signin-email"];
$password = $_POST["signin-password"];
$rememberme = $_POST["signin-rememberme"];

if(empty($email)){
    echo ("Enter Your Email First...!!!");
}else if(strlen($email) > 100){
    echo ("Email Must Have Less than 100 Characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email");
}else if(empty($password)){
    echo ("Please Enter Your Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Invalid Password");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND 
    `password`='".$password."'");
    $n = $rs->num_rows;

    if($n == 1){

        echo ("Success");
        $d = $rs->fetch_assoc();
        $_SESSION["user"] = $d;

        if($rememberme == "checked"){

            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$password,time()+(60*60*24*365));

        }else{

            setcookie("email","",-1);
            setcookie("password","",-1);

        }


    }else{

        echo ("Invalid Username or Password");

    }

     
}

?>