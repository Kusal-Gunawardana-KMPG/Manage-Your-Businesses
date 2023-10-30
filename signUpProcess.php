<?php

require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];

if (empty($fname)) {
    echo ("Please Enter Your First Name...!");
} else if (strlen($fname) > 50) {
    echo ("First Name Must Have LESS THAN 50 Characters...!");
}else if (empty($lname)) {
    echo ("Please Enter Your Last Name...!");
} else if (strlen($lname) > 50) {
    echo ("Last Name Must Have LESS THAN 50 Characters...!");
}else if(empty($email)){
    echo("Please Enter Your Email Address...!");
}else if(strlen($email)>100){
    echo ("Email Must Have LESS THAN 100 Characters...!");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email Address...!");
}else if(empty($password)){
    echo ("First Enter Your Password...!");
}else if(strlen($password)<5 || strlen($password)>20){
    echo ("Password Length Must Be Between 5 & 20...!");
}else if(empty($mobile)){
    echo ("Please Enter Your Mobile Number...!");
}else if(strlen($mobile) != 10){
    echo ("Mobile Number Must Contain 10 Characters");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo ("Invalid Mobile Number...!");
}else{

$rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR 
`mobile`='".$mobile."'");
$n = $rs->num_rows;

if($n > 0){
    echo ("User With the Same Email or Mobile Already Exists, Just Sign In....");
}else{

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `user` 
    (`f_name`,`l_name`,`email`,`password`,`mobile`,`register_date`,`status`,`gender`)
    VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$mobile."',
    '".$date."','1','".$gender."')");

    echo ("Success");

}
    
}

?>