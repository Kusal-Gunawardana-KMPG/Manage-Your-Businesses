<?php

session_start();
require "connection.php";

if(isset($_SESSION["s"])){

    $pid = $_SESSION["s"]["id"];

    $title = $_POST["t"];
    $mobile = $_POST["m"];
    $description = $_POST["d"];

    Database::iud("UPDATE `service` SET `title`='".$title."',`mobile`='".$mobile."',`description`='".$description."' WHERE `id`='".$pid."'");

    echo ("Service has Been Updated! ");

    Database::iud("DELETE FROM `image` WHERE `service_id`='".$pid."'");

    $length = sizeof($_FILES);
    $allowed_img_extentions = array("image/jpg","image/jpeg","image/png","image/svg+xml");

    if($length <= 3 && $length > 0){

        for($x = 0;$x < $length;$x++){
            if(isset($_FILES["i".$x])){

                $img_file = $_FILES["i".$x];
                $file_extention = $img_file["type"];

                if(in_array($file_extention,$allowed_img_extentions)){

                    $new_file_extention;

                    if($file_extention == "image/jpg"){
                        $new_file_extention = ".jpg";
                    }else if($file_extention == "image/jpeg"){
                        $new_file_extention = ".jpeg";
                    }else if($file_extention == "image/png"){
                        $new_file_extention = ".png";
                    }else if($file_extention == "image/svg+xml"){
                        $new_file_extention = ".svg";
                    }

                    $file_name = "resources//service_images//".$title."_".$x."_".uniqid().$new_file_extention;
                    move_uploaded_file($img_file["tmp_name"],$file_name);

                    Database::iud("INSERT INTO `image`(`code`,`service_id`) VALUES ('".$file_name."','".$pid."')");
                    echo ("| Success |");

                }else{
                    echo ("Invalid image type");
                }

            }
        }

    }else{
        echo ("Invalid Image Count!");
    }

}

?>