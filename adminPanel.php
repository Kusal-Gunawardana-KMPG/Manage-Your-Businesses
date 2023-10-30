<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Bzness Guide | Admin Panel</title>

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



                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 col-lg-2">
                            <div class="row">
                                <div class="col-12 align-items-start bg-dark vh-80" style="border-radius: 20px;">
                                    <div class="row g-1 text-center">

                                        <div class="col-12 mt-5">
                                            <h4 style="color:aqua;"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></h4>
                                            <hr class="border border-1 border-white" />
                                        </div>
                                        <div style="height: 10px;"></div>
                                        <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                            <nav class="nav flex-column">
                                                <a class="nav-link active text-white fs-5" aria-current="page" href="adminPanel.php">Admin Panel</a>
                                                <a class="nav-link text-white btn-white fs-5" href="manageusers.php">Manage Users</a>
                                                <a class="nav-link text-white btn-white fs-5" href="manageservices.php">Manage Services</a>
                                                <br>
                                                <a class="nav-link text-warning btn-warning outline fs-5" href="adminprofile.php">My Profile</a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-10">
                            <div class="row">

                                <div class="text-white fw-bold mb-1 mt-3 text-center bg-dark">
                                    <h2 class="fw-bold fs-1 bg-dark" style="border-radius: 10px;">Admin Panel</h2>
                                </div>
                                <div class="col-12">
                                    <hr style="color: white;" />
                                </div>
                                <div style="height: 10px;"></div>









                                <div class="col-12 text-center">
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>&nbsp;&nbsp;
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>&nbsp;&nbsp;
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>&nbsp;&nbsp;
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>&nbsp;&nbsp;
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>&nbsp;&nbsp;
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>&nbsp;&nbsp;
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>&nbsp;&nbsp;
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>&nbsp;&nbsp;
                                </div>











                                <div style="height: 10px;"></div>
                                <div class="col-12">
                                    <hr style="color: white;" />
                                </div>
                                <div style="height: 40px;"></div>
                                <div class="col-12">
                                    <div>

                                        <div class="bg-secondary row g-1 align-items-center text-center rounded">
                                            <div class="d-none d-lg-block" style="height: 15px;"></div>

                                            <div class="ui statistics justify-content-center">


                                                <div class="statistic">
                                                    <div class="value" style="color: silver;">
                                                        <i style="font-size: 50px;" class="boxes icon"></i>
                                                        <?php
                                                        $teacher_rs = Database::search("SELECT * FROM `service`");
                                                        $teacher_num = $teacher_rs->num_rows;
                                                        ?>
                                                        <?php echo $teacher_num; ?>
                                                    </div>
                                                    <div class="label fs-3 p-2" style="color: white;">
                                                        Services
                                                    </div>
                                                </div>

                                                <div class="statistic">
                                                    <div class="value" style="color: aqua;">
                                                        <i style="font-size: 50px;" class="bi bi-people"></i>
                                                        <?php
                                                        $student_rs = Database::search("SELECT * FROM `user`");
                                                        $student_num = $student_rs->num_rows;
                                                        ?>
                                                        <?php echo $student_num; ?>
                                                    </div>
                                                    <div class="label fs-3 p-2" style="color: aqua;">
                                                        Users
                                                    </div>
                                                </div>

                                                <div class="statistic">
                                                    <div class="value" style="color: silver;">
                                                        <i style="font-size: 50px;" class="bi bi-tags"></i>
                                                        <?php
                                                        $notes_rs = Database::search("SELECT * FROM `category`");
                                                        $notes_num = $notes_rs->num_rows;
                                                        ?>
                                                        <?php echo $notes_num; ?>
                                                    </div>
                                                    <div class="label fs-3 p-2" style="color: white;">
                                                        Categories
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="d-none d-lg-block" style="height: 15px;"></div>
                                        </div>

                                    </div>
                                </div>
                                <div style="height: 40px;"></div>

                                <div class="col-12">
                                    <hr style="color: white;" />
                                </div>

                                <div class="col-12 bg-dark">
                                    <div class="row">
                                        <div class="col-12 col-lg-2 text-center my-3">
                                            <label class="form-label fs-4 fw-bold text-white">Total Active Time</label>
                                        </div>
                                        <div class="col-12 col-lg-10 text-center my-3">
                                            <?php

                                            $start_date = new DateTime("2022-12-30 00:00:00");

                                            $tdate = new DateTime();
                                            $tz = new DateTimeZone("Asia/Colombo");
                                            $tdate->setTimezone($tz);

                                            $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                            $difference = $end_date->diff($start_date);

                                            ?>
                                            <label class="form-label fs-4 fw-bold text-warning">
                                                <?php

                                                echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                                    $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
                                                    $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <script src="bootstrap.bundle.js"></script>
                <script src="script.js"></script>

    </body>

    </html>

<?php

} else {
    echo ("You are Not a valid user. Please Try Again...!!!");
}

?>