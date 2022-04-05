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
    $tid = $_REQUEST['toid'];
    $tcadult = $_REQUEST['cadult'];
    $tckid = $_REQUEST['ckids'];
    $tcprice = $_REQUEST['toprice'];
    $tourprice = $tour->TourPriceCalculation($tcadult, $tckid, $tcprice);
    $tourdata = $tour->displyaRecordById($tid);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>


    <!-- passing booking values to thank you page via session -->
    <?php
    if (isset($_POST['submit'])) {
    }
    ?>

</head>

<body>


<?php
// Insert Record in booking table
if (isset($_POST['submit'])) {


    $cus_id = $_POST['cusid'];
    $cus_fname = $_POST['fname'];
    $cus_lname = $_POST['lname'];
    $cus_email = $_POST['email'];
    $cus_contact = $_POST['contact'];
    $cus_card_type = $_POST['cardtype'];
    $serviceid = $_POST['tourid'];
    $adult_count = $_POST['cadult'];
    $kid_count = $_POST['ckid'];
    $total_persons_count = $_POST['cpersons'];
    $total_amount = $_POST['tamount'];
    $tourdata = $tour->displyaRecordById($serviceid);
    $pid = $tourdata['partner_id'];
    $sdate = $tourdata['ava_start_date'];
    $edate = $tourdata['ava_end_date'];
    $snights = $tourdata['duration_nights'];
    $servicename = $tourdata['title'];
    $availabile_seats = $tourdata['availabile_seats'];
    $type = 'Tour Package';

    $net_amount = $earning->TourPercentageCalculate($total_amount);
    $payout = $earning->Payout($total_amount, $net_amount);
    $tourUpdate = $tour->tour_update_after_booking($serviceid,$total_persons_count,$availabile_seats);
    $insertBookingData = $booking->insertBookingData($total_amount, $cus_fname, $cus_lname, $cus_email, $cus_contact, $cus_card_type, $cus_id, $sdate, $edate, $snights, $total_persons_count, $pid, $kid_count, $adult_count, $serviceid, $servicename, $type);
    $insertEarningData = $earning->insertEarningData($pid, $total_amount, $payout, $net_amount, $cus_id, $servicename, $serviceid, $type);


    if ($insertBookingData && $insertEarningData && $tourUpdate) {

        $message = "Tour Reservation Success.";
        echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'tour-thankyou.php';
        </script>";
    } 
    
    else {
        $message = "Tour Reservation unSuccessful. Entered Tourists Count Greater than Available Seats Count";
        echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'tour-detailed.php?tourid=$serviceid';
        </script>";
    }
}
?>





    <?php include('includes/header.php'); ?>
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Payment</h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">TOURS</a></li>
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
                            <input type="text" name="tourid" hidden value="<?php echo $tourdata['tour_id']; ?>">
                            <input type="text" name="tamount" hidden value="<?php echo $tourprice['total_amount']; ?>">
                            <input type="text" name="cadult" hidden value="<?php echo $tcadult; ?>">
                            <input type="text" name="ckid" hidden value="<?php echo $tckid; ?>">
                            <input type="text" name="cpersons" hidden value="<?php echo $tourprice['person_sum']; ?>">


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
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Card number</label>
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Card identification number</label>
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
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
                                        <input type="checkbox"> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
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
                                <a href="hotel-detailed.html" class="middle-block"><img class="middle-item" width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $tourdata['image']; ?>"></a>
                                <div class="travel-title">
                                    <h5 class="box-title"><?php echo $tourdata['title']; ?><small><?php echo $tourdata['location']; ?>, <?php echo $tourdata['district']; ?></small></h5>
                                </div>
                            </figure>
                            <div class="details">
                                <div class="feedback">
                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                    <span class="review">270 reviews</span>
                                </div>
                                <div class="constant-column-3 timing clearfix">
                                    <div class="check-in">
                                        <label>Start Date</label>
                                        <span><?php echo $tourdata['ava_start_date']; ?><br /><?php echo date('h:i A', strtotime($tourdata['s_time'])); ?></span>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
                                        <span><?php echo $tourdata['duration_nights']; ?> Nights</span>
                                    </div>
                                    <div class="check-out">
                                        <label>End Date</label>
                                        <span><?php echo $tourdata['ava_end_date']; ?><br /><?php echo date('h:i A', strtotime($tourdata['e_time'])); ?></span>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <h4>Other Details</h4>
                        <dl class="other-details">
                            <dt class="feature">Tour Type:</dt>
                            <dd class="value"><?php echo $tourdata['tour_type']; ?></dd>

                            <dt class="feature">Guide Language:</dt>
                            <dd class="value"><?php echo $tourdata['language']; ?></dd>

                            <dt class="feature">Ava Seats:</dt>
                            <dd class="value"><?php echo $tourdata['availabile_seats']; ?></dd>

                            <dt class="feature">District:</dt>
                            <dd class="value"><?php echo $tourdata['district']; ?></dd>

                            <dt class="feature">Starting City:</dt>
                            <dd class="value"><?php echo $tourdata['location']; ?></dd>

                            <dt class="feature">Assembly Point:</dt>
                            <dd class="value"><?php echo $tourdata['gathering_location']; ?></dd>

                            <dt class="feature">Cancellation:</dt>
                            <dd class="value"><?php
                                                if ($tourdata['cancellation'] == 1) {
                                                    echo "Yes";
                                                } else {
                                                    echo "No";
                                                } ?></dd>

                            <dt class="feature">Total Seats Reserved:</dt>
                            <dd class="value"><?php echo $tourprice['person_sum']; ?></dd>

                            <dt class="feature">For Adults:</dt>
                            <dd class="value"><?php echo $tcadult; ?> Seat</dd>

                            <dt class="feature">For Kids:</dt>
                            <dd class="value"><?php echo $tckid; ?> Seat</dd>

                            <dt class="feature">Avg/Adult Price:</dt>
                            <dd class="value"><?php echo $tourdata['adult_price']; ?></dd>

                            <dt class="feature">Avg/Kid Price:</dt>
                            <dd class="value"><?php echo $tourprice['kid_price']; ?></dd>

                            <dt class="total-price">Total Reservation <br> Amount:</dt>
                            <dd class="total-price-value">LKR <?php echo $tourprice['total_amount']; ?></dd>
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