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
    $adultprice = $_REQUEST["hoprice"];
    $kidprice = $adultprice / 2;
    $totalcount = $_REQUEST["cadult"] + $_REQUEST["ckids"];
    $totadultprice = $_REQUEST["cadult"] * $adultprice;
    $totchildprice = $_REQUEST["ckids"] * $kidprice;
    $totpersons = $totadultprice + $totchildprice;
    $tot = $totpersons * $_REQUEST["cnight"];
    $hid = $_REQUEST["hoid"];
    $partnerid = $_REQUEST["pid"];
    $homename = $_REQUEST["honame"];
    $hometype = $_REQUEST["hotype"];
    $homeprice = $_REQUEST["hoprice"];
    $nightcount = $_REQUEST["cnight"];
    $homerooms = $_REQUEST["horoom"];
    $startdate = $_REQUEST["sdate"];
    $enddate = $_REQUEST["edate"];
    $homelocation = $_REQUEST["holocation"];
    $homedistrict = $_REQUEST["hodistrict"];
    $homeimage = $_REQUEST["hoimg"];
    $homeid = $_REQUEST["hoid"];
    $partnerid = $_REQUEST["pid"];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // Insert Record in booking table
    if (isset($_POST['submit'])) {

        $tot_amount = $_POST['total'];
        $cus_fname = $_POST['fname'];
        $cus_lname = $_POST['lname'];
        $cus_email = $_POST['email'];
        $cus_contact = $_POST['contact'];
        $cus_card_type = $_POST['cardtype'];
        $cus_id = $_POST['cusid'];
        $b_sdate = $_POST['homesdate'];
        $b_edate = $_POST['homeedate'];
        $b_tot_night = $_POST['totnight'];
        $b_tot_persons = $_POST['totcount'];
        $b_h_id = $_POST['homeid'];
        $b_h_name = $_POST['hname'];
        $pid = $_POST['partnerid'];


        $insertBookingData = $booking->insertBookingData($tot_amount, $cus_fname, $cus_lname, $cus_email, $cus_contact, $cus_card_type, $cus_id, $b_sdate, $b_edate, $b_tot_night, $b_tot_persons, $b_h_id, $b_h_name, $pid);
        // $insertEarningData = $earning->insertEarningData($tot_amount,$pid);

        if ($insertBookingData) {

            $message = "Home Reservation Success.";

            echo "<script type='text/javascript'>
            alert('$message');
            window.location.href = 'home-thankyou.php';
            </script>";
        } else {
            $message = "Home Reservation unSuccess.";

            echo "<script type='text/javascript'>
            alert('$message');
            window.location.href = 'sdn.php';
            </script>";
        }
    }
    ?>


<!-- passing booking values to thank you page via session -->
<?php
if (isset($_POST['submit'])) {
     $_SESSION['cus_first_name'] = $_POST['fname']; 
     $_SESSION['cus_last_name'] = $_POST['lname']; 
     $_SESSION['cus_email'] = $_POST['email']; 
     $_SESSION['cus_contact'] = $_POST['contact']; 
     $_SESSION['cus_card_type'] = $_POST['cardtype']; 
     $_SESSION['total_amount'] = $_POST['total']; 
     $_SESSION['home_true'] = $_POST['homeid']; 
     $_SESSION['booking_s_date'] = $_POST['homesdate']; 
     $_SESSION['booking_e_date'] = $_POST['homeedate']; 
     $_SESSION['booking_nights'] = $_POST['totnight']; 
     $_SESSION['booking_person_count'] = $_POST['totcount']; 
     $_SESSION['host_id'] = $_POST['partnerid']; 
     $_SESSION['customer_id'] = $_POST['cusid']; 




     
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
                            <input type="text" name="partnerid" hidden value="<?php echo $partnerid; ?>">
                            <input type="text" name="homeid" hidden value="<?php echo $homeid; ?>">
                            <input type="text" name="total" hidden value="<?php echo $tot; ?>">
                            <input type="text" name="hometype" hidden value="<?php echo $hometype; ?>">
                            <input type="text" name="homesdate" hidden value="<?php echo $startdate; ?>">
                            <input type="text" name="homeedate" hidden value="<?php echo $enddate; ?>">
                            <input type="text" name="totnight" hidden value="<?php echo $nightcount; ?>">
                            <input type="text" name="totcount" hidden value="<?php echo $totalcount; ?>">
                            <input type="text" name="hname" hidden value="<?php echo $homename; ?>">

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
                                <a href="hotel-detailed.html" class="middle-block"><img class="middle-item" width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $homeimage; ?>"></a>
                                <div class="travel-title">
                                    <h5 class="box-title"><?php echo $homename ?><small><?php echo $homelocation; ?>, <?php echo $homedistrict; ?></small></h5>
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
                                        <span><?php echo $startdate; ?><br />6 AM</span>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
                                        <span><?php $nightcount; ?> Nights</span>
                                    </div>
                                    <div class="check-out">
                                        <label>Check out</label>
                                        <span><?php echo $enddate; ?><br />12 AM</span>
                                    </div>
                                </div>
                                <div class="guest">
                                    <small class="uppercase">Total : <span class="skin-color"><?php echo $totalcount ?> Persons</span></small>
                                </div>
                            </div>
                        </article>

                        <h4>Other Details</h4>
                        <dl class="other-details">
                            <dt class="feature">home Type:</dt>
                            <dd class="value"><?php echo $hometype ?></dd>
                            <dt class="feature">rooms include:</dt>
                            <dd class="value"><?php echo $homerooms; ?></dd>
                            <dt class="feature">per adult price:</dt>
                            <dd class="value">LKR<?php echo $homeprice; ?></dd>
                            <dt class="feature">per kid price:</dt>
                            <dd class="value">LKR<?php echo $kidprice ?></dd>
                            <dt class="feature"><?php echo $nightcount; ?> night Stay:</dt>
                            <dd class="value">LKR<?php echo $tot; ?></dd>
                            <dt class="total-price">Total Price</dt>
                            <dd class="total-price-value">LKR <?php echo $tot; ?></dd>
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