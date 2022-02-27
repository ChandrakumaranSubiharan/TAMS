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



    <div class="card-container">
        <div class="title">Explore HappyHolidayss</div>
    <div class="row">
        <div class="col-md-5">
        <article class="card shadow">

        </article>

        </div>
        <div class="col-md-5">
        <article class="card shadow">

        </article>
        </div>
    </div>
    </div>



    <!-- Travel Services Container Card -->


            <!-- <div class="card-container">
    <article class="card shadow">
      <div>
        <img src="https://images.unsplash.com/photo-1540317700647-ec69694d70d0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="image">
      </div>

      <div>
        <p><strong>Lorem ipsum dolor sit dolor sit amet, conse ctetur adipis icing elit...</strong></p>
        <span>
          <i class="fab fa-instagram"></i>
           Instagram - <time>10 min ago</time>
         </span>
      </div>
    </article>
    
     
    <article class="card border">
      <div>
        <img src="https://images.unsplash.com/photo-1509070016581-915335454d19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="image">
      </div>

      <div>
        <p><strong>Lorem ipsum dolor sit dolor sit amet, conse ctetur adipis icing elit...</strong></p>
        <span>
          <i class="fab fa-facebook"></i>
           Facebook - <time>16 min ago</time>
         </span>
      </div>
    </article>
  </div> -->




  
</section>













    <?php include('includes/jsscripts.php');?>
    <?php include('includes/footer.php');?>


    </body>
</html>