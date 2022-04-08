<?php

// Include database file
include_once 'includes/dbconfig.php';


if (!$auth->is_logged_in()) {

    $message = "Please Login Before Making Reservation !";

    echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'login.php';
        </script>";
}

?>
<!-- retriving from home detailed page via post request -->
<?php
if (isset($_REQUEST['book'])) {
    $hid = $_REQUEST["hoid"];
    $nightcount = $_REQUEST["cnight"];
    $startdate = $_REQUEST["sdate"];
    $enddate = $_REQUEST["edate"];
    $adultcount = $_REQUEST["cadult"];
    $kidcount = $_REQUEST["ckids"];
    $kidprice =  $_REQUEST["kidprice"];
    $adultprice = $_REQUEST["adultprice"];
    $homedata = $home->displyaRecordById($hid);
    $homeprice = $home->HomePriceCalculation($adultcount, $kidcount, $nightcount, $kidprice, $adultprice);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    // Insert Record in booking table
    if (isset($_POST['submit'])) {

        $cus_id = $_POST['cusid'];
        $cus_fname = $_POST['fname'];
        $cus_lname = $_POST['lname'];
        $cus_email = $_POST['email'];
        $cus_contact = $_POST['contact'];
        $cus_card_type = $_POST['cardtype'];
        $card_holdername= $_POST['cardholdername'];
        $card_number= $_POST['cardnumber'];
        $serviceid = $_POST['homeid'];
        $adult_count = $_POST['totcountadult'];
        $kid_count = $_POST['totcountkid'];
        $total_persons_count = $_POST['totcount'];
        $total_amount = $_POST['total'];
        $total_night = $_POST['totnight'];
        $booking_sdate = $_POST['homesdate'];
        $booking_edate = $_POST['homeedate'];

        $homedata = $home->displyaRecordById($serviceid);
        $pid = $homedata['partner_id'];
        $servicename = $homedata['home_name'];
        $stype = 'Home Stay';
        $service_ava_sdate = $homedata['ava_start_date'];
        $service_ava_edate = $homedata['ava_end_date'];

        $net_amount = $earning->HomePercentageCalculate($total_amount);
        $payout = $earning->Payout($total_amount,$net_amount);
        $insertBookingData = $booking->insertBookingData($total_amount, $cus_fname, $cus_lname, $cus_email, $cus_contact, $cus_card_type, $card_holdername, $card_number, $cus_id, $booking_sdate, $booking_edate, $total_night, $total_persons_count, $adult_count, $kid_count, $serviceid, $servicename, $stype, $pid);
        $homeUpdate = $home->home_update_after_booking($serviceid,$service_ava_sdate,$service_ava_edate,$total_night);
        $insertEarningData = $earning->insertEarningData($pid, $total_amount, $payout, $net_amount, $cus_id, $servicename, $serviceid, $stype);


        $LAST_INSERTED_ID = $insertBookingData['lastInsertedID'];

        if ($insertBookingData && $insertEarningData && $homeUpdate) {
            $message = "Home Reservation Success.";
            echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'thank-you.php?bookingid=$LAST_INSERTED_ID';
        </script>";
        } else {
            $message = "Home Reservation unSuccessful.";
            echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'home-detailed.php?homeid=$serviceid';
        </script>";
        }
    }
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

    <section id="content" class="gray-area">
        <div class="container">
            <div class="row">
                <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                    <div class="booking-section travelo-box">

                        <form class="booking-form" method="POST">

                            <!-- hidden inputs -->
                            <input type="text" name="cusid" hidden value="<?= $returned_row['customer_id']; ?>">
                            <input type="text" name="homeid" hidden value="<?php echo $homedata['home_id']; ?>">
                            <input type="text" name="total" hidden value="<?php echo $homeprice['total_amount']; ?>">
                            <input type="text" name="homesdate" hidden value="<?php echo $startdate; ?>">
                            <input type="text" name="homeedate" hidden value="<?php echo $enddate; ?>">
                            <input type="text" name="totnight" hidden value="<?php echo $nightcount; ?>">
                            <input type="text" name="totcount" hidden value="<?php echo $homeprice['total_person_count']; ?>">
                            <input type="text" name="totcountadult" hidden value="<?php echo $adultcount; ?>">
                            <input type="text" name="totcountkid" hidden value="<?php echo $kidcount; ?>">

                            <div class="person-information">
                                <h2>Your Personal Information</h2>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>first name</label>
                                        <input type="text" name="fname" class="input-text full-width" value="<?= $returned_row['first_name']; ?>" placeholder="" />
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>last name</label>
                                        <input type="text" name="lname" class="input-text full-width" value="<?= $returned_row['last_name']; ?>" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>email address</label>
                                        <input type="text" name="email" class="input-text full-width" value="<?= $returned_row['email_address']; ?>" placeholder="" />
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Phone number</label>
                                        <input type="text" name="contact" class="input-text full-width" value="<?= $returned_row['contact_number']; ?>" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="card-information">
                                <h2>Your Card Information</h2>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Credit Card Type</label>
                                        <div class="selector">
                                            <select name="cardtype" class="full-width">
                                                <option selected value=''>--Select a Card--</option>
                                                <option value='Visa Card'>Visa Card</option>
                                                <option value='Master Card'>Master Card</option>
                                                <option value='Amercian Express'>Amercian Express</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Card holder name</label>
                                        <input type="text" name="cardholdername" class="input-text full-width" value="" placeholder="Ex: John Doe" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Card number</label>
                                        <input type="number" name="cardnumber" class="input-text full-width" value="" placeholder="Ex: 1234 5678 9123 4567" />
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>CVV Number</label>
                                        <input type="number" class="input-text full-width" value="" placeholder="Ex: 456" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Expiration Date</label>
                                        <div class="constant-column-2">
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value=''>--Select Month--</option>
                                                    <option selected value='1'>Janaury</option>
                                                    <option value='2'>February</option>
                                                    <option value='3'>March</option>
                                                    <option value='4'>April</option>
                                                    <option value='5'>May</option>
                                                    <option value='6'>June</option>
                                                    <option value='7'>July</option>
                                                    <option value='8'>August</option>
                                                    <option value='9'>September</option>
                                                    <option value='10'>October</option>
                                                    <option value='11'>November</option>
                                                    <option value='12'>December</option>
                                                </select>
                                            </div>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value=''>--Select Year--</option>
                                                    <option selected value='1'>2022</option>
                                                    <option value='2'>2023</option>
                                                    <option value='3'>2024</option>
                                                    <option value='4'>2025</option>
                                                    <option value='5'>2026</option>
                                                    <option value='6'>2027</option>
                                                    <option value='7'>2028</option>
                                                    <option value='8'>2029</option>
                                                    <option value='9'>2030</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> By continuing, you agree to the <a href="terms-and-conditions.php" target="_blank"><span class="skin-color">Terms and Conditions</span></a>.
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <button type="submit" name="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                    <div class="booking-details travelo-box">
                        <h4>Booking Details</h4>
                        <article class="image-box hotel listing-style1">
                            <figure class="clearfix">
                                <a href="hotel-detailed.html" class="middle-block"><img class="middle-item" width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $homedata['cover_img1'] ?>"></a>
                                <div class="travel-title">
                                    <h5 class="box-title"><?php echo $homedata['home_name'] ?><small><?php echo $homedata['location_address'] ?>, <?php $homedata['district'] ?></small></h5>
                                </div>
                            </figure>
                            <div class="details">
                                <div class="feedback">
                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                    <span class="review">270 reviews</span>
                                </div>
                                <div class="constant-column-3 timing clearfix">
                                    <div class="check-in">
                                        <label>Check in</label>
                                        <span><?php echo $startdate; ?><br /><?php echo date('h:i A', strtotime($homedata['s_time'])); ?></span>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
                                        <span><?php echo $nightcount; ?> Nights</span>
                                    </div>
                                    <div class="check-out">
                                        <label>Check out</label>
                                        <span><?php echo $enddate; ?><br /><?php echo date('h:i A', strtotime($homedata['e_time'])); ?></span>
                                    </div>
                                </div>
                                <div class="guest">
                                    <small class="uppercase">Total : <span class="skin-color"><?php echo $homeprice['total_person_count'] ?> Persons</span></small>
                                </div>
                            </div>
                        </article>

                        <h4>Other Details</h4>
                        <dl class="other-details">
                            <dt class="feature">home Type:</dt>
                            <dd class="value"><?php echo $homedata['home_type'] ?></dd>
                            <dt class="feature">rooms include:</dt>
                            <dd class="value"><?php echo $homedata['rooms'] ?></dd>
                            <dt class="feature">total nights:</dt>
                            <dd class="value"><?php echo $nightcount; ?></dd>
                            <dt class="feature">per adult charge:</dt>
                            <dd class="value">LKR<?php echo $homedata['ava_night_price_adult'] ?></dd>
                            <?php
                            if ($kidcount > 0) {
                            ?>
                                <dt class="feature">per kid charge:</dt>
                                <dd class="value">LKR<?php echo $homedata['ava_night_price_kid'] ?></dd>
                            <?php
                            }
                            ?>
                            <dt class="feature"> Total <?php echo $adultcount; ?> Adults charge:</dt>
                            <dd class="value">LKR<?php echo $homeprice['total_adults_price'] ?></dd>
                            <?php
                            if ($kidcount > 0) {
                            ?>
                                <dt class="feature"> Total <?php echo $kidcount; ?> Kids charge:</dt>
                                <dd class="value">LKR<?php echo $homeprice['total_kids_price'] ?></dd>
                            <?php
                            }
                            ?>
                            <dt class="total-price">Total charge</dt>
                            <dd class="total-price-value">LKR <?php echo $homeprice['total_amount'] ?></dd>
                        </dl>
                    </div>

                    <div class="travelo-box contact-box">
                        <h4>Need HappyHolidayss Help?</h4>
                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                        <address class="contact-details">
                            <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                            <br>
                            <a class="contact-email" href="#">help@travelo.com</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include('includes/footer.php'); ?>
    <?php include('includes/jsscripts.php'); ?>
</body>

</html>