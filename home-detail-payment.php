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

    $totalcount = $_POST["cadult"]+$_POST["ckids"];

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


    



    <section id="content" class="gray-area">
        <div class="container">
            <div class="row">
                <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                    <div class="booking-section travelo-box">

                        <form class="booking-form">

                        <!-- hidden inputs -->
                        <input type="text" name="id" hidden value="<?php echo $_POST["hoid"]; ?>">



                            <div class="person-information">
                                <h2>Your Personal Information</h2>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>first name</label>
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>last name</label>
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>email address</label>
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Verify E-mail Address</label>
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Country code</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option>United Kingdom (+44)</option>
                                                <option>United States (+1)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>Phone number</label>
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
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
                                            <select class="full-width">
                                                <option>select a card</option>
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
                                                    <option>month</option>
                                                </select>
                                            </div>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option>year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-2">
                                        <label>billing zip code</label>
                                        <input type="text" class="input-text full-width" value="" placeholder="" />
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
                                <a href="hotel-detailed.html" class="middle-block"><img class="middle-item" width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $_POST["hoimg"]; ?>"></a>
                                <div class="travel-title">
                                    <h5 class="box-title"><?php echo $_POST["honame"]; ?><small><?php echo $_POST["holocation"]; ?>, <?php echo $_POST["hodistrict"]; ?></small></h5>
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
                                        <span><?php echo $_POST["sdate"]; ?><br />6 AM</span>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
                                        <span><?php echo $_POST["cnight"]; ?> Nights</span>
                                    </div>
                                    <div class="check-out">
                                        <label>Check out</label>
                                        <span><?php echo $_POST["edate"]; ?><br />12 AM</span>
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
                            <dd class="value"><?php echo $_POST["hotype"]; ?></dd>
                            <dt class="feature">rooms include:</dt>
                            <dd class="value"><?php echo $_POST["horoom"]; ?></dd>
                            <dt class="feature">per adult price:</dt>
                            <dd class="value">LKR<?php echo $_POST["hoprice"]; ?></dd> 
                            <dt class="feature">per kid price:</dt>
                            <dd class="value">LKR<?php echo $kidprice ?></dd>
                            <dt class="feature"><?php echo $_POST["cnight"]; ?> night Stay:</dt>
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