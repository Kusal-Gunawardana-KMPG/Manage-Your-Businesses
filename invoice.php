<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | Bzness</title>

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

<body class="mt-2" style="background-color: #f7f7ff;">

    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="row">

            <div style="height: 150px;"></div>
            <div style="height: 50px;" class=" d-lg-none d-sm-none d-xl-none"></div>
            <div style="height: 100px;" class="d-lg-none d-md-none d-xl-none"></div>



            <?php

            require "connection.php";

            if (isset($_SESSION["user"])) {
                $umail = $_SESSION["user"]["email"];
                $oid = $_GET["id"];
            ?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12 btn-toolbar justify-content-end">
                    <button class="btn btn-dark me-2" onclick="printInvoice();"><i class="bi bi-printer-fill"></i> Print</button>
                    <button class="btn btn-danger me-2" onclick="savepdf();"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                </div>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12" id="page">
                    <div class="row">

                        <div class="col-6">
                            <div class="ms-5 invoiceHeaderImage"></div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-primary text-decoration-underline text-end">
                                    <h2>eShop</h2>
                                </div>
                                <div class="col-12 fw-bold text-end">
                                    <span>Maradana, Colombo 10, Sri Lanka.</span><br />
                                    <span>+94112 555448</span><br />
                                    <span>eshop@gmail.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 mb-4">
                            <div class="row">

                                <div class="col-6">
                                    <h5 class="fw-bold">INVOICE TO :</h5>
                                    <h2><?php echo $_SESSION["user"]["f_name"] . " " . $_SESSION["user"]["l_name"]; ?></h2>
                                    <span><?php echo $umail; ?></span>
                                </div>

                                <?php

                                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                                $invoice_data = $invoice_rs->fetch_assoc();

                                ?>

                                <div class="col-6 text-end mt-4">
                                    <h1 class="text-primary">INVOICE <?php echo $invoice_data["id"]; ?></h1>
                                    <span class="fw-bold">Data & Time of Invoice : </span>&nbsp;
                                    <span class="fw-bold"><?php echo $invoice_data["date"]; ?></span>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr class="border border-1 border-secondary">
                                        <th>#</th>
                                        <th>Order ID & Product</th>
                                        <th class="text-end">Unit Price</th>
                                        <th class="text-end">Quantity</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 72px;">
                                        <td class="bg-primary text-white fs-3"><?php echo $invoice_data["id"]; ?></td>
                                        <td>
                                            <span class="fw-bold text-primary text-decoration-underline p-2"><?php echo $oid; ?></span><br />
                                            <?php
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                            $product_data = $product_rs->fetch_assoc();
                                            ?>
                                            <span class="fw-bold text-primary fs-3 p-2"><?php echo $product_data["title"]; ?></span>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 bg-secondary text-white">Rs. <?php echo $product_data["price"]; ?> .00</td>
                                        <td class="fw-bold fs-6 text-end pt-3"><?php echo $invoice_data["qty"]; ?></td>
                                        <td class="fw-bold fs-6 text-end pt-3 bg-secondary text-white">Rs. <?php echo $invoice_data["total"]; ?> .00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <?php

                                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $address_data["city_id"] . "'");
                                    $city_data = $city_rs->fetch_assoc();

                                    $delivery = 0;
                                    if ($city_data["district_id"] == 4) {
                                        $delivery = $product_data["delivery_fee_colombo"];
                                    } else {
                                        $delivery = $product_data["delivery_fee_other"];
                                    }

                                    $t = $invoice_data["total"];
                                    $g = $t - $delivery;

                                    ?>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold">SUBTOTAL</td>
                                        <td class="text-end">Rs. <?php echo $g; ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-primary">Delivery Fee</td>
                                        <td class="text-end border-primary">Rs. <?php echo $delivery; ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-primary text-primary">GRAND TOTAL</td>
                                        <td class="fs-5 text-end fw-bold border-primary text-primary">Rs. <?php echo $t; ?> .00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col-4 text-center" style="margin-top: -100px;">
                            <span class="fs-1 fw-bold text-success">Thank You !</span>
                        </div>

                        <div class="col-12 mt-3 mb-3 border-0 border-start border-5 border-primary rounded" style="background-color: #e7f2ff;">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="form-label fs-5 fw-bold">NOTICE : </label>
                                    <br />
                                    <label class="form-label fs-6">Purchased items can return after 7 days of Delivery.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 text-center mb-3">
                            <label class="form-label fs-5 text-black-50 fw-bold">
                                Invoice was created on a computer and is valid without the Signature and Seal.
                            </label>
                        </div>

                    </div>
                </div>

            <?php
            }

            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>


    <script src="semantic.js"></script>
    <script src="semantic.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

<script src="https://ajax.googleapis.com.ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://html2pdf.site/html2pdf_script.js"></script>

</html>