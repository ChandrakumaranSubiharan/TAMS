<!DOCTYPE html>
<html lang="en">
<head>
</head>
    <body>
    <?php include('includes/header.php');?>


    <!-- slideshow -->
    <div id="slideshow">
            <div class="fullwidthbanner-container">
                <div class="revolution-slider" style="height: 0; overflow: hidden;">
                    <ul>    <!-- SLIDE  -->
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
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">Where</h4>
                                        <label>Select Destination</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">Kandy</option>
                                                        <option value="2">Colombo</option>
                                                        <option value="3">Jaffna</option>
                                                    </select>
                                                </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-4">
                                        <h4 class="title">When</h4>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Check In</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Check Out</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">Who</h4>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <label>Adults</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <label>Kids</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <label>Infants</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-2 fixheight">
                                        <label class="hidden-xs">&nbsp;</label>
                                        <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="flights-tab">
                            <form action="#" method="post">
                            <div class="row">
                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">Where</h4>
                                        <label>Select Destination</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">Kandy</option>
                                                        <option value="2">Colombo</option>
                                                        <option value="3">Jaffna</option>
                                                    </select>
                                                </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">When</h4>
                                        <label>Select a Date</label>
                                        <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">How</h4>
                                        <label>Select Tour Type</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">Couple Package</option>
                                                        <option value="2">Colombo</option>
                                                        <option value="3">Jaffna</option>
                                                    </select>
                                                </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-2 fixheight">
                                        <label class="hidden-xs">&nbsp;</label>
                                        <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
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
                    <a href="homes-search-list.php" target="_blank">
                        <div class="col-md-4 col-sm-6">
                            <div class="service-card-single">
                                <img src="assets/images/services card images/7b8f9425-f5e7-4c9e-9d6d-b39fa2f6e651.png" alt="">
                                <h5 class="title">Homes</h5>
                            </div>
                        </div>
                    </a>

                    <a href="tours-search-list.php" target="_blank">
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
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                            <a title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price">
                                <small>avg/night</small>
                                $360
                            </span>
                            <h4 class="box-title">Hotel Hilton<small>Paris france</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review">270 reviews</span>
                            </div>
                            <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                            <div class="action">
                                <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.6">
                            <a title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price"><small>avg/night</small>$188</span>
                            <h4 class="box-title">Forte Do Vale<small>Albufeira</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review">170 reviews</span>
                            </div>
                            <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                            <div class="action">
                                <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.9">
                            <a title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price"><small>avg/night</small>$322</span>
                            <h4 class="box-title">Gran Canaria<small>spain</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review">485 reviews</span>
                            </div>
                            <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                            <div class="action">
                                <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="1.2">
                            <a title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price"><small>avg/night</small>$170</span>
                            <h4 class="box-title">Roosevelt Hotel<small>New york</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review">75 reviews</span>
                            </div>
                            <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                            <div class="action">
                                <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <h2>Popular Tours</h2>
            <div class="row image-box hotel listing-style1">
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                            <a title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price">
                                <small>avg/night</small>
                                $360
                            </span>
                            <h4 class="box-title">Hotel Hilton<small>Paris france</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review">270 reviews</span>
                            </div>
                            <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                            <div class="action">
                                <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.6">
                            <a title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price"><small>avg/night</small>$188</span>
                            <h4 class="box-title">Forte Do Vale<small>Albufeira</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review">170 reviews</span>
                            </div>
                            <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                            <div class="action">
                                <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.9">
                            <a title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price"><small>avg/night</small>$322</span>
                            <h4 class="box-title">Gran Canaria<small>spain</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review">485 reviews</span>
                            </div>
                            <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                            <div class="action">
                                <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sms-6 col-sm-6 col-md-3">
                    <article class="box">
                        <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="1.2">
                            <a title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                        </figure>
                        <div class="details">
                            <span class="price"><small>avg/night</small>$170</span>
                            <h4 class="box-title">Roosevelt Hotel<small>New york</small></h4>
                            <div class="feedback">
                                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                <span class="review">75 reviews</span>
                            </div>
                            <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                            <div class="action">
                                <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>


        <!-- <div class="global-map-area3 section parallax" data-stellar-background-ratio="0.5">
        <div class="container description">
            <h1 class="text-center box">Why HappyHolidayss</h1>
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    <div class="icon-box style8 animated" data-animation-type="slideInUp" data-animation-delay="0">
                        <i class="soap-icon-address"></i>
                        <h4 class="box-title">1,000+ Homes</h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="icon-box style8 animated" data-animation-type="slideInUp" data-animation-delay="0.6">
                        <i class="soap-icon-insurance"></i>
                        <h4 class="box-title">Low Rates &amp; Top Savings</h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="icon-box style8 animated" data-animation-type="slideInUp" data-animation-delay="0.9">
                        <i class="soap-icon-adventure"></i>
                        <h4 class="box-title">500+ Tour Packages</h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="icon-box style8 animated" data-animation-type="slideInUp" data-animation-delay="1.2">
                        <i class="soap-icon-support"></i>
                        <h4 class="box-title">We Speak your Language</h4>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <div class="container">
        <div class="section">
            <h2>Featured Destinations</h2>
            <div class="flexslider image-carousel style2 row-2" data-animation="slide" data-item-width="370" data-item-margin="30">
                <ul class="slides image-box style11">
                    <li>
                        <article class="box">
                            <figure>
                                <a title="" href="#"><img width="370" height="160" alt="" src="assets/images/districs/kandy.png"></a>
                                <figcaption>
                                    <h3 class="caption-title">Kandy</h3>
                                    <span>Kandy Homes</span>
                                </figcaption>
                            </figure>
                        </article>
                        <article class="box">
                            <figure>
                                <a title="" href="#"><img width="370" height="160" alt="" src="assets/images/districs/colombo.png"></a>
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
                                <a title="" href="#"><img width="370" height="160" alt="" src="assets/images/districs/jaffna.png"></a>
                                <figcaption>
                                    <h3 class="caption-title">Jaffna</h3>
                                    <span>Jaffna Homes</span>
                                </figcaption>
                            </figure>
                        </article>
                        <article class="box">
                            <figure>
                                <a title="" href="#"><img width="370" height="160" alt="" src="assets/images/districs/galle.png"></a>
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
                                <a title="" href="#"><img width="370" height="160" alt="" src="assets/images/districs/trinco.png"></a>
                                <figcaption>
                                    <h3 class="caption-title">Trincomalee</h3>
                                    <span>Trincomalee Homes</span>
                                </figcaption>
                            </figure>
                        </article>
                        <article class="box">
                            <figure>
                                <a title="" href="#"><img width="370" height="160" alt="" src="assets/images/districs/badulla.png"></a>
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
                                <a title="" href="#"><img width="370" height="160" alt="" src="assets/images/districs/nuwaraliya.png"></a>
                                <figcaption>
                                    <h3 class="caption-title">nuwara eliya</h3>
                                    <span>Nuwara eliya Homes</span>
                                </figcaption>
                            </figure>
                        </article>
                        <article class="box">
                            <figure>
                                <a title="" href="#"><img width="370" height="160" alt="" src="assets/images/districs/anuradhapura.png"></a>
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
                        <form method="post" action="hotel-list-view.html">
                            <div class="row">
                                <div class="col-xs-6 col-md-12">
                                    <button class="full-width btn-large">View Homestays</button>
                                </div>
                            </div>
                        </form>
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




            <!-- Tour Packages Cards -->

            <!-- <div class="container">
                <div class="Services-list">
                    <h3>Tour Package List</h3>


                        <div class="service-info-crd">
                            <div class="col-md-3 service-info-left">
                                <img src="assets/images/services card images/pkg01.png" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-5 service-info-midle">
                                <h3>Weekend Island Break with Galle </h3>
                                <ul>
                                    <li><i class="service-info-type-icon"></i><p>Sightseeing Tour</p></li>
                                    <li><i class="service-info-location-icon"></i><p>Sri Lanka, Galle</p></li>
                                    <li><i class="service-info-duration-icon"></i><p>4 Days & 3 Nights</p></li>
                                </ul>
                            </div>
                            <div class="col-md-3 service-info-right">
                                <h5>LKR 25000</h5>
                                <p>per Adult</p>
                                <a href="#>" class="view">Details</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>


                        <div class="service-info-crd">
                            <div class="col-md-3 service-info-left">
                                <img src="assets/images/services card images/pkg02.png" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-5 service-info-midle">
                                <h3>Scintillating Tropical Tour to South</h3>
                                <ul>
                                    <li><i class="service-info-type-icon"></i><p>Sea Coast Tour</p></li>
                                    <li><i class="service-info-location-icon"></i><p>Sri Lanka, South Coast</p></li>
                                    <li><i class="service-info-duration-icon"></i><p>7 Days & 6 Nights</p></li>
                                </ul>
                            </div>
                            <div class="col-md-3 service-info-right">
                                <h5>LKR 60000</h5>
                                <p>per Adult</p>
                                <a href="#>" class="view">Details</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>


                        <div class="service-info-crd">
                            <div class="col-md-3 service-info-left">
                                <img src="assets/images/services card images/pkg03.png" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-5 service-info-midle">
                                <h3>Delightful Tour to Hill Country</h3>
                                <ul>
                                    <li><i class="service-info-type-icon"></i><p>Hill Country Tour</p></li>
                                    <li><i class="service-info-location-icon"></i><p>Sri Lanka, Central</p></li>
                                    <li><i class="service-info-duration-icon"></i><p>5 Days & 4 Nights</p></li>
                                </ul>
                            </div>
                            <div class="col-md-3 service-info-right">
                                <h5>LKR 40000</h5>
                                <p>per Adult</p>
                                <a href="#>" class="view">Details</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    <div><a href="#" class="view">View More Packages</a></div>
                </div>
                <div class="clearfix"></div>
            </div> -->

                        
            <!-- Tour Packages Cards -->

            <!-- <div class="container">
                <div class="Services-list">
                    <h3>Homes List</h3>


                        <div class="service-info-crd">
                            <div class="col-md-3 service-info-left">
                                <img src="assets/images/services card images/hom01.png" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-5 service-info-midle">
                                <h3>Madulkelle Tea and Eco Lodge</h3>
                                <ul>
                                    <li><i class="service-info-type-icon"></i><p>Eco Lodge</p></li>
                                    <li><i class="service-info-location-icon"></i><p>Kandy</p></li>
                                    <li><i class="service-info-rating-icon"></i><p>5.0</p></li>
                                </ul>
                            </div>
                            <div class="col-md-3 service-info-right">
                                <h5>LKR 25000</h5>
                                <h4>01 Adult | 01 Day</h4>
                                <a href="#>" class="view">Details</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    <div><a href="#" class="view">View More Homes</a></div>
                </div>
                <div class="clearfix"></div>
            </div> -->
                

            <!-- features card -->
<!-- 
            <div class="container"> 
                <div class="col-md-3 features-card">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <div class="info">
                        <h3>1000+</h3>
                        <h3>Customers</h3>
                    </div>
                </div>

                <div class="col-md-3 features-card">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <div class="info">
                        <h3>1000+</h3>
                        <h3>Bookings</h3>
                    </div>
                </div>

                <div class="col-md-3 features-card">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <div class="info">
                        <h3>1000+</h3>
                        <h3>Enquiries</h3>
                    </div>
                </div>

                <div class="col-md-3 features-card">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <div class="info">
                        <h3>1000+</h3>
                        <h3>Partners</h3>
                    </div>
                </div>

            </div> -->

</section>

    <?php include('includes/jsscripts.php');?>
    <?php include('includes/footer.php');?>


    </body>
</html>