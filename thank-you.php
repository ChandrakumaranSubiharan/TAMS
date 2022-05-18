<?php
// Include database file
include_once 'includes/dbconfig.php';
?>

<?php include('includes/header.php'); ?>


<?php
$bookingid = intval($_GET['bookingid']);
$bookingdata = $booking->displyaRecordByIdviaArray($bookingid);
foreach ($bookingdata as $bookinginfo) {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Thank You</h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOME</a></li>
                <li><a href="#">Booking</a></li>
                <li class="active">Thank you</li>
            </ul>
        </div>
    </div>


    <section id="content" class="gray-area">
        <div class="container">
            <div class="row">
                <div id="main" class="col-sm-8 col-md-9">
                    <div class="booking-information travelo-box">
                        <h2>Booking Confirmation</h2>
                        <hr />
                        <div class="booking-confirmation clearfix">
                            <i class="soap-icon-recommend icon circle"></i>
                            <div class="message">
                                <h4 class="main-message">Thank You. Your Booking Order is Progressing.</h4>
                                <p>Confirmation will be shown in your dashboard, wait until service provider confirm it.</p>
                            </div>
                            <a href="customer-dashboard.php" style="margin-right: 5px;" class="button btn-small print-button uppercase">View Status</a>
                            <br />
                        </div>
                        <hr />
                        <h2>Traveler Information</h2>

                        <dl class="term-description">
                            <dt>First name:</dt>
                            <dd><?php echo $bookinginfo['first_name']; ?></dd>
                            <dt>Last name:</dt>
                            <dd><?php echo $bookinginfo['last_name']; ?></dd>
                            <dt>E-mail address:</dt>
                            <dd><?php echo $bookinginfo['email_address']; ?></dd>
                            <dt>Contact:</dt>
                            <dd><?php echo $bookinginfo['contact_number']; ?></dd>
                        </dl>
                        <hr />
                        <h2>Booking Details</h2>
                        <dl class="term-description">
                            <dt>Booking number:</dt>
                            <dd><?php echo $bookinginfo['booking_id']; ?></dd>
                            <dt>Booking Type:</dt>
                            <dd><?php echo $bookinginfo['service_type'];  ?></dd>
                            <dt>Booked Service Name:</dt>
                            <dd><?php echo $bookinginfo['service_name'];  ?></dd>
                            <dt>Total Amount:</dt>
                            <dd>LKR <?php echo $bookinginfo['total_amount'];  ?></dd>
                            <dt>Payment Status:</dt>
                            <dd><?php if ($bookinginfo['payment_status'] == true) {
                                    echo "PAID";
                                } else {
                                    echo "UNPAID";
                                } ?></dd>
                            <dt>Cancellation Status:</dt>
                            <dd><?php if ($bookinginfo['cancellation_ava'] == 1) {
                                    echo "Available for 24Hr";
                                } else {
                                    echo "Unavailable";
                                } ?></dd>
                            <dt>Card Payment Method:</dt>
                            <dd><?php echo $bookinginfo['cus_payment_card_type'];  ?></dd>
                            <dt>Booking Start Date:</dt>
                            <dd><?php echo $bookinginfo['start_date'];  ?></dd>
                            <dt>Booking End Date:</dt>
                            <dd><?php echo $bookinginfo['end_date']; ?></dd>
                            <dt>Total Nights:</dt>
                            <dd><?php echo $bookinginfo['total_nights']; ?></dd>
                            <dt>Total Persons:</dt>
                            <dd><?php echo $bookinginfo['total_persons']; ?></dd>
                            <dt>Adults Count:</dt>
                            <dd><?php echo $bookinginfo['total_adults']; ?></dd>
                            <dt>Kids Count:</dt>
                            <dd><?php echo $bookinginfo['total_kids']; ?></dd>
                        </dl>


                        <hr />
                        <h2>Service Host Contact Details</h2>
                        <dl class="term-description">
                            <?php
                            $partnerid = $bookinginfo['partner_id'];
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
                <div class="sidebar col-sm-4 col-md-3">
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


</body>

</html>


<?php include('includes/footer.php'); ?>
<?php include('includes/jsscripts.php'); ?>