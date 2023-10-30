<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT service.id,service.mobile,service.price,service.description,service.title,
    service.datetime_added,service.category_id,service.status_id,service.user_id,
    type.name AS tname,category.name AS cname FROM `service` INNER JOIN `type` ON 
    type.id=service.type_id INNER JOIN `category` ON category.id=service.category_id 
    INNER JOIN `user` ON user.id=service.user_id WHERE service.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Service View | Bzness</title>

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

            <?php include "header.php"; ?>

            <div class="container-fluid">
                <div class="row">



                    <div style="height: 150px;"></div>
                    <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
                    <div style="height: 20px;" class="d-lg-none d-md-none d-xl-none"></div>


                    <div class="col-12 mt-0 ">
                        <div class="row">
                            <div class="col-12" style="padding: 10px;">
                                <div class="row">

                                    <div class="col-12 row col-lg-12 order-2 order-lg-1 text-center justify-content-center align-items-center align-content-center">
                                        <ul>

                                            <?php

                                            $image_rs = Database::search("SELECT * FROM `image` WHERE `service_id`='" . $pid . "'");
                                            $image_num = $image_rs->num_rows;
                                            $img = array();

                                            if ($image_num != 0) {

                                                for ($x = 0; $x < $image_num; $x++) {
                                                    $image_data = $image_rs->fetch_assoc();
                                                    $img[$x] = $image_data["code"];
                                            ?>
                                                    <li class="d-flex flex-column justify-content-center align-items-center 
                                border border-1 border-warning mb-1">
                                                        <img src="<?php echo $img[$x]; ?>" class="img-thumbnail mt-1 mb-1" style="height: 200px;" id="productImg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?>);" />
                                                    </li>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center 
                                border border-1 border-warning mb-1">
                                                    <img src="resources/add-image.png" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center 
                                border border-1 border-warning mb-1">
                                                    <img src="resources/add-image.png" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center 
                                border border-1 border-warning mb-1">
                                                    <img src="resources/add-image.png" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                            <?php
                                            }

                                            ?>


                                        </ul>
                                    </div>

                                    <div class="col-lg-4 order-2 order-lg-1 d-none d-lg-block">
                                        <div class="row">
                                            <div class="col-12 align-items-center">
                                                <div class="mainImg" id="mainImg"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 order-3">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row border-bottom border-dark">
                                                    <nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb">
                                                            <li class=" breadcrumb-item"><a href="home.php" class="fs-4">Home</a></li>
                                                            <li class="fs-4 breadcrumb-item active" aria-current="page" style="color: #667584;">Single Product View</li>
                                                        </ol>
                                                    </nav>
                                                </div>



                                                <?php

                                                $price = $product_data["price"];

                                                ?>

                                                <div class="row text-center border-bottom bg-black border-dark justify-content-center align-items-center ">
                                                    <div class="col-12 my-2">
                                                        <h5 class="card-title fw-bold text-white fs-1 "><?php echo $product_data["title"]; ?></h5>
                                                        <span class="fs-4  fw-bold" style="color: yellow;">Rs. <?php echo $price; ?> .00</span>
                                                    </div>
                                                </div>


                                                <div class="col-12 text-center justify-content-center align-items-center align-content-center" style="background-color: black;">
                                                    </br>
                                                    <span class="text-info fs-2 fw-bold"><b class=" text-info fs-2 fw-bold"> &nbsp; Contact Service From : &nbsp;</b><?php echo $product_data["mobile"] ?></span>
                                                    </br>
                                                    </br>
                                                </div>
                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <div class="row g-2">

                                                            <?php

                                                            $seller_rs = Database::search("SELECT *FROM `user` WHERE `id` ='" . $product_data["user_id"] . "'");
                                                            $seller_data = $seller_rs->fetch_assoc();

                                                            ?>
                                                            <div class="col-12 col-lg-12 border bg-dark border-1 border-secondary text-center">
                                                                </br>
                                                                <span class="text-white fs-5 p-1 m-5"><b class="text-white fs-5"> &nbsp; Contact Mr. &nbsp;</b><?php echo $seller_data["f_name"] . " " . $seller_data["l_name"]; ?></span>&nbsp;
                                                                </br><span class="text-primary fs-6"><b class="text-primary fs-6 fw-bold"> &nbsp; Contact Number : &nbsp;</b><?php echo $seller_data["mobile"] ?></span>
                                                                </br>
                                                                </br>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 my-2">
                                                                <div class="row g-2">

                                                                    <div class="row">
                                                                        <div class="col-12 mt-5 justify-content-center align-items-center align-content-center text-center">
                                                                            <div class="row col-12 ">

                                                                                <div style="border-radius: 60px;" class=" col-12 d-grid col-lg-6 bg-dark justify-content-center align-items-center text-center align-content-center">

                                                                                    <?php



                                                                                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `service_id`='" . $product_data["id"] . "' AND 
                                                                                    `user_id`='" . $_SESSION["user"]["id"] . "'");
                                                                                    $watchlist_num = $watchlist_rs->num_rows;

                                                                                    if ($watchlist_num == 1) {
                                                                                    ?>
                                                                                        <button class="col-12 fs-3  ui white inverted button" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>); '>
                                                                                            Remove from Interested &nbsp;<i class="bi bi-star-fill text-warning fs-5" id="heart<?php echo $product_data["id"]; ?>"></i>
                                                                                        </button>
                                                                                    <?php
                                                                                    } else {
                                                                                    ?>
                                                                                        <button class="col-12 fs-3  ui white inverted button" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>); '>
                                                                                            Add to Interested &nbsp;<i class="fs-5" id="heart<?php echo $product_data["id"]; ?>"></i>
                                                                                        </button>
                                                                                    <?php
                                                                                    }

                                                                                    ?>
                                                                                </div>

                                                                                <div style="height: 10px;" class="d-lg-none d-md-none"></div>



                                                                                <div style="border-radius: 60px; background-color: sienna;" class="col-12 col-lg-6 d-grid justify-content-center align-items-center text-center align-content-center">
                                                                                    <button style="border-radius: 100px;" class=" ui yellow inverted button col-12 fs-2" type="submit" id="payhere-payment" onclick="payNow(<?php echo $pid ?>);"> Book Now</button>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                        </br>


                        <div class="col-12  justify-content-center align-items-center border-bottom border-2 border-dark">
                            <div class="row justify-content-center align-items-center " style="border-radius:10px ; ">
                                <div class="col-6">
                                    <div class="row text-center d-block me-0 mt-4 mb-3  border-dark justify-content-center align-items-center">
                                        <div class="col-12 ">
                                            <span class="fs-1 text-danger fw-bold ui blue ribbon label"> Service Details </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </br>

                        <div class="col-12 bg-transparent justify-content-center align-items-center align-content-center">
                            <div class="row justify-content-center align-items-center align-content-center">

                                <div  class="col-12 text-center  justify-content-center align-items-center align-content-center">
                                    <div class="bg-dark row">
                                        <div>
                                            <label class="form-label fs-4 text-white "><b style="font-size: large;"><?php echo $product_data["cname"] ?></b> <label class="form-label fs-4 fw-bold text-info"> Category</label></label>
                                        </div>
                                    </div>
                                </div>

                                <div  class="col-12 text-center  justify-content-center align-items-center align-content-center">
                                    <div class="row bg-dark">
                                        <div>
                                            <label class="form-label fs-4 text-white "><b style="font-size: large;"><?php echo $product_data["tname"] ?></b> <label class="form-label fs-4 fw-bold text-info"> Working Type </label></label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-12 ">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-12 col-lg-2">
                                    <label class="form-label fs-3 fw-bold" style="color: white; font-weight: bolder;">Description  </label>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <textarea cols="60" rows="10" class="form-control text-dark fs-4" style="font-weight: bold;" readonly><?php echo $product_data["description"] ?></textarea>
                                </div>
                            </div>
                        </div>

                        </br>

                        </br></br>

                    </div>
                </div>

            </div>
            </div>


            </div>
            </div>
            <?php include "footer.php"; ?>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script src="semantic.js"></script>
            <script src="semantic.min.js"></script>

            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

        </body>

        </html>


<?php

    } else {
        echo ("Sory for the inconvinient");
    }
} else {
    echo ("Something went wrong");
}

?>