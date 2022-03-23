<!DOCTYPE html>
<html lang="en">

<head>

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


    <?php
    $adultprice = $_POST["hoprice"];
    $kidprice = $adultprice / 2;
    $totalcount = $_POST["cadult"] + $_POST["ckids"];
    $totadultprice = $_POST["cadult"] * $adultprice;
    $totchildprice = $_POST["ckids"] * $kidprice;
    $totpersons = $totadultprice + $totchildprice;
    $tot = $totpersons * $_POST["cnight"];
    ?>

<?php
// Insert Record in booking table
if(isset($_POST['submit'])) {

    $tot_amount = $_POST[$tot];
    $cus_fname = $_POST['fname'];
    $cus_lname = $_POST['lname'];
    $cus_email = $_POST['email'];
    $cus_contact = $_POST['contact'];
    $cus_card_type = $_POST[$htype];
    $cus_id = $_POST['cusid'];
    $b_sdate = $_POST[$hsdate];
    $b_edate = $_POST[$hedate];
    $b_tot_night = $_POST[$hcnight];
    $b_tot_persons = $_POST[$totalcount];
    $b_h_id = $_POST[$hid];
    $b_h_name = $_POST[$name];
    // $partner_id = $_POST['pid'];



    $insertData = $home->insertData($home_name, $location_address, $ava_night_price, $lg_desc, $home_type, $extra_people, $district, $province, $cancel, $str_date, $end_date, $file);

    if ($insertData){
        $msg = "Home successfully created ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }else{
        $msg = "Failed to Create Home ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
}
?>

<!-- retriving from home detailed page via post request -->
<?php 
$hname=$_POST["honame"]; 
$hlocation=$_POST["holocation"]; 
$hdistrict=$_POST["hodistrict"]; 
$hsdate=$_POST["sdate"]; 
$hcnight=$_POST["cnight"]; 
$hedate=$_POST["edate"]; 
$htype=$_POST["hotype"]; 
$hroom=$_POST["horoom"]; 
$hprice=$_POST["hoprice"]; 
$himg=$_POST["hoimg"]; 
$hid=$_POST["hoid"]; 
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
                            <input type="text" name="cusid" hidden  value="<?= $returned_row['customer_id']; ?>">



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
                                                <option value=''>--Select a Card--</option>
                                                    <option selected value='Visa Card'>Visa Card</option>
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
                                    <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
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
                                <a href="hotel-detailed.html" class="middle-block"><img class="middle-item" width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $himg; ?>"></a>
                                <div class="travel-title">
                                    <h5 class="box-title"><?php echo $hname; ?><small><?php echo $hlocation; ?>, <?php echo $hdistrict; ?></small></h5>
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
                                        <span><?php echo $hsdate; ?><br />6 AM</span>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
                                        <span><?php echo $hcnight; ?> Nights</span>
                                    </div>
                                    <div class="check-out">
                                        <label>Check out</label>
                                        <span><?php echo $hedate; ?><br />12 AM</span>
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
                            <dd class="value"><?php echo $htype; ?></dd>
                            <dt class="feature">rooms include:</dt>
                            <dd class="value"><?php echo $hroom; ?></dd>
                            <dt class="feature">per adult price:</dt>
                            <dd class="value">LKR<?php echo $hprice; ?></dd>
                            <dt class="feature">per kid price:</dt>
                            <dd class="value">LKR<?php echo $kidprice ?></dd>
                            <dt class="feature"><?php echo $hcnight; ?> night Stay:</dt>
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