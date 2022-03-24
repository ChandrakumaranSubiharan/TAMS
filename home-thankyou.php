<?php
// Include database file
include_once 'includes/dbconfig.php';
?>

<?php include('includes/header.php'); ?>



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
                            <a href="customer/dashboard.php" style="margin-right: 5px;" class="button btn-small print-button uppercase">View Status</a>
                            <br />
                            <br />
                            <a href="#" class="button btn-small print-button uppercase">print Details</a>

                        </div>
                        <hr />
                        <h2>Traveler Information</h2>

                        <dl class="term-description">
                            <dt>First name:</dt>
                            <dd><?php echo $_SESSION['cus_first_name']; ?></dd>
                            <dt>Last name:</dt>
                            <dd><?php echo $_SESSION['cus_last_name']; ?></dd>
                            <dt>E-mail address:</dt>
                            <dd><?php echo $_SESSION['cus_email']; ?></dd>
                            <dt>Contact:</dt>
                            <dd><?php echo $_SESSION['cus_contact']; ?></dd>
                        </dl>
                        <hr />

                        <?php
                        try {
                            $tamount = intval($_SESSION['total_amount']);
                            $cid = intval($_SESSION['customer_id']);

                            // Define query to select values from the partner table
                            $sql = "SELECT * FROM tbl_booking WHERE total_amount=:totalamount AND cus_id= :cusid ORDER BY booking_id DESC LIMIT 1";
                            
                            // Prepare the statement
                            $query = $DB_con->prepare($sql);

                            // Execute the query
                            $query->execute([
                                'totalamount'=>$tamount,
                                'cusid'=>$cid
                            ]);

                            // Return row as an array indexed by both column name
                            $returned_row = $query->fetch(PDO::FETCH_ASSOC);
                        } catch (PDOException $e) {
                            array_push($errors, $e->getMessage());
                        }
                        ?>
                        <h2>Booking Details</h2>
                        <dl class="term-description">
                            <dt>Booking number:</dt>
                            <dd><?= $returned_row['booking_id']; ?></dd>
                            <dt>Booking Type:</dt>
                            <dd><?php if ($_SESSION['home_true']) {
                                    echo 'Home Booking';
                                } else {
                                    echo 'Tour Booking';
                                } ?></dd>
                            <dt>Total Amount:</dt>
                            <dd>LKR <?php echo $_SESSION['total_amount']; ?></dd>
                            <dt>Payment Status:</dt>
                            <dd>Paid</dd>
                            <dt>Payment Method:</dt>
                            <dd><?php echo $_SESSION['cus_card_type']; ?></dd>
                            <dt>Booking Start Date:</dt>
                            <dd><?php echo $_SESSION['booking_s_date']; ?></dd>
                            <dt>Booking End Date:</dt>
                            <dd><?php echo $_SESSION['booking_e_date']; ?></dd>
                            <dt>Total Nights:</dt>
                            <dd><?php echo $_SESSION['booking_nights']; ?></dd>
                            <dt>Total Persons:</dt>
                            <dd><?php echo $_SESSION['booking_person_count']; ?></dd>
                        </dl>


                        <hr />
                        <h2>Service Host Contact Details</h2>
                        <dl class="term-description">

                            <?php
                            $pid = intval($_SESSION['host_id']);
                            $sql = "SELECT * from tbl_partner where partner_id=:partnerid";
                            $query = $DB_con->prepare($sql);
                            $query->bindParam(':partnerid', $pid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {    ?>




                                    <dt>Host Name:</dt>
                                    <dd><?php echo htmlentities($result->first_name); ?> <?php echo htmlentities($result->last_name); ?></dd>
                                    <dt>Contact:</dt>
                                    <dd> <?php echo htmlentities($result->contact_number); ?></dd>
                                    <dt>Email:</dt>
                                    <dd> <?php echo htmlentities($result->email_address); ?></dd>


                            <?php }
                            } ?>
                        </dl>
                    </div>
                </div>
                <div class="sidebar col-sm-4 col-md-3">
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


</body>

</html>


<?php include('includes/footer.php'); ?>
<?php include('includes/jsscripts.php'); ?>