<?php
session_start();
require "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Services | Bzness Guide |</title>

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




            <div class="col-12 bg-dark text-center">
                <label class="form-label text-white fw-bold fs-1 p-3">Manage All Services</label>
            </div>

            <div class="col-12 mt-3">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-warning fw-bold">Search Services</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-dark py-2 text-end border-danger border-bottom border-top">
                        <span class="fs-3 fw-bold text-white">#</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2 border-danger border-bottom border-top">
                        <span class="fs-3 fw-bold">Service Image</span>
                    </div>
                    <div class="col-4 col-lg-3 bg-dark py-2 border-danger border-bottom border-top">
                        <span class="fs-3 fw-bold text-white">Title</span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block bg-light py-2 border-danger border-bottom border-top">
                        <span class="fs-3 fw-bold">Price</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2 border-danger border-bottom border-top">
                        <span class="fs-3 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-2 col-lg-2 bg-white text-center border-danger border-bottom border-top justify-content-center align-content-center align-items-center ">
                        <span class="fs-3 fw-bold"> Status </span>
                    </div>
                </div>
            </div>

            <?php

            $query = "SELECT * FROM `service`";
            $pageno;

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 20;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-dark py-2 text-end">
                            <span class="fs-4 fw-bold text-white"><?php echo $selected_data["id"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2" onclick="viewProductModal('<?php echo $selected_data['id']; ?>');">
                            <?php
                            $image_rs = Database::search("SELECT * FROM `image` WHERE `service_id`='" . $selected_data["id"] . "'");
                            $image_num = $image_rs->num_rows;
                            if ($image_num == 0) {
                            ?>
                                <img src="resource/mobile_images/iphone12.jpg" style="height: 40px;margin-left: 80px;" />
                            <?php
                            } else {
                                $image_data = $image_rs->fetch_assoc();
                            ?>
                                <img src="<?php echo $image_data["code"]; ?>" style="height: 40px;margin-left: 80px;" />
                            <?php
                            }

                            ?>

                        </div>
                        <div class="col-4 col-lg-3 bg-dark py-2">
                            <span class="fs-5 fw-bold text-white"><?php echo $selected_data["title"]; ?></span>
                        </div>
                        <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                            <span class="fs-4 fw-bold">Rs. <?php echo $selected_data["price"]; ?> .00</span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <span class="fs-5 fw-bold"><?php echo $selected_data["datetime_added"]; ?></span>
                        </div>
                        <div class="col-2 col-lg-2 bg-white py-2 d-grid">
                            <?php

                            if ($selected_data["status_id"] == 1) {
                            ?>
                                <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-danger" onclick="blockService('<?php echo $selected_data['id']; ?>');">Block</button>
                            <?php
                            } else {
                            ?>
                                <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-success" onclick="blockService('<?php echo $selected_data['id']; ?>');">Unblock</button>
                            <?php

                            }

                            ?>
                        </div>
                    </div>
                </div>



            <?php

            }

            ?>

            <!--  -->
            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php

                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }

                        ?>

                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--  -->

            <hr />

        </div>
    </div>









</body>

</html>