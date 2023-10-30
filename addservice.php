<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <title>Add Service | Bzness |</title>
</head>

<body class="profile-body">

    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="row gy-3">


            <div style="height: 150px;"></div>
            <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
            <div style="height: 100px;" class="d-lg-none d-md-none d-xl-none"></div>
            <div style="height: 25px;" class="d-none d-lg-block"></div>



            <?php

            require "connection.php";

            if (isset($_SESSION["user"])) {

            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 text-center">
                            <label class="form-label fw-bold text-white" style="font-size: 20px;">Special Notice...</label><br />
                            <label class="form-label text-white">
                                We are taking 5% from Your Service Price as <a href="home.php" style="color:aquamarine">Our</a> Service Charge.
                            </label>
                        </div>

                        <div class="col-12">
                            <hr class="border-success" />
                        </div>

                        <div class="col-12 text-center">
                            <h2 class="h2  fw-bold" style="color:aqua">Add New Service</h2>
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
                                                Add the Title of Your Service
                                            </label>
                                        </div>
                                        <div class=" col-12 ">
                                            <input type="text" class="form-control fw-bold" id="servicetitle" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 ">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <label class="form-label fw-bold text-white" style="font-size: 20px;">Contact Number</label>
                                            </div>
                                            <div class=" offset-lg-2 col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <input type="text" class="form-control fw-bold" id="servicemobile" />
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
                                            <select class="form-select text-center" id="servicecategory">
                                                <option value="0">Select Category</option>
                                                <?php



                                                $category_rs = Database::search("SELECT * FROM `category`");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                                                <?php
                                                }

                                                ?>
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

                                            <select class="col-12 form-select" id="servicetype">
                                                <option value="0">Select Service Type</option>
                                                <?php

                                                $clr_rs = Database::search("SELECT * FROM `type`");
                                                $clr_num = $clr_rs->num_rows;

                                                for ($x = 0; $x < $clr_num; $x++) {
                                                    $clr_data = $clr_rs->fetch_assoc();
                                                ?>

                                                    <option value="<?php echo $clr_data["id"]; ?>"><?php echo $clr_data["name"]; ?></option>

                                                <?php
                                                }

                                                ?>
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
                                                <input type="text" class="form-control fw-bold" id="servicecost" />
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
                                        <div class="col-12  " style="background-color: #d2cad1;">
                                            <textarea  class="text-area form-control bg-transparent text-dark fw-bold fs-3 text-center" id="servicedesc"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-white" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <label class="form-label fw-bold text-white" style="font-size: 20px;">Add Some Images about Your Service </label>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-4 border border-dark rounded bg-white">
                                                    <img src="resources/service.png" class="img-fluid" style="width: 250px;" id="i0" />
                                                </div>
                                                <div class="col-4 border border-dark rounded bg-white">
                                                    <img src="resources/service.png" class="img-fluid" style="width: 250px;" id="i0" />
                                                </div>
                                                <div class="col-4 border border-dark rounded bg-white">
                                                    <img src="resources/service.png" class="img-fluid" style="width: 250px;" id="i0" />
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



                                <div class="offset-lg-3 col-12 col-lg-4 d-grid mt-3 mb-3 text-center">
                                    <button class="btn btn-success fs-1" onclick="addService();"><i class="save icon"></i>Save Your New Service</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                header("Location:home.php");
            }

            ?>


        </div>
    </div>




    <?php include "footer.php"; ?>

</body>

</html>