<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "resources/profile_img/" . $_SESSION["user"]["f_name"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE 
            `user_id`='" . $_SESSION["user"]["id"] . "'");
            $image_num = $image_rs->num_rows;

            if ($image_num == 1) {

                Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE 
                `user_id`='" . $_SESSION["user"]["id"] . "'");
            } else {

                Database::iud("INSERT INTO `profile_image` (`path`,`user_id`) VALUES 
                ('" . $file_name . "','" . $_SESSION["user"]["id"] . "')");
            }
        }
    }

    Database::iud("UPDATE `user` SET `f_name`='" . $fname . "',`l_name`='" . $lname . "',`mobile`='" . $mobile . "' 
            WHERE `id`='" . $_SESSION["user"]["id"] . "'");


    echo ("success");
    
} else {
    echo ("Please Login First");
}
