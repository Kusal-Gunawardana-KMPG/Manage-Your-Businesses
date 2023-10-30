<?php

session_start();
require "connection.php";

$id = $_SESSION["user"]["id"];

$servicecategory = $_POST["servicecategory"];
$servicetitle = $_POST["servicetitle"];
$servicetype = $_POST["servicetype"];
$servicecost = $_POST["servicecost"];
$servicedesc = $_POST["servicedesc"];
$servicemobile = $_POST["servicemobile"];


if(empty($servicetitle)){
    echo ("Please Select Your Service Title");
}else if(strlen($servicetitle) >= 200){
    echo ("Title Should Have Less Than 200 Characters");
}else if(empty($servicemobile)){
    echo ("Please Add Your Service Mobile Number");
}else if(strlen($servicemobile) != 10){
    echo ("Mobile Number must contain 10 characters");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$servicemobile)){
    echo ("Invalid Mobile Number!");
 }else if($servicecategory == "0"){
        echo ("Please Select Your Service Category");
}else if ($servicetype == "0"){
    echo ("Please Select Your Service Type");
}else if(empty($servicecost)){
    echo ("Please Select Your Service Cost");
}else if(!is_numeric($servicecost)){
    echo ("Please Select a Numeric Value For Your Service Cost");
}else if(empty($servicedesc)){
    echo ("Please Add Your Service Description");
}else{
    

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `service` (`price`,`description`,`title`,`datetime_added`,`category_id`,`status_id`,`type_id`,`user_id`,`invoice_id`,`mobile`) 
    VALUES ('".$servicecost."','".$servicedesc."','".$servicetitle."','".$date."','".$servicecategory."','".$status."','".$servicetype."','".$id."','0','".$servicemobile."')");

    echo ("| Your New Service Added to the DataBase Successfully |");

    $service_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    if($length <= 3 && $length > 0){

        $allowed_image_extentions = array("image/jpg","image/jpeg","image/png","image/svg+xml");

        for($x = 0;$x < $length;$x++){
            if(isset($_FILES["image".$x])){

                $image_file = $_FILES["image".$x];
                $file_extention = $image_file["type"];

                if(in_array($file_extention,$allowed_image_extentions)){

                    $new_img_extention;

                    if($file_extention =="image/jpg"){
                        $new_img_extention = ".jpg";
                    }else if($file_extention =="image/jpeg"){
                        $new_img_extention = ".jpeg";
                    }else if($file_extention =="image/png"){
                        $new_img_extention = ".png";
                    }else if($file_extention =="image/svg+xml"){
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resources//service_images//".$servicetitle."_".$x."_".uniqid().$new_img_extention;
                    move_uploaded_file($image_file["tmp_name"],$file_name);

                    Database::iud("INSERT INTO `image`(`code`,`service_id`) VALUES ('".$file_name."','".$service_id."')");

            
                    
                }else{
                    echo ("Please Insert Valid Images as Your Service Images");
                }

            }
        }

       

    }else{
        echo (" You Can Only add 3 Images");
    }

}

?>