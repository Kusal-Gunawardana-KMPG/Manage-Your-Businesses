<?php

session_start();
require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];
    $id = $_SESSION["user"]["id"];
    $pageno;

?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>My Services | Bzness Guide</title>

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

    <body style="background-color: #000000;">

        <?php

        include "myServicesHeader.php";

        ?>


        <div class="container-fluid">
            <div class="row">


                <div style="height: 150px;"></div>
                <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
                <div style="height: 100px;" class="d-lg-none d-md-none d-xl-none"></div>




                <div class="col-12" style="background-color:#454545;">
                    <div class="row align-content-center justify-content-center align-items-center">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-lg-4 mt-1 mb-1 text-center">
                                    <?php
                                    $profile_img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_id`='" . $id . "'");
                                    $profile_img_num = $profile_img_rs->num_rows;
                                    if ($profile_img_num == 1) {
                                        $profile_img_data = $profile_img_rs->fetch_assoc();
                                    ?>
                                        <img src="<?php echo $profile_img_data["path"] ?>" width="90px" height="90px" class="rounded-circle" />
                                    <?php
                                    } else {
                                    ?>
                                        <img src="resources/user.png" width="90px" height="90px" class="rounded-circle" />
                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="col-12 col-lg-8 align-items-center justify-content-center">
                                    <div class="row text-center text-lg-start p-2">
                                        <div class="col-12 mt-0 mt-lg-4 ">
                                            <span class="text-warning fw-bold fs-4"><?php echo $_SESSION["user"]["f_name"] . " " . $_SESSION["user"]["l_name"]; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-12 col-lg-8 mt-2 my-lg-4 ">
                                    <div class="offset-4 offset-lg-2 text-white fw-bold "><button class="fs-1" style=" border-radius: 25px; border-color: yellow; color: yellow; background-color: transparent;">&nbsp;&nbsp;&nbsp;&nbsp;Services&nbsp;&nbsp;&nbsp;&nbsp;</button></div>
                                </div>
                                <div class="col-12 col-lg-4 mx-2 mb-2 my-lg-4 mx-lg-0 d-grid">
                                    <button style="border-radius: 35px;" class="ui inverted teal button fs-5" onclick="addServicePage();"><i class="loading plus circle icon"></i> Add Service</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- body -->

                <div style="background-color: #2c2c2c;" class=" col-12 justify-content-center align-items-center">
                    <div class="row">


                        <!-- Service -->

                        <div class="col-12 mt-3 mb-3 ">
                            <div class="row" id="sort">

                                <div class="offset-1 col-10 text-center bg-black p-3" style="border-radius: 20px;">
                                    <div class="row justify-content-center">

                                        <?php

                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $product_rs = Database::search("SELECT * FROM `service` WHERE `user_id`='" . $id . "'");
                                        $product_num = $product_rs->num_rows;

                                        $results_per_page = 6;
                                        $number_of_pages = ceil($product_num / $results_per_page);

                                        $page_results = ($pageno - 1) * $results_per_page;
                                        $selected_rs =  Database::search("SELECT * FROM `service` WHERE `user_id`='" . $id . "' 
                                    LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                        $selected_num = $selected_rs->num_rows;

                                        for ($x = 0; $x < $selected_num; $x++) {
                                            $selected_data = $selected_rs->fetch_assoc();
                                        ?>

                                            <!-- card -->

                                            <div class="card mb-3 mt-3 col-12 col-lg-5 m-3 border-warning bg-black" style="border-radius: 20px;">
                                                <div class="row">
                                                    <div class="col-md-4 mt-4">
                                                        <?php

                                                        $product_img_rs = Database::search("SELECT * FROM `image` WHERE `service_id`='" . $selected_data["id"] . "'");
                                                        $product_img_data = $product_img_rs->fetch_assoc();

                                                        ?>
                                                        <img src="<?php echo $product_img_data["code"]; ?>" class="img-fluid rounded-start" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title fw-bold text-warning"><?php echo $selected_data["title"]; ?></h5>
                                                            <span class="card-text fw-bold text-info ">Rs. <?php echo $selected_data["price"]; ?> .00</span><br />

                                                            <div class="form-check form-switch ">
                                                                <input class="form-check-input bg-secondary" type="checkbox" role="switch" id="fd<?php echo $selected_data["id"]; ?>" onchange="changeStatus(<?php echo $selected_data['id']; ?>);" <?php if ($selected_data["status_id"] == 2) { ?> checked <?php } ?> />
                                                                <label class="form-check-label fw-bold text-success " for="fd<?php echo $selected_data["id"]; ?>">
                                                                    <?php if ($selected_data["status_id"] == 2) { ?> Make Your Service Available <?php
                                                                                                                                                } else {
                                                                                                                                                    ?>Make Your Service Unavailable<?php
                                                                                                                                                                            } ?>

                                                                </label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row g-1">
                                                                        <div class="col-12 col-lg-6 d-grid">
                                                                            <button class="btn btn-success fw-bold" onclick="sendId(<?php echo $selected_data['id']; ?>);">Update</button>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 d-grid">
                                                                            <button class="btn btn-danger fw-bold">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- card -->

                                        <?php
                                        }

                                        ?>

                                    </div>
                                </div>
                                <div style="height: 10px;"></div>
                                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 ">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-lg justify-content-center ">
                                            <li class="page-item bg-secondary">
                                                <a class="border-white page-link bg-secondary text-white" href="
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
                                                    <li class="bg-secondary page-item active">
                                                        <a class="page-link bg-secondary text-black" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                    </li>
                                                <?php
                                                } else {
                                                ?>
                                                    <li class="bg-secondary page-item">
                                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                    </li>
                                            <?php
                                                }
                                            }

                                            ?>

                                            <li class="page-item">
                                                <a class="border-white page-link bg-secondary text-white" href="
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

                            </div>
                        </div>

                        <!-- service -->

                    </div>
                </div>

                <!-- body -->

            </div>
        </div>
        <?php include "footer.php"; ?>



        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script src="semantic.js"></script>
        <script src="semantic.min.js"></script>

    </body>

    </html>

<?php

} else {
    header("Location:home.php");
}

?>