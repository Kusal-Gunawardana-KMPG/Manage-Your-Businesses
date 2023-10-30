<?php

session_start();

?>






<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Profile | Bzness |</title>

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

<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#101010 0%,#9FaCE6 100%);">

    <?php

    include "adminHeader.php";



    ?>

    <div class="container-fluid">
        <div class="row">

            <div style="height: 150px;"></div>
            <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>


            <?php

            require "connection.php";

            if (isset($_SESSION["au"])) {

                $email = $_SESSION["au"]["email"];
                $id = $_SESSION["au"]["id"];

                $details_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");


                $data = $details_rs->fetch_assoc();


            ?>

                <div class="col-12 bg-dark bg-opacity-50">
                    <div class="column">

                        <div class="col-12 rounded profile-body mt-4 mb-4 text-white">
                            <div class="row g-2 text-center">


                                <div class="col-lg-8 ">
                                    <div class="p-3 py-5   text-center">




                                        <span class="fw-bold text-center fs-1 "><?php echo $data["fname"] . " " . $data["lname"]; ?></span><br />
                                        <span class="fw-bold text-warning text-center"><?php echo $email; ?></span><br /><br />



                                        <span class="mb-3 fw-bold fs-2 text-center text-white">Admin Profile Details</span>


                                        <div class="row mt-4 ">

                                            <div class="col-6">
                                                <label class="form-label text-white fs-4">First Name</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["fname"]; ?>" id="fname" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label text-white fs-4" >Last Name</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["lname"]; ?>" id="lname" />
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-6">
                                                    <label class="form-label text-white fs-4">Password</label>
                                                </div>
                                                <div class="input-group col-6">
                                                    <input type="password" class="form-control" id="profilepassword" readonly value="<?php echo $data["password"]; ?>" />
                                                    <span class="input-group-text bg-dark  text-white">
                                                        <i id="showprofilepassword" class="bi bi-eye-slash-fill" onclick="showprofilepassword();"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label text-white fs-4">Email</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label text-white fs-4">Verfication Code</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["verification_code"]; ?>" />
                                            </div>

                                        </div>

                                    </div>
                                </div>



                                <div class="col-md-3 ">




                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <img src="resources/user.png" class="rounded-circle mt-5 bg-white" style="width: 150px;" id="viewImg" />

                                    </div>
                                </div>




                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                header("Location:http://localhost/Manage%20Your%20Businesses/adminPanel.php");
            }

            ?>





        </div>
    </div>



    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="semantic.js"></script>
    <script src="semantic.min.js"></script>
</body>

</html>