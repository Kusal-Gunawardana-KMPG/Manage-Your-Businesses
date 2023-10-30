<?php

session_start();

require "connection.php";

$user_id = $_SESSION["user"]["id"];
$pid = $_GET["id"];

$product_rs = Database::search("SELECT * FROM `service` WHERE `id`='".$pid."' AND `user_id`='".$user_id."'");
$product_num = $product_rs->num_rows;

if($product_num == 1){

    $product_data = $product_rs->fetch_assoc();
    $_SESSION["s"] = $product_data;

    echo ("success");

}else{
    echo ("Something Went Wrong . Please try Again Later.");
}

?>