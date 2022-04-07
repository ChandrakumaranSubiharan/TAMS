<?php
// Include database file
include_once 'includes/dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <section id="content">
        <div class="container">
            <div id="main">
                <div class="large-block image-box style6">
                    <article class="box">
                        <figure class="col-md-5">
                            <a href="#" title="" class="middle-block"><img class="middle-item" src="assets/images/logo-aboutus.png" alt="" /></a>
                        </figure>
                        <div class="details col-md-offset-5">
                            <h4 class="box-title">Who We Are?</h4>
                            <p>HappyHolidayss is the largest independently owned travel Accommodation Marketplace, headquartered in Colombo Sri Lanka, and consistently ranked among the top 5 largest in the Sri Lanka.</p>
                        </div>
                    </article>
                    <article class="box">
                        <figure class="col-md-5 pull-right middle-block">
                            <a href="#" title=""><img class="middle-item" src="assets/images/lanka-abotus.png" alt="" /></a>
                        </figure>
                        <div class="details col-md-7">
                            <h4 class="box-title">What We Do?</h4>
                            <p>We are an employee-owned company with a passion for providing exemplary customer service, leveraging our expertise and technology to deliver innovative travel solutions in a gratifying work environment.</p>
                        </div>
                    </article>
                    <article class="box">
                        <figure class="col-md-5">
                            <a href="#" title="" class="middle-block"><img class="middle-item" src="assets/images/about.png" alt="" /></a>
                        </figure>
                        <div class="details col-md-offset-5">
                            <h4 class="box-title">How Travelo Work?</h4>
                            <p>HappyHolidayss help clients to make travel plans. In addition to booking reservations, we assist customers in choosing their destination, and lodging and inform travelers of booking reservation status.</p>
                        </div>
                    </article>
                </div>
                <div class="large-block">
                    <h2>Travelo Dedicated Team</h2>
                    <div class="row image-box style1 team">
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure>
                                    <a href="#"><img src="assets/images/user.png" alt="" width="270" height="263" /></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="#">Don Coleone<small>Chief Executive</small></a></h4>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure>
                                    <a href="#"><img src="assets/images/user.png" alt="" width="270" height="263" /></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="#">Dilshan Keel<small>Director - Tours Management</small></a></h4>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure>
                                    <a href="#"><img src="assets/images/user.png" alt="" width="270" height="263" /></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="#">Manoj Ragal<small>Chief Operating Officer</small></a></h4>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure>
                                    <a href="#"><img src="assets/images/user.png" alt="" width="270" height="263" /></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="#">Subiharan Chandrakumaran<small>Founder &amp; Director</small></a></h4>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="row large-block">
                    <div class="col-sm-6 col-md-3">
                        <div class="icon-box style3 counters-box">
                            <?php
                            $tourscount = $tour->GetToursCount()
                            ?>
                            <div class="numbers">
                                <i class="soap-icon-places yellow-color"></i>
                                <span class="display-counter" data-value="<?php echo $tourscount; ?>"><?php echo $tourscount; ?></span>
                            </div>
                            <div class="description">Amazing Tours To Travel</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="icon-box style3 counters-box">
                            <?php
                            $homescount = $home->GetHomesCount()
                            ?>
                            <div class="numbers">
                                <i class="soap-icon-address blue-color"></i>
                                <span class="display-counter" data-value="<?php echo $homescount; ?>"><?php echo $homescount; ?></span>
                            </div>
                            <div class="description">Homes To Stay</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="icon-box style3 counters-box">
                            <?php
                            $customerscount = $customer->GetCustomersCount()
                            ?>
                            <div class="numbers">
                                <i class="soap-icon-friends green-color"></i>
                                <span class="display-counter" data-value="<?php echo $customerscount; ?>"><?php echo $customerscount; ?></span>
                            </div>
                            <div class="description">Customers</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="icon-box style3 counters-box">
                            <?php
                            $bookingcount = $booking->GetBookingsCount()
                            ?>
                            <div class="numbers">
                                <i class="soap-icon-stories red-color"></i>
                                <span class="display-counter" data-value="<?php echo $bookingcount; ?>"><?php echo $bookingcount; ?></span>
                            </div>
                            <div class="description">Bookings</div>
                        </div>
                    </div>
                </div>


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
        </div>
    </section>

    <?php include('includes/jsscripts.php'); ?>
    <?php include('includes/footer.php'); ?>
</body>

</html>