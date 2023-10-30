<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Interested Services | Bzness Guide</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="semantic.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/Bzness Guide LOGO 02.png" />

</head>

<body style="background-image: linear-gradient(40deg,black 20%,#414141 100%);">



    <?php include "header.php"; ?>



    <div class="container-fluid">
        <div class="row">




            <div style="height: 155px;"></div>
            <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
            <div style="height: 30px;" class="d-lg-none d-md-none d-xl-none"></div>





            <?php

            require "connection.php";

            if (isset($_SESSION["user"])) {

                $user = $_SESSION["user"]["email"];
                $user_id = $_SESSION["user"]["id"];

                $total = 0;
                $subtal = 0;
                $shipping = 0;

            ?>

                <div class="col-12 pt-2" style="background-color: #404442;">
                    <nav aria-label="breadcrumb" style="background-color: #404442;">
                        <ol class="breadcrumb" style="background-color: #404442;">
                            <li style="background-color: #404442;" class="breadcrumb-item"><a href="home.php" class="text-info fs-3">Home</a></li>
                            <li style="background-color: #404442;" class="breadcrumb-item active text-white fs-3" aria-current="page">Interested Services</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 border border-1 border-warning rounded mb-3">
                    <div class="row">

                        <div class="col-12 text-center">
                            <label class="form-label fs-1 fw-bold text-white mt-4">Interested Services <i class="bi bi-star-fill text-warning"></i></label>
                        </div>

                        <div class="col-12 col-lg-6">
                            <hr />
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <?php

                        $cart_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_id`='" . $user_id . "'");
                        $cart_num = $cart_rs->num_rows;

                        if ($cart_num == 0) {

                        ?>
                            <!-- Empty View -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptyCart"></div>
                                    <div class="col-12 text-center mb-2">
                                        <label class="form-label fs-1 fw-bold text-white-50">
                                            You Haven't Interested For any Service Yet...
                                        </label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid">
                                        <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                                            Back to Home
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Empty View -->
                        <?php

                        } else {
                        ?>

                            <!-- products -->

                            <div class="col-12 col-lg-12">
                                <div class="row">

                                    <?php
                                    for ($x = 0; $x < $cart_num; $x++) {
                                        $cart_data = $cart_rs->fetch_assoc();

                                        $product_rs = Database::search("SELECT * FROM `service` WHERE `id`='" . $cart_data["service_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();



                                        $seller_rs = Database::search("SELECT * FROM `user` WHERE `id`='" . $product_data["user_id"] . "'");
                                        $seller_data = $seller_rs->fetch_assoc();
                                        $seller = $seller_data["f_name"] . " " . $seller_data["l_name"];

                                    ?>

                                        <div class="card mb-3 mx-0 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="fw-bold text-black-50 fs-5">Seller :</span>&nbsp;
                                                            <span class="fw-bold text-black fs-5"><?php echo $seller; ?></span>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-4">

                                                    <?php
                                                    $img = array();

                                                    $images_rs = Database::search("SELECT * FROM `image` WHERE `service_id`='" . $cart_data["service_id"] . "'");
                                                    $images_data = $images_rs->fetch_assoc();

                                                    ?>

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo $product_data["description"]; ?>" title="Product Description">
                                                        <img src="<?php echo $images_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 200px;">
                                                    </span>

                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body text-center">

                                                        <h3 class="card-title fw-bold"><?php echo $product_data["title"]; ?></h3>




                                                        <?php

                                                        $condition_rs = Database::search("SELECT * FROM `type` WHERE `id`='" . $product_data["type_id"] . "'");
                                                        $condition_data = $condition_rs->fetch_assoc();


                                                        $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_id`='" . $_SESSION["user"]["id"] . "'");
                                                        $watch_num = $watch_rs->num_rows;
                                                        $watch_data = $watch_rs->fetch_assoc();

                                                        ?>

                                                        &nbsp; <span class="fw-bold text-black fs-4">Type : <b class="text-primary fs-4"><?php echo $condition_data["name"]; ?></b></span>



                                                        <br>
                                                        <div class="border border-1 border-dark rounded mt-3 text-center">
                                                            <span class="fw-bold text-black-50 fs-3 p-1">Price :</span>&nbsp;
                                                            <span class="fw-bold text-danger fs-3 p-1">Rs. <?php echo $product_data["price"]; ?>.00</span>
                                                            <br>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body d-grid">
                                                        <a href='<?php echo "singleServiceView.php?id=" . ($product_data["id"]); ?>' class="col-12 btn btn-success fw-bold">Book Now</a>
                                                        <a href="#" class="btn btn-outline-danger fw-bold" onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Remove</a>
                                                    </div>
                                                </div>

                                                <hr>

                                            </div>
                                        </div>

                                    <?php }
                                    ?>

                                </div>
                            </div>

                            <!-- products -->
                        <?php
                        }
                        ?>

                    </div>
                </div>

            <?php

            } else {
                echo ("Please login or signup first");
            }

            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>



</body>

</html>