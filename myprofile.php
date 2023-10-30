<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile | Bzness |</title>

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

<body>

    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="row">

            <div style="height: 150px;"></div>
            <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
            <div style="height: 100px;" class="d-lg-none d-md-none d-xl-none"></div>




            <?php

            require "connection.php";

            if (isset($_SESSION["user"])) {

                $email = $_SESSION["user"]["email"];
                $id = $_SESSION["user"]["id"];

                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
                gender.id=user.gender WHERE `email`='" . $email . "'");

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_id`='" . $id . "'");

                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();


            ?>

                <div class="col-12 bg-dark bg-opacity-50">
                    <div class="column">

                        <div class="col-12 rounded profile-body mt-4 mb-4 text-white">
                            <div class="row g-2 text-center">

                            <div class="col-12  mt-lg-5">
                                    <span class="mt-5 col-sm-12 col-md-12 mb-3 p-1">
                                        <button class="ui inverted olive button fs-3" onclick="myServicePage();"><i class="folder open outline icon"></i>&nbsp;&nbsp;&nbsp; My Services &nbsp;&nbsp;&nbsp; <i class="handshake outline icon"></i></button>
                                    </span>

                                    <span class="mt-5 col-sm-12 col-md-12 mb-3 p-1">
                                        <button class="ui inverted teal button fs-3" onclick="addServicePage();"><i class="loading spinner icon"></i>&nbsp;&nbsp;&nbsp; Add Service &nbsp;&nbsp;&nbsp; <i class="plus circle icon "></i></button>
                                    </span>

                                </div>

          

                                <br /><br />


                                <div class="col-lg-8 ">
                                    <div class="p-3 py-5   text-center">




                                        <span class="fw-bold text-center fs-1 "><?php echo $data["f_name"] . " " . $data["l_name"]; ?></span><br />
                                        <span class="fw-bold text-warning text-center"><?php echo $email; ?></span><br /><br />



                                        <span class="mb-3 fw-bold fs-2 text-center text-white">Profile Settings</span>


                                        <div class="row mt-4 ">

                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo $data["f_name"]; ?>" id="fname" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo $data["l_name"]; ?>" id="lname" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" class="form-control" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="profilepassword" readonly value="<?php echo $data["password"]; ?>" />
                                                    <span class="input-group-text bg-dark  text-white" >
                                                        <i id="showprofilepassword" class="bi bi-eye-slash-fill" onclick="showprofilepassword();"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Registered Date</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["register_date"]; ?>" />
                                            </div>


                                            <div class="col-6">
                                                <label class="form-label">Gender</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["gender"]; ?>" />
                                            </div>

                                            <div class="col-6  d-flex mt-4">
                                                <div class="ui labeled button" tabindex="0" onclick="updateProfile();">
                                                    <div class="ui red button">
                                                        <i class="bi bi-person-fill-up"></i>Update
                                                    </div>
                                                    <a class="ui basic red left pointing label">
                                                        My Profile
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>



                                <div class="col-md-3 ">




                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="resources/user.png" class="rounded-circle mt-5 bg-white" style="width: 150px;" id="viewImg" />
                                        <?php

                                        } else {

                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width: 150px;" id="viewImg" />
                                        <?php

                                        }

                                        ?>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        <label for="profileimg" class="btn ui inverted olive button fw-bold mt-5" onclick="changeImage();">Update Profile Image</label>



                                    </div>
                                </div>




                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                header("Location:http://localhost/Manage%20Your%20Businesses/home.php");
            }

            ?>





        </div>
    </div>


    <?php include "footer.php"; ?>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="semantic.js"></script>
    <script src="semantic.min.js"></script>
</body>

</html>