<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    // Include database file
    include_once 'includes/dbconfig.php';

    ?>


    <?php


    $adultprice = $_POST["hoprice"];
    $kidprice = $adultprice / 2;

    $totadultprice = $_POST["cadult"] * $adultprice;
    $totchildprice = $_POST["ckids"] * $kidprice;


    $totpersons = $totadultprice + $totchildprice;

    $tot = $totpersons * $_POST["cnight"];

    ?>


</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Payment</h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOMES</a></li>
                <li><a href="#">BOOKING</a></li>
                <li class="active">PAYMENT</li>
            </ul>
        </div>
    </div>


    <?php echo $_POST["hoid"]; ?><br>
    <?php echo $_POST["honame"]; ?><br>
    <?php echo $tot; ?><br>
    <?php echo $_POST["sdate"]; ?><br>
    <?php echo $_POST["edate"]; ?><br>
    <?php echo $_POST["cnight"]; ?><br>
    <?php echo $_POST["cadult"]; ?><br>
    <?php echo $_POST["ckids"]; ?><br>









    <section id="payment-page" class="section">

        <div class="container">
            <div class="col-xs-12 col-sm-8">
                <div class="form-holder">
                    <form class="info-form">
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <select class="custom-select" placeholder="Card Type">
                                    <option value="Card Type"></option>
                                    <option value="american">American Express</option>
                                    <option value="visa">Visa</option>
                                    <option value="master">Mastercard</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <input class="required" placeholder="Card Number">
                            </div>
                        </div>

                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <input class="required " placeholder="Name on Card">
                            </div>

                            <div class="col-xs-12 col-sm-4">
                                <div class="date-field">
                                    <input class="traveline_date_input required" value="Expiration Date">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-2">
                                <input class="required" placeholder="CV2 Number">
                            </div>
                        </div>



                        <div class="row field-row">

                            <div class="col-xs-12">

                                <div class="custom-checkbox-holder">
                                    <input class="custom-checkbox" type="checkbox">
                                    <span>Yes,I have read and I agree to the booking conditions</span>

                                </div>

                            </div>
                        </div>
                        <button type="submit" class="button green">Submit Booking</button>

                    </form>

                </div>
            </div>


            <div class="col-xs-12 col-sm-4">

            </div>

        </div>

    </section>






    <?php include('includes/footer.php'); ?>
    <?php include('includes/jsscripts.php'); ?>
</body>

</html>