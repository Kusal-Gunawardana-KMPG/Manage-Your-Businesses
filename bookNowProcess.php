<?php

session_start();
require "connection.php";

if(isset($_SESSION["user"])){

    $pid = $_GET["id"];
    $umail = $_SESSION["user"]["email"];
    $uid = $_SESSION["user"]["id"];

    $array;

    $order_id = uniqid();

    $product_rs = Database::search("SELECT * FROM `service` WHERE `id`='".$pid."'");
    $product_data = $product_rs->fetch_assoc();

        $item = $product_data["title"];
        $amount = $product_data["price"];

        $fname = $_SESSION["user"]["f_name"];
        $lname = $_SESSION["user"]["l_name"];
        $mobile = $_SESSION["user"]["mobile"];

        $array["id"] = $order_id;
        $array["f_name"] = $fname;
        $array["l_name"] = $lname;
        $array["mobile"] = $mobile;
        $array["umail"] = $umail;
        $array["uid"] = $uid;
        $array["item"] = $item;
        $array["amount"] = $amount;

        echo json_encode($array);

    }else{
        echo("1");
    }



?>