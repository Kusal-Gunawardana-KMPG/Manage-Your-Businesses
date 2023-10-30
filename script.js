function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}

function signUp() {

    var f = document.getElementById("fname");
    var l = document.getElementById("lname");
    var e = document.getElementById("email");
    var p = document.getElementById("password");
    var m = document.getElementById("mobile");
    var g = document.getElementById("gender");

    var form = new FormData();
    form.append("fname", f.value);
    form.append("lname", l.value);
    form.append("email", e.value);
    form.append("password", p.value);
    form.append("mobile", m.value);
    form.append("gender", g.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {
                alert("You Have Successfully SignUp to the System...");
                alert("Sign In to Continue Your Journey");
            } else {
                alert(text);
                document.getElementById("signup-topic").className = "student-signup-error";
                setTimeout(signupbacktonormal, 3000)
            }


        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(form);

}

function signupbacktonormal() {
    document.getElementById("signup-topic").className = "student-signup";
}

function signIn() {

    var email = document.getElementById("signin-email");
    var password = document.getElementById("signin-password");
    var rememberme = document.getElementById("signin-rememberme");

    var f = new FormData();
    f.append("signin-email", email.value);
    f.append("signin-password", password.value);
    f.append("signin-rememberme", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "home.php";
            } else {
                alert(t);
                document.getElementById("signin-topic").className = "i1-error";
                setTimeout(signinbacktonormal, 3000)
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);
}

function signinbacktonormal() {
    document.getElementById("signin-topic").className = "i1";
}

function signout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
                window.location = "index.php";
            }
        }
    };

    r.open("GET", "signoutProcess.php", true);
    r.send();

}

var fpm;

function forgotPassword() {

    var email = document.getElementById("signin-email");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification Code has Sent to Your Email. Please Check Your Inbox");
                var m = document.getElementById("forgotPasswordModal");
                fpm = new bootstrap.Modal(m);
                fpm.show();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword() {

    var newpassword = document.getElementById("new-password");
    var shownewpassword = document.getElementById("show-new-password");

    if (newpassword.type == "password") {

        newpassword.type = "text";
        shownewpassword.className = "bi bi-eye-slash-fill";

    } else {

        newpassword.type = "password";
        shownewpassword.className = "bi bi-eye-fill";

    }

}

function showPassword2() {

    var retypepassword = document.getElementById("retype-password");
    var showretypepassword = document.getElementById("show-retype-password");

    if (retypepassword.type == "password") {

        retypepassword.type = "text";
        showretypepassword.className = "bi bi-eye-slash-fill";

    } else {

        retypepassword.type = "password";
        showretypepassword.className = "bi bi-eye-fill";

    }

}


function resetPassword() {

    var email = document.getElementById("signin-email");
    var np = document.getElementById("new-password");
    var rnp = document.getElementById("retype-password");
    var vcode = document.getElementById("verification-code");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alert("Your Password Updated");
                fpm.hide();
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "resetPasswordProcess.php", true);
    r.send(f);

}


function changeImage() {
    var view = document.getElementById("viewImg"); //img tag
    var file = document.getElementById("profileimg"); //file chooser

    file.onchange = function() {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}


function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();

                alert("Success");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);
}

function showprofilepassword() {

    var showprofilepassword = document.getElementById("showprofilepassword");
    var profilepassword = document.getElementById("profilepassword");

    if (profilepassword.type == "password") {

        profilepassword.type = "text";
        showprofilepassword.className = "bi bi-eye-slash-fill";

    } else {

        profilepassword.type = "password";
        showprofilepassword.className = "bi bi-eye-fill";

    }

}

function addServicePage() {
    window.location = "addservice.php";
}

function changeServiceImage() {

    var image = document.getElementById("imageuploader");

    image.onchange = function() {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {

                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;

            }

        } else {
            alert(file_count + " Files. Only You Have Access to Add Maximun of 3 Image Files");
        }

    }


}

function addService() {

    var servicecategory = document.getElementById("servicecategory");
    var servicetype = document.getElementById("servicetype");
    var servicetitle = document.getElementById("servicetitle");
    var servicedesc = document.getElementById("servicedesc");
    var servicecost = document.getElementById("servicecost");
    var image = document.getElementById("imageuploader");
    var servicemobile = document.getElementById("servicemobile");


    var f = new FormData();

    f.append("servicecategory", servicecategory.value);
    f.append("servicetitle", servicetitle.value);
    f.append("servicetype", servicetype.value);
    f.append("servicecost", servicecost.value);
    f.append("servicedesc", servicedesc.value);
    f.append("servicemobile", servicemobile.value);

    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {

        f.append("image" + x, image.files[x]);

    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Service Images & Details Saved Successfully") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "addServiceProcess.php", true);
    r.send(f);


}


function myServicePage() {
    window.location = "myServices.php";
}


function changeStatus(id) {

    var product_id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                alert("Product Deactivated")
                window.location.reload();

            } else if (t == "activated") {

                alert("Product Activated")
                window.location.reload();

            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "changeStatusProcess.php?p=" + product_id, true);
    r.send();

}

function sendId(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "updateService.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "sendIdProcess.php?id=" + id, true);
    r.send();

}


function updateService() {
    var title = document.getElementById("t");
    var mobile = document.getElementById("m");
    var description = document.getElementById("d");
    var images = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("t", title.value);
    f.append("m", mobile.value);
    f.append("d", description.value);

    var file_count = images.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "myServices.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProcess.php", true);
    r.send(f);


}


function basicSearch(x) {
    var txt = document.getElementById("basic_search_txt");

    var f = new FormData();
    f.append("t", txt.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);

}

function advancedsearchPage() {
    window.location = " advancedSearch.php";

}


function advancedSearch(x) {
    var txt = document.getElementById("t");
    var category = document.getElementById("c1");
    var type = document.getElementById("type");
    var sort = document.getElementById("s");

    var f = new FormData();
    f.append("t", txt.value);
    f.append("cat", category.value);
    f.append("type", type.value);
    f.append("s", sort.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area").innerHTML = t;
        }
    }

    r.open("POST", "advancedSearchProcess.php", true);
    r.send(f);

}

function loadMainImg(id) {
    var sample_img = document.getElementById("productImg" + id).src;
    var main_img = document.getElementById("mainImg");

    main_img.style.backgroundImage = "url(" + sample_img + ")";

}

function addToWatchlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "added") {
                document.getElementById("heart" + id).style.className = "text-danger";
                window.location.reload();
            } else if (t == "removed") {
                document.getElementById("heart" + id).style.className = "text-dark";
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();

}



function removeFromWatchlist(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "removeWatchlistProcess.php?id=" + id, true);
    r.send();
}






function payNow(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var obj = JSON.parse(t);

            var mail = obj["umail"];
            var amount = obj["amount"];
            var uid = obj["uid"];

            if (t == "1") {
                alert("Please Login or Sign Up.");
                window.location = "index.php";
            } else {
                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {

                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, id, uid, amount);

                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1221267", // Replace your Merchant ID
                    "return_url": "http://localhost/eShop%20Guide%20to%20complete/singleProductView.php?id=" + id, // Important
                    "cancel_url": "http://localhost/eShop%20Guide%20to%20complete/singleProductView.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "first_name": obj["f_name"],
                    "last_name": obj["l_name"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": "",
                    "city": "",
                    "country": "Sri Lanka",
                    "delivery_address": "",
                    "delivery_city": "",
                    "delivery_country": "",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function(e) {
                payhere.startPayment(payment);
                // };
            }
        }
    }

    r.open("GET", "bookNowProcess.php?id=" + id, true);
    r.send();
}

function saveInvoice(orderId, id, uid, amount) {

    var f = new FormData();
    f.append("o", orderId);
    f.append("i", id);
    f.append("m", mail);
    f.append("uid", uid);
    f.append("a", amount);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {

                window.location = "invoice.php?id=" + orderId;

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "saveInvoice.php", true);
    r.send(f);

}


var av;

function adminVerification() {
    var email = document.getElementById("e");
    var password = document.getElementById("p");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert(" You Will Receive a Verification Code ");
                var adminVerificationModal = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);
}


function adminLogin() {

    var verification = document.getElementById("vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                av.hide();
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "verificationProcess.php?v=" + verification.value, true);
    r.send();
}





function adminSignout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
                window.location = "adminSignin.php";
            }
        }
    };

    r.open("GET", "adminsignoutProcess.php", true);
    r.send();

}




function blockService(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("pb" + id).innerHTML = "Unblock";
                document.getElementById("pb" + id).classList = "btn btn-success";
                window.location.reload();
            } else if (txt == "unblocked") {
                document.getElementById("pb" + id).innerHTML = "Block";
                document.getElementById("pb" + id).classList = "btn btn-danger";
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "seviceBlockProcess.php?id=" + id, true);
    request.send();

}




function blockUser(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("ub" + email).innerHTML = "Unblock";
                document.getElementById("ub" + email).classList = "btn btn-success";
                window.location.reload();
            } else if (txt == "unblocked") {
                document.getElementById("ub" + email).innerHTML = "Block";
                document.getElementById("ub" + email).classList = "btn btn-danger";
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "userBlockProcess.php?id=" + id, true);
    request.send();

}





function savepdf() {
    const element = document.getElementById("page");

    html2pdf(element);
}





function printInvoice() {
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
}


function loadHelpContactPage() {
    window.location = "HelpAndContact.php";
}