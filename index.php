<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bzness Guide</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/Bzness Guide LOGO 02.png" />

</head>

<body class="main-body">


    <!-- Sign In Part -->

    <div class="container-fluid  d-flex col-12  bg-dark bg-opacity-50 text-center " style="background-size: cover;" id="signInBox">

        <div class=" mt-1 mb-2 offset-lg-8">

            <div class="col-12 col-lg-7 ">

                <div class="container-fluid vh-100 d-flex justify-content-center">

                    <div class="row align-content-center">

                        <div class="d2">
                            <div class="d4">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 logo"></div>
                                    </div>
                                </div>

                                <div class="i1" id="signin-topic">Sign In </div>
                                <div class="i2">
                                    <div class="i3"></div>
                                </div>
                                <div class="i4">
                                    <div class="i5">Email</div>
                                    <input type="text" class="i6" id="signin-email" />

                                </div>
                                <div class="i4">
                                    <div class="i5">Password</div>
                                    <input class="i6" type="password" id="signin-password" />
                                </div>
                                <div class="row col-12" style="padding: 15px;">
                                    <div class="i7 col-6">
                                        <input type="checkbox" id="signin-rememberme" />
                                        <div class="i8"> Remember Me </div>
                                    </div>
                                    <div class="col-6 ">
                                        <a href="#" class="text-end i7-2" style="color: lightblue;" onclick="forgotPassword();">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="i9 col-6"><button class="i11 index-buttons1 text-wrap " onclick="changeView();" style="font-family: Arial, Helvetica, sans-serif; height: 50px; font-size: 18px;">Sign Up</button></div>
                                    <div class="i9 col-6"><button class="i10 btn-color" style="font-family: Arial, Helvetica, sans-serif; height: 50px; font-size: 18px;" onclick="signIn();">Sign In</button></div>
                                    <div style="height: 10px;"><a href="adminSignin.php" class="text-secondary">.</a> </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>

        </div>

    </div>

    <!-- Sign In Part -->



    <!--Sign Up Part -->

    <div class="container-fluid  d-flex col-12 vh-100  d-none  bg-dark bg-opacity-50 text-center justify-content-center align-items-center" style="background-size: cover;background-position: center;background-repeat: no-repeat;" id="signUpBox">
        <div class=" mt-1 mb-2 col-lg-9 bg-dark bg-opacity-50 " style="border-radius: 20px;">
            <div class="p-2">

                <div style="height: 10px;"></div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 logo"></div>
                        <div style="height: 5px;"></div>
                    </div>
                </div>

                <div class="col-12 col-lg-12 justify-content-center text-center align-items-center">
                    <div class="row g-2">

                        <div class="col-12 col-12">
                            <label class="form-label student-signup bg-dark bg-opacity-50" id="signup-topic">&nbsp;&nbsp;&nbsp;Sign Up&nbsp;&nbsp;&nbsp;</label>
                        </div>


                        <div class="col-6">
                            <label class="form-label text-light bg-dark bg-opacity-75" style="border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" placeholder="ex:- Nimal" id="fname" />
                        </div>

                        <div class="col-6">
                            <label class="form-label text-light bg-dark bg-opacity-75" style="border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Last Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" placeholder="ex:- Perera" id="lname" />
                        </div>

                        <div class="col-lg-6 col-12">
                            <label class="form-label text-light bg-dark bg-opacity-75" style="border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="email" class="form-control" placeholder="ex:-nadika@gmail.com" id="email" />
                        </div>

                        <div class="col-lg-6 col-12">
                            <label class="form-label text-light bg-dark bg-opacity-75" style="border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Password&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="password" class="form-control" placeholder="ex:- **********" id="password" />
                        </div>

                        <div class="col-6">
                            <label class="form-label text-light bg-dark bg-opacity-75" style="border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Mobile&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" placeholder="ex:- 0771234568" id="mobile" />
                        </div>

                        <div class="col-6">
                            <label class="form-label text-light bg-dark bg-opacity-75" style="border-radius: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Gender&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <select class="form-control" id="gender">

                                <?php

                                require "connection.php";

                                $rs = Database::search("SELECT * FROM `gender`");

                                $n = $rs->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $d = $rs->fetch_assoc();

                                ?>

                                    <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender"]; ?></option>

                                <?php

                                }

                                ?>


                            </select>
                        </div>

                        <div class="col-12" style="height: 5px;"></div>


                        <div class="row">
                            <div class="i9 col-12 col-lg-6"><button class="i11 index-buttons1 text-wrap" onclick="changeView();" style="font-family: Arial, Helvetica, sans-serif;  font-size: 18px;">Already have an Account <br /> Sign In</button></div>
                            <div class="i9 col-12 col-lg-6"><button class="i10 btn-color" style="font-family: Arial, Helvetica, sans-serif;height: 50px; font-size: 25px;" onclick="signUp();">Sign Up</button></div>
                            <div style="height: 10px;"></div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-12 form-label text-white bg-dark bg-opacity-75" style="border-radius: 15px;">
                <label class="index-quote col-12">Success is how high you bounce when you hit bottom</label>
                <label class="col-lg-4 offset-lg-8" style=" color: rgb(160, 174, 77);">&nbsp;&nbsp;&nbsp;<i>- George S. Patton -</i>&nbsp;&nbsp;&nbsp;</label>
            </div>

        </div>



    </div>

    <!--Sign Up Part -->



    <!--Forgot Password modal -->

    <div class="modal" id="forgotPasswordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="new-password" />
                                <button class="btn btn-outline-secondary" type="button" onclick="showPassword();"><i class="bi bi-eye-fill" id="show-new-password"></i></button>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="retype-password" />
                                <button class="btn btn-outline-secondary" type="button"  onclick="showPassword2();"><i class="bi bi-eye-fill" id="show-retype-password"></i></button>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="verification-code" />
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                </div>
            </div>
        </div>
    </div>

    <!--Forgot Password modal -->




    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>