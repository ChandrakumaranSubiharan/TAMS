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
                    <a href="http://google.com" target="_blank">
                        <div class="col-md-4 col-sm-6">
                            <div class="service-card-single">
                                <img src="assets/images/services card images/7b8f9425-f5e7-4c9e-9d6d-b39fa2f6e651.png" alt="">
                                <h5 class="title">Homes</h5>
                            </div>
                        </div>
                    </a>

                    <a href="http://google.com" target="_blank">
                        <div class="col-md-4 col-sm-6">
                            <div class="service-card-single">
                                <img src="assets/images/services card images/mantas-hesthaven-_g1WdcKcV3w-unsplash.jpg" alt="">
                                <h5 class="title">Tour Packages</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


                        
            <!-- Tour Packages Cards -->

            <div class="container">
                <div class="Services-list">
                    <h3>Tour Package List</h3>

            <!-- card-01 -->

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

            <!-- card-02 -->

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

            <!-- card-03 -->

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
            </div>

                        
            <!-- Tour Packages Cards -->

            <div class="container">
                <div class="Services-list">
                    <h3>Homes List</h3>

            <!-- card-01 -->

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
            </div>
                

            <!-- features card -->

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

            </div>

</section>

    <?php include('includes/jsscripts.php');?>
    <?php include('includes/footer.php');?>


    </body>
</html>