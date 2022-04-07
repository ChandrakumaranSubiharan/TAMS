<?php
// Include database file
include_once 'includes/dbconfig.php';
?>



<?php include('includes/header.php'); ?>



<!-- slideshow -->
<div id="slideshow">
    <div class="fullwidthbanner-container">
        <div class="revolution-slider" style="height: 0; overflow: hidden;">
            <ul>
                <!-- SLIDE  -->
                <!-- Slide1 -->
                <li data-transition="zoomin" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img src="assets/images/slider/01.png" alt="">
                </li>

                <!-- Slide2 -->
                <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img src="assets/images/slider/01.png" alt="">

                </li>

                <!-- Slide3 -->
                <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img src="assets/images/slider/01.png" alt="">
                </li>
            </ul>
        </div>
    </div>
</div>
<section id="content">





    <!-- Search bar -->
    <div class="search-box-wrapper">
        <div class="search-box container">
            <ul class="search-tabs clearfix">
                <li class="active"><a href="#hotels-tab" data-toggle="tab">STAYS</a></li>
                <li><a href="#flights-tab" data-toggle="tab">TOURS</a></li>
            </ul>
            <div class="visible-mobile">
                <ul id="mobile-search-tabs" class="search-tabs clearfix">
                    <li class="active"><a href="#hotels-tab">STAYS</a></li>
                    <li><a href="#online-checkin-tab">TOURS</a></li>
                </ul>
            </div>

            <div class="search-tab-content">
                <div class="tab-pane fade active in" id="hotels-tab">
                    <form action="homes-search-list.php" method="post">
                        <input type="text" name="adultpricerange" hidden value="50000" />
                        <div class="row">
                            <div class="form-group col-sm-6 col-md-2">
                                <h4 class="title">Where</h4>
                                <label>Select Destination</label>
                                <div class="selector">
                                    <select name="district" class="full-width">
                                        <option value="Kandy">Kandy</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Jaffna">Jaffna</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-4">
                                <h4 class="title">When</h4>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Check In</label>
                                        <div class="datepicker-wrap">
                                            <input type="date" name="sdate" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Check Out</label>
                                        <div class="datepicker-wrap">
                                            <input type="date" name="edate" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-8 col-md-4">
                                <h4 class="title">Who and Space</h4>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>Adults</label>
                                        <div class="selector">
                                            <select name="cadult" class="full-width">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>Kids</label>
                                        <div class="selector">
                                            <select name="ckid" class="full-width">
                                                <option value="0">No</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>Rooms</label>
                                        <div class="selector">
                                            <select name="croom" class="full-width">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>Home Type</label>
                                        <div class="selector">
                                            <select name="htype" class="full-width">
                                                <option value="resort">Resort</option>
                                                <option value="villa">Villa</option>
                                                <option value="cabin">Cabin</option>
                                                <option value="cottage">Cottage</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-2 fixheight">
                                <label class="hidden-xs">&nbsp;</label>
                                <button type="submit" name="homesubmit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="flights-tab">
                    <form action="tours-search-list.php" method="post">
                        <input type="text" name="pricerange" hidden value="50000" />
                        <div class="row">
                            <div class="form-group col-sm-6 col-md-2">
                                <h4 class="title">Where</h4>
                                <label>Select Destination</label>
                                <div class="selector">
                                    <select name="tdistrict" class="full-width">
                                        <option value="kandy">Kandy</option>
                                        <option value="colombo">Colombo</option>
                                        <option value="jaffna">Jaffna</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-2">
                                <h4 class="title">When</h4>
                                <label>from when onwards</label>
                                <div class="datepicker-wrap">
                                    <input type="date" name="sdate" class="input-text full-width" placeholder="mm/dd/yy" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-4">
                                <h4 class="title">How</h4>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Select Tour Type</label>
                                        <div class="selector">
                                            <select name="ttype" class="full-width">
                                                <option value="Active Adventure">Active Adventure</option>
                                                <option value="2">Colombo</option>
                                                <option value="3">Jaffna</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Select Guide Language</label>
                                        <div class="selector">
                                            <select name="tlan" class="full-width">
                                                <option value="english">English</option>
                                                <option value="tamil">Tamil</option>
                                                <option value="sinhala">Sinhala</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-8 col-md-2">
                                <h4 class="title">Who and Space</h4>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <label>Adults</label>
                                        <div class="selector">
                                            <select name="cadult" class="full-width">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-5">
                                        <label>Kids</label>
                                        <div class="selector">
                                            <select name="ckid" class="full-width">
                                                <option value="0">No</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group col-sm-5 col-md-2 fixheight">
                                <label class="hidden-xs">&nbsp;</label>
                                <button type="submit" name="toursubmit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- How Holidayss works container -->

    <div class="global-map-area section parallax" data-stellar-background-ratio="0.5">
        <div class="container description text-center">
            <h1>How HappyHolidayss Works?</h1>
            <br>
            <div class="travelo-process">
                <img src="assets/images/happyholidayss_process.png" alt="">
                <div class="process first icon-box style12">
                    <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="1">
                        <h4>Explore Destinations</h4>
                    </div>
                    <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="0">
                        <i class="soap-icon-beach circle"></i>
                    </div>
                </div>
                <div class="process second icon-box style12">
                    <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="1.5">
                        <i class="soap-icon-availability circle"></i>
                    </div>
                    <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="2.5">
                        <h4>Check Availability</h4>
                    </div>
                </div>
                <div class="process third icon-box style12">
                    <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="2">
                        <i class="soap-icon-stories circle"></i>
                    </div>
                    <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="3">
                        <h4>Book Online</h4>
                    </div>
                </div>
                <div class="process forth icon-box style12">
                    <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="4.5">
                        <h4>Travel to Destinations</h4>
                    </div>
                    <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="3.5">
                        <i class="soap-icon-adventure takeoff-effect1 circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Travel Services Category Cards -->

    <div class="services-conter container">
        <div class="row">


            <div class="container-title">Explore HappyHolidayss</div>
            <a href="listed-homes.php" target="_blank">
                <div class="col-md-4 col-sm-6">
                    <div class="service-card-single">
                        <img src="assets/images/services card images/7b8f9425-f5e7-4c9e-9d6d-b39fa2f6e651.png" alt="">
                        <h5 class="title">Homes</h5>
                    </div>
                </div>
            </a>

            <a href="listed-tours.php" target="_blank">
                <div class="col-md-4 col-sm-6">
                    <div class="service-card-single">
                        <img src="assets/images/services card images/mantas-hesthaven-_g1WdcKcV3w-unsplash.jpg" alt="">
                        <h5 class="title">Tour Packages</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="container">
        <h2>Popular Homes</h2>
        <div class="row image-box hotel listing-style1">
            <?php
            $homedata = $home->HomeActiveData();
            foreach ($homedata as $homeinfo) {
            ?>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                            <a title=""><img width="270" height="160" src="partner/includes/uploads/<?php echo $homeinfo['cover_img1']; ?>" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price">
                                <small>avg/night</small>
                                LKR <?php echo $homeinfo['ava_night_price_adult']; ?>
                            </span>
                            <h4 class="box-title"><?php echo $homeinfo['home_name']; ?><small><?php echo $homeinfo['district']; ?>, Sri Lanka</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review"><?php echo $homeinfo['home_type']; ?></span>
                            </div>

                            <?php
                            $string = $homeinfo['lg_desc'];

                            // strip tags to avoid breaking any html
                            $string = strip_tags($string);
                            if (strlen($string) > 100) {

                                // truncate string
                                $stringCut = substr($string, 0, 100);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '... <a">Read More</a>';
                            }
                            ?>
                            <p class="description"><?php echo $string; ?></p>

                            <div class="action">
                                <a class="button btn-small" href="home-detailed.php?homeid=<?php echo $homeinfo['home_id']; ?>">Details</a>
                            </div>
                        </div>
                    </article>
                </div>

            <?php }
            ?>
        </div>
    </div>


    <div class="container">
        <h2>Featured Destinations to Stay</h2>
        <div class="flexslider image-carousel style2 row-2" data-animation="slide" data-item-width="370" data-item-margin="30">
            <ul class="slides image-box style11">
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-homes.php?district=kandy"><img width="370" height="160" alt="" src="assets/images/districs/kandy.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Kandy</h3>
                                <span>Kandy Homes</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-homes.php?district=colombo"><img width="370" height="160" alt="" src="assets/images/districs/colombo.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Colombo</h3>
                                <span>Colombo Homes</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-homes.php?district=jaffna"><img width="370" height="160" alt="" src="assets/images/districs/jaffna.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Jaffna</h3>
                                <span>Jaffna Homes</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-homes.php?district=galle"><img width="370" height="160" alt="" src="assets/images/districs/galle.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Galle</h3>
                                <span>Galle Homes</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-homes.php?district=trincomalee"><img width="370" height="160" alt="" src="assets/images/districs/trinco.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Trincomalee</h3>
                                <span>Trincomalee Homes</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-homes.php?district=badulla"><img width="370" height="160" alt="" src="assets/images/districs/badulla.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Badulla</h3>
                                <span>Badulla Homes</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-homes.php?district=nuwaraeliya"><img width="370" height="160" alt="" src="assets/images/districs/nuwaraliya.png"></a>
                            <figcaption>
                                <h3 class="caption-title">nuwara eliya</h3>
                                <span>Nuwara eliya Homes</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-homes.php?district=anuradhapura"><img width="370" height="160" alt="" src="assets/images/districs/anuradhapura.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Anuradhapura</h3>
                                <span>Anuradhapura Homes</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h2>Popular Tour Packages</h2>
        <div class="row image-box hotel listing-style1">
            <?php
            $tourdata = $tour->TourActiveData();
            foreach ($tourdata as $tourinfo) {
            ?>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                            <a title=""><img width="270" height="160" src="partner/includes/uploads/<?php echo $tourinfo['image']; ?>" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price">
                                <small>Adult Price</small>
                                LKR <?php echo $tourinfo['adult_price']; ?>
                            </span>
                            <h4 class="box-title"><?php echo $tourinfo['title']; ?><small>Starting From <?php echo $tourinfo['district']; ?></small></h4>
                            <div class="feedback">
                                <div class="five-stars-container">Total <?php echo $tourinfo['duration_nights']; ?> Nights</div>
                                <span class="review"><?php echo $tourinfo['tour_type']; ?></span>
                            </div>
                            <?php
                            $string = $tourinfo['details'];

                            // strip tags to avoid breaking any html
                            $string = strip_tags($string);
                            if (strlen($string) > 100) {

                                // truncate string
                                $stringCut = substr($string, 0, 100);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '... <a">Read More</a>';
                            }
                            ?>
                            <p class="description"><?php echo $string; ?></p>
                            <div class="action">
                                <a class="button btn-small" href="tour-detailed.php?tourid=<?php echo $tourinfo['tour_id']; ?>">Details</a>
                            </div>
                        </div>
                    </article>
                </div>

            <?php }
            ?>
        </div>
    </div>

    <div class="container">
        <h2>Top destinations for your next Trip</h2>
        <div class="flexslider image-carousel style2 row-2" data-animation="slide" data-item-width="370" data-item-margin="30">
            <ul class="slides image-box style11">
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=kandy"><img width="370" height="160" alt="" src="assets/images/tour district covers/kandy.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Kandy</h3>
                                <span>Kandy Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=colombo"><img width="370" height="160" alt="" src="assets/images/tour district covers/colombo.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Colombo</h3>
                                <span>Colombo Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=jaffna"><img width="370" height="160" alt="" src="assets/images/tour district covers/jaffna.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Jaffna</h3>
                                <span>Jaffna Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=galle"><img width="370" height="160" alt="" src="assets/images/tour district covers/kegalle.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Galle</h3>
                                <span>kegalle Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=trincomalee"><img width="370" height="160" alt="" src="assets/images/tour district covers/trinco.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Trincomalee</h3>
                                <span>Trincomalee Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=badulla"><img width="370" height="160" alt="" src="assets/images/tour district covers/badulla.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Badulla</h3>
                                <span>Badulla Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=nuwaraeliya"><img width="370" height="160" alt="" src="assets/images/tour district covers/nuwaraliya.png"></a>
                            <figcaption>
                                <h3 class="caption-title">nuwara eliya</h3>
                                <span>Nuwara eliya Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=anuradhapura"><img width="370" height="160" alt="" src="assets/images/tour district covers/anurathapuram.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Anuradhapura</h3>
                                <span>Anuradhapura Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
                <li>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=polonnaruwa"><img width="370" height="160" alt="" src="assets/images/tour district covers/polannaruwa.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Polonnaruwa</h3>
                                <span>Polonnaruwa Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="box">
                        <figure>
                            <a title="" href="listed-tours.php?district=matale"><img width="370" height="160" alt="" src="assets/images/tour district covers/matale.png"></a>
                            <figcaption>
                                <h3 class="caption-title">Matale</h3>
                                <span>Matale Tours</span>
                            </figcaption>
                        </figure>
                    </article>
                </li>
            </ul>
        </div>
    </div>






    <div>






    </div>


    <div class="global-map-area2 promo-box no-margin parallax" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="content-section description pull-right col-sm-9">
                <div class="table-wrapper hidden-table-sm">
                    <div class="table-cell">
                        <h2 class="m-title animated" data-animation-type="fadeInDown" data-animation-duration="1.5">
                            Tell us where you would like to go.<br /><em>1,000+ Cabins and Resorts Available!</em>
                        </h2>
                    </div>
                    <div class="table-cell action-section col-md-4 no-float">
                        <div class="row">
                            <div class="col-xs-6 col-md-12">
                                <a href="listed-homes.php"> <button href="listed-homes.php" class="full-width btn-large"> Homestays</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-container col-sm-4">
                <img src="assets/images/services card images/hom01.png" alt="" width="342" height="258" class="animated" data-animation-type="fadeInUp" />
            </div>
        </div>
    </div>

    <div class="container section">
        <h2>Our Investors Relations</h2>
        <div class="investor-slideshow image-carousel style2 investor-list" data-animation="slide" data-item-width="170" data-item-margin="30">
            <ul class="slides">
                <li>
                    <div class="travelo-box">
                        <a href="#"><img src="assets/images/partners/01.png" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="travelo-box">
                        <a href="#"><img src="assets/images/partners/02.png" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="travelo-box">
                        <a href="#"><img src="assets/images/partners/03.png" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="travelo-box">
                        <a href="#"><img src="assets/images/partners/04.png" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="travelo-box">
                        <a href="#"><img src="assets/images/partners/05.png" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="travelo-box">
                        <a href="#"><img src="assets/images/partners/06.png" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="travelo-box">
                        <a href="#"><img src="assets/images/partners/07.png" alt=""></a>
                    </div>
                </li>
                <li>
                    <div class="travelo-box">
                        <a href="#"><img src="assets/images/partners/08.png" alt=""></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</section>

<?php include('includes/jsscripts.php'); ?>
<?php include('includes/footer.php'); ?>