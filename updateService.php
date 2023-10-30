<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bzness Guide | Update Service</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="semantic.min.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.7/components/icon.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">



    <link rel="icon" href="resources/Bzness Guide LOGO 02.png" />


</head>


<body class="profile-body">

    <?php


    session_start();
    require "connection.php";
    include "myServicesHeader.php";

    ?>



    <div class="container-fluid">
        <div class="row gy-3">




            <div style="height: 150px;"></div>
            <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
            <div style="height: 100px;" class="d-lg-none d-md-none d-xl-none"></div>


            <?php

            if (isset($_SESSION["user"])) {
                $data = $_SESSION["user"];

                if (isset($_SESSION["s"])) {

                    $product = $_SESSION["s"];

            ?>

                    <div class="col-12">
                        <div class="row">


                            <div class="col-12 text-center">
                                <h2 class="h2  fw-bold" style="color:aqua">Update Service</h2>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 row offset-0">
                                        <div class="row col-lg-8">
                                            <div class="col-12 text-center">
                                                <label class="form-label fw-bold text-white" style="font-size: 20px;">
                                                    Your Service Title
                                                </label>
                                            </div>
                                            <div class=" col-12 ">
                                                <input type="text" class="form-control fw-bold text-center" value="<?php echo $product["title"]; ?>" id="t" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-12 ">
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <label class="form-label fw-bold text-white" style="font-size: 20px;">Contact Number</label>
                                                </div>
                                                <div class=" offset-lg-2 col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <input type="text" class="form-control fw-bold" value="<?php echo $product["mobile"]; ?>" id="m"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="col-12">
                                        <hr class="border-white" />
                                    </div>

                                    <div class="col-12 col-lg-4 border-end border-white">
                                        <div class="row">

                                            <div class="col-12 text-center">
                                                <label class="form-label fw-bold text-white" style="font-size: 20px;">Select Service Category</label>
                                            </div>

                                            <div class="col-12 offset-0">
                                                <select class="form-select text-center" disabled>
                                                    <?php

                                                    $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
                                                    $category_data = $category_rs->fetch_assoc();

                                                    ?>

                                                    <option><?php echo $category_data["name"]; ?></option>


                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 border-end border-white">
                                        <div class="row">

                                            <div class="col-12 text-center">
                                                <label class="form-label fw-bold text-white" style="font-size: 20px;">Select Service Type</label>
                                            </div>

                                            <div class="col-12 text-center">

                                                <select class="col-12 form-select" disabled>
                                                    <?php

                                                    $model_rs = Database::search("SELECT * FROM `type` WHERE `id` IN 
                                                        (SELECT `type_id` FROM `service` WHERE `id`='" . $product["id"] . "')");
                                                    $model_data = $model_rs->fetch_assoc();

                                                    ?>

                                                    <option><?php echo $model_data["name"]; ?></option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 ">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <label class="form-label fw-bold text-white" style="font-size: 20px;">Cost for Service</label>
                                            </div>
                                            <div class=" offset-lg-1 col-12 col-lg-9">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control fw-bold" disabled value="<?php echo $product["price"]; ?>" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>







                                    <div class="col-12">
                                        <hr class="border-white" />
                                    </div>


                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <label class="form-label fw-bold text-white" style="font-size: 20px;">Service Description</label>
                                            </div>
                                            <div class="col-12 ">
                                                <textarea cols="30" rows="15" class="text-area form-control text-dark fw-bold fs-3 text-center" style="background-color: #d2cad1;" id="d"><?php echo $product["description"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="border-white" />
                                    </div>

                                    <div class="col-12">



                                        <?php
                                        $img = array();

                                        $img[0] = "resources/service.png";
                                        $img[1] = "resources/service.png";
                                        $img[2] = "resources/service.png";

                                        $product_img_rs = Database::search("SELECT * FROM `image` WHERE `service_id`='" . $product["id"] . "'");
                                        $product_img_num = $product_img_rs->num_rows;

                                        for ($x = 0; $x < $product_img_num; $x++) {
                                            $product_img_data = $product_img_rs->fetch_assoc();

                                            $img[$x] = $product_img_data["code"];
                                        }

                                        ?>


                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <label class="form-label fw-bold text-white" style="font-size: 20px;">Add Some Images about Your Service </label>
                                            </div>
                                            <div class="offset-lg-3 col-12 col-lg-6">
                                                <div class="row">
                                                    <div class="col-4 border border-dark rounded bg-white">
                                                        <img src="<?php echo $img[0]; ?>" class="img-fluid" style="width: 250px;" id="i0" />
                                                    </div>
                                                    <div class="col-4 border border-dark rounded bg-white">
                                                        <img src="<?php echo $img[1]; ?>" class="img-fluid" style="width: 250px;" id="i1" />
                                                    </div>
                                                    <div class="col-4 border border-dark rounded bg-white">
                                                        <img src="<?php echo $img[2]; ?>" class="img-fluid" style="width: 250px;" id="i2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3 text-center">
                                                <input type="file" class="d-none" id="imageuploader" multiple />
                                                <label for="imageuploader" class="col-12 btn btn-primary fs-2" onclick="changeServiceImage();"><i class="image icon"></i>Upload Images</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="border-white" />
                                    </div>



                                    <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3 mb-3 text-center">
                                        <button class="btn btn-success fs-1" onclick="updateService();"><i class="save icon"></i>Update Service</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                <?php

                } else {
                ?>
                    <script>
                        alert("Please Select a Product to Update.");
                        window.location = "myservices.php";
                    </script>
                <?php
                }
            } else {

                ?>
                <script>
                    alert("You Have to Signin for Access this Feature");
                    window.location = "home.php";
                </script>
            <?php

            }

            include "footer.php";

            ?>
        </div>
    </div>



    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="semantic.js"></script>
    <script src="semantic.min.js"></script>




</body>

</html>