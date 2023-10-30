<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="semantic.css">
    <link rel="stylesheet" type="text/css" href="semantic.min.css">
    <link rel="icon" href="resources/LOGO.gif" />

    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidepanel {
            width: 0;
            position: fixed;
            z-index: 1;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .header-topic {
            font-family: "roboto";
            font-weight: bolder;
            color: rgb(250, 246, 246);
            text-shadow: 4px 2px 10px #ae8d05;
        }

        .sidepanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidepanel a:hover {
            color: #f1f1f1;
        }

        .sidepanel .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }
    </style>

</head>

<body>
    <div class="fixed-top" style="width: 100vw;">
        <div class="col-12 ">
            <div class="row  mb-1">

                <nav class="navbar navbar-dark bg-dark ">

                    <div class="col-12 align-items-center justify-content-center text-white ">

                        <?php

                        session_start();

                        if (isset($_SESSION["user"])) {

                            $data = $_SESSION["user"];


                        ?>



                            <span class="text-lg-start text-white" style="margin-left: 20px;">Welcome&nbsp;&nbsp; <b> <i class="bi bi-person-check-fill"></i> <?php echo $data["f_name"]; ?> </b></span>



                        <?php

                        } else {

                        ?>

                            <a href="index.php" class="text-decoration-none fw-bold text-lg-start" style="margin-left: 20px;">Sign In or Register</a>

                        <?php

                        }

                        ?>

                        <span class="offset-lg-3 text-lg-center"><a href="index.php" class="col-lg-1 header-topic "><img src="resources/Bzness Guide LOGO for Body.png" style="height: 70px;" /> </a></span>
                        <span class="fw-bold offset-lg-2 ">
                            <b class="col-lg-2 help-contact" style="text-shadow: 2px 2px 4px #000000; color:rgb(194, 194, 240);font-size:small;" onclick="loadHelpContactPage();">Help and Contact &nbsp;&nbsp;&nbsp;</b>
                            <b class="ui inverted teal button p-2 col-lg-1 col-md-12 col-sm-12" onclick="signout();" style="font-size:medium; font-weight: bolder;">SignOut</b>
                        </span>




                    </div>

                </nav>

                <div class="col-lg-12 col-12 " style="margin-top:-5px;">
                    <div id="mySidepanel" class="sidepanel">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                        <a class="p-4" href="home.php">Home</a>
                        <a class="p-4" href="myprofile.php">My Profile</a>
                        <a class="p-4" href="interestedServices.php">Interested Services</a>
                        <a class="p-4" href="myServices.php">My Services</a>
                        <a class="p-4" href="advancedSearch.php">Explore</a>
                        <a class="p-4" href="HelpAndContact.php">Help & Contact</a>
                    </div>
                    <div class="row" style="background-color: black;">

                        <div class="col-lg-2 col-3">
                            <button class="openbtn" onclick="openNav()">☰ MENU</button>
                        </div>

                        

                    </div>
                    <script>
                        function openNav() {
                            document.getElementById("mySidepanel").style.width = "250px";
                        }

                        function closeNav() {
                            document.getElementById("mySidepanel").style.width = "0";
                        }
                    </script>
                </div>
            </div>



        </div>
    </div>


    <script src="script.js"></script>
    <script src="semantic.js"></script>
    <script src="semantic.min.js"></script>
</body>

</html>