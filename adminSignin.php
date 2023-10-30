<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bzness Guide | Admin Login</title>

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

<body class="signin-background">



    <div style="height: 50px;"></div>




    <div class="col-12 p-3 ">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 ">
                <div class="col-12 logo " style="text-shadow: 2px 2px 5px white;"></div>
                <div style="height: 10px;"></div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-lg-12 text-center">
                        <p style="color: white; font-family:helveticaregular; font-weight: bold; font-size: 30px; ">Administrator Login</p>
                    </div>
                    <div class="col-12 col-lg-12" style="height: 10px;"></div>
                    <div>
                        <div class="p-5" style="background-color: rgb(220, 222, 226); border-radius: 10px; align-items: center;">

                            <div class="col-12">
                                <label class="col-12 fs-3 form-label justify-content-center mt-2 fw-bold text-center" style="font-weight:bolder;">Email Address</label>
                                <input type="email" class="form-control" id="e"/>
                            </div>
                            <div class="col-12">
                                <label class="col-12 fs-3 form-label justify-content-center mt-2 fw-bold text-center" style="font-weight:bolder;">Password</label>
                                <input type="password" class="form-control" id="p"/>
                            </div>
                            <div class=" p-2">
                            </div>
                            
                            <div class="col-12 row justify-content-center align-items-center mt-3">
                                <div class="col-12 col-lg-6 d-grid p-1 text-center">
                                    <button class="ui inverted red button" onclick="adminVerification();"><b style="font-size: x-large;"> Log In </b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 10px;"></div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="verificationModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Enter Your Verification Code</label>
                    <input type="text" class="form-control" id="vcode">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="adminLogin();">Verify</button>
                </div>
            </div>
        </div>
    </div>



    <footer class="bg-dark text-center text-white col-12 fixed-bottom" style="width:100vw;">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <p><a class="text-white" href="home.php"> Bzness Guide </a>|| All Rights Reserved</p>
        </div>
        <!-- Copyright -->

    </footer>


    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>