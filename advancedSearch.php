<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced Search | Bzness |</title>

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

<body class="bg-dark">

    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="row">






            <div style="height: 125px;"></div>
            <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
            <div style="height: 20px;" class="d-lg-none d-md-none d-xl-none"></div>


            <div class="col-12 bg-secondary mb-2">
                <div class="row">

                    <div class="row ">
                        <div class="col-12 text-center">
                            <P class="fs-1 text-white fw-bold mt-3 mb-3 pt-2 border-bottom border-top border-start border-end border-warning" style="border-radius: 15px;">&nbsp;&nbsp; Advanced Search &nbsp;&nbsp;</P>
                        </div>
                    </div>

                </div>
            </div>

            <div class="offset-lg-2 col-12 col-lg-8 mb-3 bg-dark border-bottom border-top border-start border-end border-warning" style="border-radius: 25px;">
                <div class="row"></div>

                <div style="height: 15px;"></div>

                <div class="offset-lg-1 col-12 col-lg-10 bg-transparent">
                    <div class="row">
                        <div class="col-12 col-lg-12 mt-2 mb-1 bg-transparent text-white">
                            <input type="text" class="bg-transparent text-white form-control" placeholder="Type keyword to search..." id="t" />
                        </div>

                        <div class="col-12">
                            <hr class="border border-3 border-warning">
                        </div>
                    </div>
                </div>

                <div class="offset-lg-1 col-12 col-lg-10 bg-transparent">
                    <div class="row">

                        <div class="col-12">
                            <div class="row justify-content-center mb-3 ">

                                <div class="col-12 col-lg-4 mb-3">
                                    <select class="form-select bg-dark text-white" id="c1">
                                        <option value="0">Select Category</option>
                                        <?php

                                        require "connection.php";

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



                                <div class="col-12 col-lg-4 mb-3 bg-transparent text-white">
                                    <select class="form-select bg-dark text-white" id="type">
                                        <option value="0">Select Type</option>
                                        <?php

                                        $type_rs = Database::search("SELECT * FROM `type`");
                                        $type_num = $type_rs->num_rows;

                                        for ($x = 0; $x < $type_num; $x++) {
                                            $type_data = $type_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $type_data["id"]; ?>"><?php echo $type_data["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-12 col-lg-4 mt-2 mb-1 d-grid mb-3" style="height: 15px;">
                                    <button class="ui basic left pointing label bg-warning text-black fs-5" onclick="advancedSearch(0);"><i class="bi bi-search"></i>&nbsp; Search</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="offset-lg-2 col-12 col-lg-8 bg-dark rounded border-warning mb-3 text-white">
            <div class="row">
                <div class="offset-8 col-4 mt-2 mb-2 bg-dark  border-warning">
                    <select class="text-white bg-dark form-select border border-top border-start border-end border-bottom border-2 border-warning" id="s">
                        <option value="0">SORT BY</option>
                        <option value="1">PRICE LOW TO HIGH</option>
                        <option value="2">PRICE HIGH TO LOW</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="offset-lg-1 col-12 col-lg-10 bg-transparent mb-3 border-bottom border-top border-end border-start border-warning" style="border-radius:20px ;">
            <div class="row">
                <div class=" col-12 p-2 text-center justify-content-center align-items-center align-content-center">
                    <div class="row text-center justify-content-center align-items-center align-content-center" id="view_area">
                        <div class=" col-12 mt-5">
                            <span class="fw-bold text-black-50 justify-content-center align-items-center align-content-center"><i class="bi bi-hourglass-split h1 text-white-50" style=" font-size: 100px;"></i></span>
                        </div>
                        </br>
                        <div class="justify-content-center align-items-center align-content-center col-12  mt-3 mb-5">
                            <span class="h1 text-warning fw-bold">No Services Searched Yet...</span>
                        </div>
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
</body>

</html>