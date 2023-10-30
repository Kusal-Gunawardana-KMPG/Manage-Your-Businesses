<?php

session_start();
require "connection.php";

if(isset($_SESSION["user"])){
    if(isset($_GET["id"])){

        $email = $_SESSION["user"]["email"];
        $id = $_SESSION["user"]["id"];
        $pid = $_GET["id"];

        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `service_id`='".$pid."' AND 
        `user_id`='".$id."'");
        $watchlist_num = $watchlist_rs->num_rows;

        if($watchlist_num == 1){
            $watchlist_data = $watchlist_rs->fetch_assoc();
            $list_id = $watchlist_data["id"];

            Database::iud("DELETE FROM `watchlist` WHERE `id`='".$list_id."'");
            echo ("removed");
        }else{
            Database::iud("INSERT INTO `watchlist`(`service_id`,`user_id`) VALUES ('".$pid."','".$id."')");
            echo ("added");
        }

    }else{
        echo ("Somethng went wrong. Please try again later.");
    }

}else{
    echo ("please Login First");
}

?>