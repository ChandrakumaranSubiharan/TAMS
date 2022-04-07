<?php
// Include database file
include_once 'includes/dbconfig.php';
?>

<?php include('includes/header.php'); ?>

<?php
$tid = intval($_GET['tourid']);
$tourdata = $tour->displyaRecordByIdviaArray($tid);
foreach ($tourdata as $tourinfo) {
?>
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title"><?php echo $tourinfo['title']; ?></h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOMES</a></li>
                <li><a href="#">TOURS</a></li>
                <li class="active"><?php echo $tourinfo['title']; ?></li>
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
                                            <li><img src="partner/includes/uploads/<?php echo $tourinfo['image']; ?>" alt="" /></li>
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
                                <li><a href="#hotel-availability" data-toggle="tab">Booking</a></li>
                                <li><a href="#hotel-amenities" data-toggle="tab">Amenities</a></li>
                                <li><a href="#hotel-reviews" data-toggle="tab">Reviews</a></li>
                                <li><a href="#hotel-faqs" data-toggle="tab">FAQs</a></li>
                                <li><a href="#hotel-write-review" data-toggle="tab">Write a Review</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="hotel-description">
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <div class="col-sm-5 col-lg-4 features table-cell">
                                            <ul>
                                                <li><label>Tour type:</label><?php echo $tourinfo['tour_type']; ?></li>
                                                <li><label>Guide Language:</label><?php echo $tourinfo['language']; ?></li>
                                                <li><label>Ava Seats:</label><?php echo $tourinfo['availabile_seats']; ?></li>
                                                <li><label>District:</label><?php echo $tourinfo['district']; ?></li>
                                                <li><label>Starting City:</label><?php echo $tourinfo['location']; ?></li>
                                                <li><label>Assembly Point:</label><?php echo $tourinfo['gathering_location']; ?></li>
                                                <li><label>Start Date:</label><?php echo $tourinfo['ava_start_date']; ?></li>
                                                <li><label>Start Time:</label><?php echo date('h:i A', strtotime($tourinfo['s_time']));?></li>
                                                <li><label>End Date:</label><?php echo $tourinfo['ava_end_date']; ?></li>
                                                <li><label>End Time:</label><?php echo date('h:i A', strtotime($tourinfo['e_time']));?></li>
                                                <li><label>Duration:</label><?php echo $tourinfo['duration_nights']; ?> Nights</li>
                                                <li><label>Cancellation:</label><?php
                                                                                if ($tourinfo['cancellation'] == 1) {
                                                                                    echo "Yes";
                                                                                } else {
                                                                                    echo "No";
                                                                                } ?> </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-7 col-lg-8 table-cell testimonials">
                                            <div class="testimonial style1">
                                                <ul class="slides ">
                                                    <li>
                                                        <p class="description">Always enjoyed my stay with Hilton Hotel and Resorts, top class room service and rooms have great outside views and luxury assessories. Thanks for great experience.</p>
                                                        <div class="author clearfix">
                                                            <h5 class="name">Jessica Brown<small>guest</small></h5>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="long-description">
                                        <h2>About <?php echo $tourinfo['title']; ?></h2>
                                        <p>
                                            <?php echo $tourinfo['details']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="hotel-availability">
                                    <div class="update-search clearfix">

                                        <form action="tour-detail-payment.php" method="post" enctype="multipart/form-data">
                                            <!-- hidden inputs -->
                                            <input type="text" name="toid" hidden value="<?php echo $tourinfo['tour_id']; ?>">
                                            <input type="text" name="toprice" hidden value="<?php echo $tourinfo['adult_price']; ?>">

                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label>Tour Start Date</label>
                                                        <input type="date" name="sdate" value="<?php echo $tourinfo['ava_start_date']; ?>" disabled id="date1" class="input-text full-width"  />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Tour End Date</label>
                                                        <input type="date" name="edate" value="<?php echo $tourinfo['ava_end_date']; ?>" disabled id="date2" class="input-text full-width"  />
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 id="ans"></h3>
                                            <div class="col-md-4">
                                                <div class="row">
                                                <div class="col-xs-4">
                                                        <label>Tot Nights</label>
                                                        <input type="number" disabled value="<?php echo $tourinfo['duration_nights']; ?>"  name="cduration" class="input-text full-width" />
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>ADULTS</label>
                                                        <input type="number" min="1" max="<?php echo $tourinfo['availabile_seats']; ?>" value="1" name="cadult" class="input-text full-width" />
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>KIDS</label>
                                                        <input type="number" min="0" max="<?php echo $tourinfo['availabile_seats']; ?>" value="0" name="ckids" class="input-text full-width">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="visible-md visible-lg">&nbsp;</label>
                                                <div class="row">
                                                    <div class="col-xs-9">
                                                        <button data-animation-duration="1" name="book" data-animation-type="bounce" type="submit" value="book" class="full-width icon-check animated">BOOK NOW</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="hotel-amenities">
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
                                <div class="tab-pane fade" id="hotel-reviews">
                                    <div class="guest-reviews">
                                        <h2>Guest Reviews</h2>
                                        <div class="guest-review table-wrapper">
                                            <div class="col-xs-3 col-md-2 author table-cell">
                                                <a href="#"><img src="#" alt="" width="270" height="263" /></a>
                                                <p class="name">Jessica Brown</p>
                                                <p class="date">NOV, 12, 2013</p>
                                            </div>
                                            <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                <div class="comment-header clearfix">
                                                    <h4 class="comment-title">We had great experience while our stay and Hilton Hotels!</h4>
                                                    <div class="review-score">
                                                        <div class="five-stars-container">
                                                            <div class="five-stars" style="width: 80%;"></div>
                                                        </div>
                                                        <span class="score">4.0/5.0</span>
                                                    </div>
                                                </div>
                                                <div class="comment-content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="hotel-faqs">
                                    <div class="toggle-container">
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question1" data-toggle="collapse">How do I know a reservation is accepted or confirmed?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question1">
                                                <div class="panel-content">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question2" data-toggle="collapse">What do I do after I receive a reservation request from a guest?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question2">
                                                <div class="panel-content">
                                                    <p>Sed a justo enim. Vivamus volutpat ipsum ultrices augue porta lacinia. Proin in elementum enim. <span class="skin-color">Duis suscipit justo</span> non purus consequat molestie. Etiam pharetra ipsum sagittis sollicitudin ultricies. Praesent luctus, diam ut tempus aliquam, diam ante euismod risus, euismod viverra quam quam eget turpis. Nam <span class="skin-color">tristique congue</span> arcu, id bibendum diam. Ut hendrerit, leo a pellentesque porttitor, purus arcu tristique erat, in faucibus elit leo in turpis vitae luctus enim, a mollis nulla.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="" href="#question3" data-toggle="collapse">How much time do I have to respond to a reservation request?</a>
                                            </h4>
                                            <div class="panel-collapse collapse in" id="question3">
                                                <div class="panel-content">
                                                    <p>Sed a justo enim. Vivamus volutpat ipsum ultrices augue porta lacinia. Proin in elementum enim. <span class="skin-color">Duis suscipit justo</span> non purus consequat molestie. Etiam pharetra ipsum sagittis sollicitudin ultricies. Praesent luctus, diam ut tempus aliquam, diam ante euismod risus, euismod viverra quam quam eget turpis. Nam <span class="skin-color">tristique congue</span> arcu, id bibendum diam. Ut hendrerit, leo a pellentesque porttitor, purus arcu tristique erat, in faucibus elit leo in turpis vitae luctus enim, a mollis nulla.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question4" data-toggle="collapse">Why can’t I call or email hotel or host before booking?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question4">
                                                <div class="panel-content">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question5" data-toggle="collapse">Am I allowed to decline reservation requests?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question5">
                                                <div class="panel-content">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question6" data-toggle="collapse">What happens if I let a reservation request expire?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question6">
                                                <div class="panel-content">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel style1 arrow-right">
                                            <h4 class="panel-title">
                                                <a class="collapsed" href="#question7" data-toggle="collapse">How do I set reservation requirements?</a>
                                            </h4>
                                            <div class="panel-collapse collapse" id="question7">
                                                <div class="panel-content">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="hotel-write-review">
                                    <form class="review-form">
                                        <div class="form-group col-md-5 no-float no-padding">
                                            <h4 class="title">Title of your review</h4>
                                            <input type="text" name="review-title" class="input-text full-width" value="" placeholder="enter a review title" />
                                        </div>
                                        <div class="form-group">
                                            <h4 class="title">Your review</h4>
                                            <textarea class="input-text full-width" placeholder="enter your review (minimum 200 characters)" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <h4 class="title">What sort of Trip was this?</h4>
                                            <ul class="sort-trip clearfix">
                                                <li><a href="#"><i class="soap-icon-businessbag circle"></i></a><span>Business</span></li>
                                                <li><a href="#"><i class="soap-icon-couples circle"></i></a><span>Couples</span></li>
                                                <li><a href="#"><i class="soap-icon-family circle"></i></a><span>Family</span></li>
                                                <li><a href="#"><i class="soap-icon-friends circle"></i></a><span>Friends</span></li>
                                                <li><a href="#"><i class="soap-icon-user circle"></i></a><span>Solo</span></li>
                                            </ul>
                                        </div>
                                        <div class="form-group col-md-5 no-float no-padding no-margin">
                                            <button type="submit" class="btn-large full-width">SUBMIT REVIEW</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="sidebar col-md-3">
                        <article class="detailed-logo">
                            <figure>
                                <img width="114" height="85" src="partner/includes/uploads/<?php echo $tourinfo['image']; ?>" alt="">

                            </figure>
                            <h2 class="box-title"><?php echo $tourinfo['title']; ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?php echo $tourinfo['location']; ?>, <?php echo $tourinfo['district']; ?></span></small></h2>
                            <span class="price clearfix">
                                <small class="pull-left">avg/adult price</small>
                                <span class="pull-right">LKR<?php echo $tourinfo['adult_price']; ?></span>
                            </span>
                            <span class="price clearfix">
                                <small class="pull-left">avg/kid price</small>
                                <span class="pull-right">LKR<?php echo $tourinfo['kid_price']; ?></span>
                            </span>
                            <div class="feedback clearfix">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review pull-right">270 reviews</span>
                            </div>
                        </article>
                        <div class="travelo-box contact-box">
                            <h4>Need Travelo Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@travelo.com</a>
                            </address>
                        </div>
                        <div class="travelo-box book-with-us-box">
                            <h4>Why Book with us?</h4>
                            <ul>
                                <li>
                                    <i class="soap-icon-hotel-1 circle"></i>
                                    <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                                <li>
                                    <i class="soap-icon-savings circle"></i>
                                    <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                                <li>
                                    <i class="soap-icon-support circle"></i>
                                    <h5 class="title"><a href="#">Excellent Support</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
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