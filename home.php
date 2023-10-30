<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Bzness Guide</title>

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

<body class="home-background">

    <div class="container-fluid">

        <?php include "header.php"; ?>

        <div class="row">



            <div class="col-12 justify-content-center">
                <div class="row mb-3">

                    <div style="height: 135px;"></div>
                    <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
                    <div style="height: 30px;" class="d-lg-none d-md-none d-xl-none"></div>



                    <div class="align-self-end">
                        <nav class="navbar navbar-light bg-light">
                            <div class="container-fluid">
                                <a class="navbar-brand fw-bold text-dark">Search for anything</a>

                                <div class="ui right labeled left icon input focus">
                                    <i class="bi bi-search icon dark"></i>
                                    <input type="text" class="form-control" placeholder="Type a Keyword here" aria-label="Text input with dropdown button" id="basic_search_txt">
                                    <a class="ui tag button teal label " onclick="basicSearch(0);">
                                        Search
                                    </a>
                                </div>

                                <button type="button" class="btn btn-dark d-none d-lg-block" onclick="advancedsearchPage();"> Advanced Search</button>

                            </div>
                        </nav>
                    </div>

                    <div style="height: 10px;" class="d-lg-none d-md-none d-xl-none"></div>

                    <div class="col-12 row justify-content-center" id="basicSearchResult"></div>

                    <div class="col-12 mt-md-3 mt-lg-3 text-center justify-content-center align-content-center align-items-center" style="border-radius: 30px;">
                        <h1 class="p-3 col-8 offset-2 text-danger fw-bold border-dark border-4 border-bottom border-end border-start border-top" style="border-radius: 40px; font-family:indieflower;">Discover the Hidden Glory Around You </h1>
                    </div>
                    <div style="height: 10px;"></div>
                    <hr style="border: 1px solid black" />
                    <div class="col-12 bg-white text-center" style="border: solid;border-width: 1px;">
                        <h3 class="p-1 fw-bold">Dominate the Future World through Your Abilities</h3>
                    </div>
                    <div style="height: 10px;"></div>
                    <hr style="border: 1px solid black" />


                    <!-- Image Gallery -->


                    <div class="justify-content-center align-content-center align-items-center">

                        <div class="pic mt-lg-4 me-lg-5 mb-lg-5 ms-lg-5 border-secondary border-3 border-top border-bottom border-start border-end" style="border-radius: 20px;">

                            <div class="pic-ctn">
                                <img src="resources/Plumber.jfif" alt="Plumber" class="pic">
                                <img src="resources/Workers.jfif" alt="Worker" class="pic">
                                <img src="resources/Engineer.jfif" alt="Engineer" class="pic">
                                <img src="resources/Accountant.jfif" alt="Accountant" class="pic">
                                <img src="resources/Consulting.jfif" alt="Consulting" class="pic">
                                <img src="resources/Carpenter.jfif" alt="Carpenter" class="pic">
                                <img src="resources/Tree cutting.jfif" alt="Tree cutting" class="pic">
                                <img src="resources/helpers.jfif" alt="helpers" class="pic">
                                <img src="resources/typing.jfif" alt="typing" class="pic">
                                <img src="resources/typing2.jfif" alt="typing2" class="pic">
                                <img src="resources/Gardening2.jfif" alt="Gardening2" class="pic">
                                <img src="resources/Gardening.jfif" alt="Gardening" class="pic">
                            </div>

                        </div>

                    </div>

                    <!-- Image Gallery -->




                    <?php
                    require "connection.php";

                    $c_rs = Database::search("SELECT * FROM `category`");
                    $c_num = $c_rs->num_rows;


                    for ($y = 0; $y < $c_num; $y++) {

                        $c_data = $c_rs->fetch_assoc();

                        $product_rs = Database::search("SELECT service.id,service.price,service.description,service.title,service.status_id,
                            service.datetime_added,service.category_id,service.type_id,service.invoice_id,service.user_id,category.name,type.name FROM `service` INNER JOIN `type` ON 
                            service.type_id=type.id INNER JOIN `category` ON service.category_id=category.id WHERE `category_id`='" . $c_data["id"] . "' ORDER BY `datetime_added` DESC LIMIT 8 OFFSET 0");


                        $service_category = Database::search("SELECT 'id' FROM `service` INNER JOIN `category` ON service.category_id=category.id WHERE `category_id`='" . $c_data["id"] . "' ");
                        $service_category_num = $service_category->num_rows;

                    ?>





                        <!--Categories-->
                        <?php

                        if ($service_category_num == 0) {

                        ?>

                            <div class="col-12 bg-white text-center d-none" style="border: solid;border-width: 1px;">
                                <h3 class="p-1"><?php echo $c_data["name"]; ?></h3>
                            </div>
                        <?php

                        } else {

                        ?>

                            <div class="col-12 bg-dark text-center justify-content-center align-content-center align-items-center text-white ">
                                <button class="p-2 btn">
                                    <p class="categoryname p-2 fs-3  fw-bold" style="color: #e3fa45; border: solid;border-width: 1px; border-color: white; border-radius: 20px;">&nbsp;&nbsp;&nbsp; <?php echo $c_data["name"]; ?> &nbsp;&nbsp;&nbsp;</p>
                                </button>
                            </div>

                        <?php

                        }

                        ?>

                        <!--Categories-->

                        <!-- Services -->




                        <div class="col-12 mb-3">
                            <div class="row  ">

                                <div class="col-12">
                                    <div class="row justify-content-center gap-2">





                                        <?php




                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();
                                        ?>

                                            <div class="card col-6 col-lg-3 mt-2 mb-2 border-bottom border-start border-top border-end border-dark border-3" style="border-radius: 15px;width: 18rem;">

                                                <?php

                                                $image_rs = Database::search("SELECT * FROM `image` WHERE `service_id`='" . $product_data["id"] . "'");
                                                $image_data = $image_rs->fetch_assoc();

                                                ?>

                                                <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                                <div class="card-body ms-0 m-0 text-center">
                                                    <h5 class="card-title fw-bold fs-4"><?php echo $product_data["title"]; ?></h5>
                                                    <span class="card-text text-primary fs-5">Rs. <?php echo $product_data["price"]; ?> .00</span></br>
                                                    <span class="card-text ui purple horizontal label"><?php echo $product_data["name"]; ?> Working</span>
                                                    </br>

                                                    <?php

                                                    if ($product_data["status_id"] == 1) {

                                                    ?>

                                                        <span class="ui pointing red basic label fw-bold">Avaialable</span><br /></br>

                                                        <a href='<?php echo "singleServiceView.php?id=" . ($product_data["id"]); ?>' class="col-12 btn btn-success fw-bold">Book Now</a>



                                                        <?php



                                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `service_id`='" . $product_data["id"] . "' AND 
                                                                                    `user_id`='" . $_SESSION["user"]["id"] . "'");
                                                        $watchlist_num = $watchlist_rs->num_rows;

                                                        if ($watchlist_num == 1) {
                                                        ?>
                                                            <button  class="col-12 btn btn-warning mt-2" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>); '>
                                                                <i  class="bi bi-star-fill text-danger fs-5" id="heart<?php echo $product_data["id"]; ?>"></i>
                                                            </button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button class="col-12 btn btn-warning mt-2" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>); '>
                                                                <i class="bi bi-star text-danger fs-5" id="heart<?php echo $product_data["id"]; ?>"></i>
                                                            </button>
                                                        <?php
                                                        }

                                                        ?>

                                                    <?php

                                                    } else {

                                                    ?>

                                                        <span class="ui pointing black basic label fw-bold disabled">Unavaialable</span><br /></br>

                                                        <a href='<?php echo "singleServiceView.php?id=" . ($product_data["id"]); ?>' class="col-12 btn btn-success disabled fw-bold">Book Now</a>

                                                        <button class="col-12 btn btn-danger mt-2 disabled" onclick="addToInterested(<?php echo $product_data['id']; ?>);">
                                                            <i class="bi bi-star" id="interested<?php echo $product_data["id"]; ?>"></i>
                                                        </button>
                                                    <?php

                                                    }

                                                    ?>

                                                </div>
                                            </div>
                                        <?php

                                        }

                                        ?>
                                    <?php

                                }

                                    ?>


                                    </div>

                                </div>

                            </div>
                        </div>



                        <!--Services-->



                </div>



                <div class="mt-3"></div>
                <hr style="border: 1px solid black" />
                <div style="background-color: whitesmoke; border-radius: 10px;" class="row align-items-center justify-content-center text-center">
                    <nav aria-label="Page navigation example" class="mt-3">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" style="font-size: medium;">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#" style="font-size: medium;">1</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="font-size: medium;">2</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="font-size: medium;">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" style="font-size: medium;">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>


            </div>


        </div>

    </div>











    <?php include "footer.php"; ?>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="semantic.js"></script>
    <script src="semantic.min.js"></script>


</body>

</html>