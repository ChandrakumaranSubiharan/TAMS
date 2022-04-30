<?php
// Include database file
include_once 'includes/dbconfig.php';
?>

<?php include('includes/header.php'); ?>

<?php
$hid = intval($_GET['homeid']);
$homedata = $home->displyaRecordByIdviaArray($hid);
foreach ($homedata as $homeinfo) {
?>
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title"><?php echo $homeinfo['home_name']; ?></h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOMES</a></li>
                <li class="active"><?php echo $homeinfo['home_name']; ?></li>
            </ul>
        </div>
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    </head>

    <body>

        <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-md-9">
                        <div class="tab-container style1" id="hotel-main-content">

                            <div class="tab-content">
                                <div id="photos-tab" class="tab-pane fade in active">
                                    <div class="photo-gallery style1">
                                        <ul class="slides">
                                            <li><img src="partner/includes/uploads/<?php echo $homeinfo['cover_img1']; ?>" alt="" /></li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="map-tab" class="tab-pane fade">

                                </div>
                                <div id="calendar-tab" class="tab-pane fade">
                                    <label>SELECT MONTH</label>
                                    <div class="col-sm-6 col-md-4 no-float no-padding">
                                        <div class="selector">
                                            <select class="full-width" id="select-month">
                                                <option value="2014-6">June 2014</option>
                                                <option value="2014-7">July 2014</option>
                                                <option value="2014-8">August 2014</option>
                                                <option value="2014-9">September 2014</option>
                                                <option value="2014-10">October 2014</option>
                                                <option value="2014-11">November 2014</option>
                                                <option value="2014-12">December 2014</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="calendar"></div>
                                            <div class="calendar-legend">
                                                <label class="available">available</label>
                                                <label class="unavailable">unavailable</label>
                                                <label class="past">past</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="description">
                                                The calendar is updated every five minutes and is only an approximation of availability.
                                                <br /><br />
                                                Some hosts set custom pricing for certain days on their calendar, like weekends or holidays. The rates listed are per day and do not include any cleaning fee or rates for extra people the host may have for this listing. Please refer to the listing's Description tab for more details.
                                                <br /><br />
                                                We suggest that you contact the host to confirm availability and rates before submitting a reservation request.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="hotel-features" class="tab-container">
                            <ul class="tabs">
                                <li class="active"><a href="#hotel-description" data-toggle="tab">Description</a></li>
                                <li><a href="#home-availability" data-toggle="tab">Booking</a></li>
                                <li><a href="#home-amenities" data-toggle="tab">Amenities</a></li>
                                <li><a href="#home-reviews" data-toggle="tab">Reviews</a></li>
                                <li><a href="#home-faqs" data-toggle="tab">FAQs</a></li>
                                <li><a href="#home-write-review" data-toggle="tab">Write a Review</a></li>
                                <li><a href="#home-partner-info" data-toggle="tab">Host Info</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="hotel-description">
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <div class="col-sm-5 col-lg-4 features table-cell">
                                            <ul>
                                                <li><label>Home type:</label><?php echo $homeinfo['home_type']; ?></li>
                                                <li><label>Rooms include:</label><?php echo $homeinfo['rooms']; ?></li>
                                                <li><label>Max Adults:</label><?php echo $homeinfo['max_adults']; ?></li>
                                                <li><label>Max Kids:</label><?php echo $homeinfo['max_kids']; ?></li>
                                                <li><label>Province:</label><?php echo $homeinfo['province']; ?></li>
                                                <li><label>District:</label><?php echo $homeinfo['district']; ?></li>
                                                <li><label>City:</label><?php echo $homeinfo['location_address']; ?></li>
                                                <li><label>ava start date:</label><?php echo $homeinfo['ava_start_date']; ?></li>
                                                <li><label>ava end date:</label><?php echo $homeinfo['ava_end_date']; ?></li>
                                                <li><label>Cancellation:</label><?php
                                                                                if ($homeinfo['cancellation'] == 1) {
                                                                                    echo "Yes";
                                                                                } else {
                                                                                    echo "No";
                                                                                } ?> </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-7 col-lg-8 table-cell testimonials">
                                            <div class="testimonial style1">
                                                <ul class="slides ">
                                                    <?php
                                                    $reviewdata = $review->displayReviewsLimit($hid);

                                                    if ($reviewdata) {
                                                        foreach ($reviewdata as $reviewinfo) {
                                                    ?>
                                                            <li>
                                                                <p class="description"><?php echo $reviewinfo['review_description']; ?></p>
                                                                <div class="author clearfix">
                                                                    <a href="#"><img src="assets/images/user2.png" alt="" width="74" height="74" /></a>
                                                                    <h5 class="name"><?php echo $reviewinfo['first_name']; ?> <?php echo $reviewinfo['last_name']; ?><small>guest</small></h5>
                                                                </div>
                                                            </li>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Reviews Found.";
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="long-description">
                                        <h2>About <?php echo $homeinfo['home_name']; ?></h2>
                                        <p>
                                            <?php echo $homeinfo['lg_desc']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="home-availability">
                                    <div class="update-search clearfix">

                                        <form action="home-detail-payment.php" method="post" enctype="multipart/form-data">

                                            <!-- hidden inputs -->
                                            <input type="text" name="hoid" hidden value="<?php echo $homeinfo['home_id']; ?>">
                                            <input name="cnight" type="text" id="nights" hidden>
                                            <input name="adultprice" type="text" value="<?php echo $homeinfo['ava_night_price_adult']; ?>" hidden>
                                            <input name="kidprice" type="text" value="<?php echo $homeinfo['ava_night_price_kid']; ?>" hidden>

                                            <script>
                                                $(function() {
                                                    $("#date1").datepicker();
                                                    var date1 = $("#date1")
                                                });
                                                $(function() {
                                                    $("#date2").datepicker();
                                                    var date2 = $("#date2")
                                                });

                                                function func() {
                                                    date1 = new Date(date1.value);
                                                    date2 = new Date(date2.value);
                                                    var milli_secs = date1.getTime() - date2.getTime();
                                                    $days = milli_secs / (1000 * 3600 * 24);
                                                    $("#nights").val(Math.round(Math.abs($days)));

                                                }
                                            </script>


                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label>CHECK IN</label>
                                                        <input type="date" name="sdate" id="date1" class="input-text full-width" min="<?php echo $homeinfo['ava_start_date']; ?>" max="<?php echo $homeinfo['ava_end_date']; ?>" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>CHECK OUT</label>
                                                        <input type="date" name="edate" id="date2" class="input-text full-width" min="<?php echo $homeinfo['ava_start_date']; ?>" max="<?php echo $homeinfo['ava_end_date']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 id="ans"></h3>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label>ADULTS</label>
                                                        <input type="number" name="cadult" min="1" max="<?php echo $homeinfo['max_adults']; ?>" value="1" class="input-text full-width" />
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>KIDS</label>
                                                        <input type="number" name="ckids" min="0" max="<?php echo $homeinfo['max_kids']; ?>" value="0" class="input-text full-width">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="visible-md visible-lg">&nbsp;</label>
                                                <div class="row">
                                                    <div class="col-xs-9">
                                                        <button onclick="func()" data-animation-duration="1" name="book" data-animation-type="bounce" type="submit" value="book" class="full-width icon-check animated">BOOK NOW</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="home-amenities">
                                    <h2>Amenities</h2>

                                    <ul class="amenities clearfix style1">
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-wifi"></i>WI_FI</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-television"></i>television</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-coffee"></i>coffee</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-aircon"></i>air conditioning</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-fitnessfacility"></i>fitness facility</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-fridge"></i>fridge</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-winebar"></i>wine bar</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-smoking"></i>smoking allowed</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-pickanddrop"></i>pick and drop</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-phone"></i>room service</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-pets"></i>pets allowed</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-playplace"></i>play place</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-breakfast"></i>complimentary breakfast</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-parking"></i>Free parking</div>
                                        </li>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="soap-icon-tub"></i>Hot Tub</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="home-reviews">
                                    <div class="guest-reviews">
                                        <h2>Guest Reviews</h2>
                                        <?php
                                        $reviewdata = $review->displayReviews($hid);
                                        if ($reviewdata) {
                                            foreach ($reviewdata as $reviewinfo) {
                                        ?>
                                                <div class="guest-review table-wrapper">
                                                    <div class="col-xs-3 col-md-2 author table-cell">
                                                        <a href="#"><img src="assets/images/user2.png" alt="" width="270" height="263" /></a>
                                                        <p class="name"><?php echo $reviewinfo['first_name']; ?> <?php echo $reviewinfo['last_name']; ?></p>
                                                        <p class="date"><?php echo date('jS F, Y', strtotime($reviewinfo['created_date'])); ?></p>
                                                    </div>
                                                    <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                        <div class="comment-header clearfix">
                                                            <h4 class="comment-title"><?php echo $reviewinfo['review_title']; ?></h4>
                                                            <div class="review-score">
                                                                <div class="five-stars-container">
                                                                    <div class="five-stars" style="width: 80%;"></div>
                                                                </div>
                                                                <span class="score"><?php echo $reviewinfo['review_rating']; ?>/5</span>
                                                            </div>
                                                        </div>
                                                        <div class="comment-content">
                                                            <p><?php echo $reviewinfo['review_description']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo "No Reviews Found.";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="home-faqs">
                                    <div class="toggle-container">
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question1" data-toggle="collapse">How do I confirm that I paid for my booking?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question1">
                                                <div class="panel-content">
                                                    <p> You’ll find payment confirmation in your dashboard bookings. In the bookings page, there's is a option to view the payment confirmation status.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question2" data-toggle="collapse">I can't find my booking in my account. What should I do?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question2">
                                                <div class="panel-content">
                                                    <p>If you were signed in when booking, it should appear in the Bookings section of your account. <br>
                                                        If you weren't signed in when booking, the booking won't appear, and you can't add this booking to your account. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="" href="#question3" data-toggle="collapse">Can I get extra beds/cribs for children??</a>
                                            </h4>
                                            <div class="panel-collapse collapse in" id="question3">
                                                <div class="panel-content">
                                                    <p>It depends on the property’s policy. Typically, additional costs for children (including extra beds/cribs) aren't included in the price. Contact the property directly 1 to 2 days before your stay to find out more.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question4" data-toggle="collapse">Can I change the guest name for this booking?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question4">
                                                <div class="panel-content">
                                                    <p>It’s not possible to change any personal details like the guest's name or email address.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question5" data-toggle="collapse">How do I request early or late check-in/-out?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question5">
                                                <div class="panel-content">
                                                    <p>To request a different check-in/-out time, contact the property directly 1 or 2 days before arrival. There's no guarantee, but they might be able to help.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question6" data-toggle="collapse">Can I use credit to make this booking?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question6">
                                                <div class="panel-content">
                                                    <p>No, it’s not possible to use travel credit toward bookings facilitated by partner travel companies. Choose a different room or rate instead.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question7" data-toggle="collapse">Can I use a coupon or promotional link to make this booking?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question7">
                                                <div class="panel-content">
                                                    <p>No, this booking can't be made with rewards or incentive programs. Even if you use a unique link or code to make this booking, you won't be rewarded for this stay.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="home-write-review">

                                    <?php

                                    if (isset($_POST['submit-rewiew'])) {

                                        if (!$auth->is_logged_in()) {

                                            $message = "Please Login Before Writing the Review !";
                                            echo "<script type='text/javascript'>
                                                alert('$message');
                                                window.location.href = 'login.php';
                                                </script>";
                                        } else {
                                            // Retrieve form input
                                            $title = $_POST['title'];
                                            $des = $_POST['description'];
                                            $u_type = $_POST['user_type'];
                                            $rating = $_POST['review_rating'];
                                            $customerid = $_POST['cid'];
                                            $servicename = $_POST['hname'];
                                            $serviceid = $_POST['sid'];

                                            // Check for empty and invalid inputs
                                            if (empty($title)) {
                                                echo '<script>alert("Please enter a valid Title")</script>';
                                            } elseif (empty($des)) {
                                                echo '<script>alert("Please enter a valid Review")</script>';
                                            } elseif (empty($u_type)) {
                                                echo '<script>alert("Please Select a valid What sort of Trip was this.")</script>';
                                            } elseif (empty($rating)) {
                                                echo '<script>alert("Please Select a valid Rating.")</script>';
                                            } else {

                                                // Check if the user may send the review
                                                if ($review->create_review($title, $des, $u_type, $rating, $customerid, $serviceid, $servicename)) {

                                                    $message = "Review Successfully submitted !";
                                                    echo "<script type='text/javascript'>
                                                        alert('$message');
                                                        </script>";
                                                } else {
                                                    $message = "Review Failed to submit !";
                                                    echo "<script type='text/javascript'>
                                                        alert('$message');
                                                        </script>";
                                                }
                                            }
                                        }
                                    };

                                    ?>





                                    <form method="POST" class="review-form">
                                        <input type="text" name="sid" hidden value="<?php echo $homeinfo['home_id']; ?>">
                                        <input type="text" name="hname" hidden value="<?php echo $homeinfo['home_name']; ?>">
                                        <input type="text" name="cid" hidden value="<?php echo $returned_row['customer_id']; ?>">

                                        <div class="form-group col-md-5 no-float no-padding">
                                            <h4 class="title">Title of your review</h4>
                                            <input type="text" name="title" class="input-text full-width" value="" placeholder="enter a review title" />
                                        </div>
                                        <div class="form-group">
                                            <h4 class="title">Your review</h4>
                                            <textarea name="description" class="input-text full-width" placeholder="enter your review (minimum 200 characters)" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <h4 class="title">What sort of Stay was this?</h4>
                                            <div class="selector">
                                                <select name='user_type' class="full-width" id="select-u-type">
                                                    <option value="Business">Business</option>
                                                    <option value="Couples">Couples</option>
                                                    <option value="Family">Family</option>
                                                    <option value="Friends">Friends</option>
                                                    <option value="Solo">Solo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h4 class="title">Your Overall Experience with the Service? (Rate out of 5)</h4>
                                            <div class="selector">
                                                <select name='review_rating' class="full-width">
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Star</option>
                                                    <option value="3">3 Star</option>
                                                    <option value="4">4 Star</option>
                                                    <option value="5">5 Star</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5 no-float no-padding no-margin">
                                            <button type="submit" name="submit-rewiew" class="btn-large full-width">SUBMIT REVIEW</button>
                                        </div>
                                    </form>

                                </div>




                                <div class="tab-pane fade" id="home-partner-info">

                                    <h2>Service Host Details</h2>
                                    <dl class="term-description">
                                        <?php
                                        $partnerid = $homeinfo['partner_id'];
                                        $partnerdata = $partner->displyaRecordByIdviaArray($partnerid);
                                        foreach ($partnerdata as $partnerinfo) {
                                        }
                                        ?>
                                        <dt>Host Name:</dt>
                                        <dd><?php echo $partnerinfo['first_name'];  ?> <?php echo $partnerinfo['last_name'];  ?></dd>
                                        <dt>Contact:</dt>
                                        <dd> <?php echo $partnerinfo['contact_number']; ?></dd>
                                        <dt>Email:</dt>
                                        <dd> <?php echo $partnerinfo['email_address']; ?></dd>
                                    </dl>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="sidebar col-md-3">
                        <article class="detailed-logo">
                            <figure>
                                <img width="114" height="85" src="partner/includes/uploads/<?php echo $homeinfo['cover_img1']; ?>" alt="">

                            </figure>
                            <h2 class="box-title"><?php echo $homeinfo['home_name']; ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?php echo $homeinfo['location_address']; ?>, <?php echo $homeinfo['district']; ?></span></small></h2>
                            <span class="price clearfix">
                                <small class="pull-left">avg/night/adult</small>
                                <span class="pull-right">LKR<?php echo $homeinfo['ava_night_price_adult']; ?></span>
                            </span>
                            <span class="price clearfix">
                                <small class="pull-left">avg/night/kid</small>
                                <span class="pull-right">LKR<?php echo $homeinfo['ava_night_price_kid']; ?></span>
                            </span>
                            <div class="feedback clearfix">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <?php
                                $reviewscount = $review->GetReviewsCount($hid)
                                ?>
                                <span class="review pull-right"><?php echo $reviewscount ?> reviews</span>
                            </div>
                        </article>
                        <div class="travelo-box contact-box">
                            <h4>Need HappyHolidayss Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> +94 775 43035-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@HappyHolidayss.com</a>
                            </address>
                        </div>
                        <div class="travelo-box book-with-us-box">
                            <h4>Why Book with us?</h4>
                            <ul>
                                <li>
                                    <i class="soap-icon-hotel-1 circle"></i>
                                    <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                                </li>
                                <li>
                                    <i class="soap-icon-savings circle"></i>
                                    <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                                </li>
                                <li>
                                    <i class="soap-icon-support circle"></i>
                                    <h5 class="title"><a href="#">Excellent Support</a></h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php }
    ?>

    </body>

    </html>






    <?php include('includes/footer.php'); ?>
    <?php include('includes/jsscripts.php'); ?>