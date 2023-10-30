<?php

session_start();
require "connection.php";

if(isset($_SESSION["user"])){

    $order_id = $_POST["o"];
    $pid = $_POST["i"];
    $mail = $_POST["m"];
    $amount = $_POST["a"];
    $qty = $_POST["q"];
    $uid = $_POST["uid"];

    $product_rs = Database::search("SELECT * FROM `service` WHERE `id`='".$pid."'");
    $product_data = $product_rs->fetch_assoc();

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`status`,`service_id`,`user_id`) VALUES 
    ('".$order_id."','".$date."','".$amount."','0','".$pid."','".$uid."')");

    echo ("1");

}
