<?php
// Include necessary file
include_once 'includes/dbconfig.php';


// Check if user is not logged in
if (!$auth->is_logged_in()) {
    $auth->redirect('login.php');
}


if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
    $auth->log_out();
    $auth->redirect('login.php');
}


if (isset($_GET['viewId']) && !empty($_GET['viewId'])) {
    $viewId = $_GET['viewId'];
    $bookingdata = $booking->displyaRecordById($viewId);
}

if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $UpdateCancellation = $booking->UpdateCancellationWithRefund($editId);
        echo '<script>alert("Booking Cancelled Successfully.")</script>';
        $bookingdata = $booking->displyaRecordById($viewId);
    }
}






?>



<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h3 class="entry-title">Booking ID #<?php echo $bookingdata['booking_id']; ?></h3>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="index.php">HOME</a></li>
                <li><a href="customer-dashboard.php">DASHBOARD</a></li>
                <li class="active">View Booking</li>
            </ul>
        </div>
    </div>

    <section id="content" class="gray-area">
        <div class="container">
            <div id="main">
                <div class="tab-container full-width-style arrow-left dashboard">
                    <div class="tab-content tab-content-full">
                        <div id="dashboard" class="tab-pane fade in active">

                            <h2>Reservation Details</h2>
                            <div class="col-sm-12 no-float no-padding">
                                <form>
                                    <div class="row form-group">
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Booking ID</label>
                                            <h2><?php echo $bookingdata['booking_id']; ?></h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Booking Total Amount</label>
                                            <h2><?php echo $bookingdata['total_amount']; ?> LKR</h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <?php

                                            //current date time
                                            $current_timedate = date("Y-m-d H:i:s", strtotime('+4 hours +30 minutes'));
                                            //Booking Created date time
                                            $created_timedate = date("Y-m-d H:i:s", strtotime($bookingdata['created_date']));

                                            //Created and Current date time differnce
                                            $dateDiff = intval((strtotime($current_timedate) - strtotime($created_timedate)) / 60);

                                            //Created and Current date time differnce in Hours
                                            $hours = intval($dateDiff / 60);

                                            //Created and Current date time differnce in Minutes
                                            $minutes = $dateDiff % 60;

                                            //Hours left to become unavailable
                                            $lefthours = 24 - $hours;
                                            //Minutes left to become unavailable
                                            $leftminutes = 60 - $minutes;

                                            $Bid =  $bookingdata['booking_id'];

                                            if ($lefthours <= 0) {
                                                $UpdateCancellation = $booking->UpdateCancellation($Bid);
                                                $bookingdata = $booking->displyaRecordById($viewId);
                                            }
                                            ?>

                                            <label>Cancellation Availability</label>
                                            <h2><?php if ($bookingdata['cancellation_ava'] == 0) {
                                                    echo "<span style='color: Red;'>UNAVAILABLE</span>";
                                                } else {
                                                    echo "<span style='color: Green;'>$lefthours Hr $leftminutes Min Left</span>";
                                                } ?></h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Payment Status</label>
                                            <h2><?php if ($bookingdata['payment_status'] == 1) {
                                                    echo "<span style='color: green;'>Paid</span>";
                                                } elseif ($bookingdata['payment_status'] >= 2) {
                                                    echo "<span style='color: blue;'>Refunded</span>";
                                                } else {
                                                    echo "<span style='color: red;'>Not Paid</span>";
                                                }
                                                ?></h2>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Booking Start Date</label>
                                            <h2><?php echo date('jS F, Y', strtotime($bookingdata['start_date'])); ?></h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Booking End Date</label>
                                            <h2><?php echo date('jS F, Y', strtotime($bookingdata['end_date'])); ?></h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Total Nights</label>
                                            <h2><?php echo $bookingdata['total_nights']; ?></h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Total Persons</label>
                                            <h2><?php echo $bookingdata['total_persons']; ?></h2>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Adult Count</label>
                                            <h2><?php echo $bookingdata['total_adults']; ?></h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Kid Count</label>
                                            <h2><?php if ($bookingdata['total_kids'] == 0) {
                                                    echo "No Kids";
                                                } else {

                                                    echo $bookingdata['total_kids'];
                                                }
                                                ?>
                                            </h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Service Type</label>
                                            <h2><?php echo $bookingdata['service_type']; ?></h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Service Name</label>
                                            <h2><?php echo $bookingdata['service_name']; ?></h2>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Booking Created Date and Time</label>
                                            <h2><?php echo date('jS F, Y h:i A', strtotime($bookingdata['created_date'])); ?></h2>
                                        </div>
                                        <div class="col-sms-3 col-sm-3">
                                            <label>Booking Status</label>
                                            <h2><?php if ($bookingdata['status'] == 0) {
                                                    echo "<span style='color: teal;'>Unconfirmed</span>";
                                                } elseif ($bookingdata['status'] == 1) {
                                                    echo "<span style='color: firebrick;'>Cancelled by Host</span>";
                                                } elseif ($bookingdata['status'] == 2) {
                                                    echo "<span style='color: green;'>Confirmed</span>";
                                                } elseif ($bookingdata['status'] == 3) {
                                                    echo "<span style='color: red;'>Cancelled by You</span>";
                                                } else {
                                                    echo "<span style='color: red;'>Booking Failed</span>";
                                                } ?></h2>
                                        </div>

                                        <div class="col-sms-6 col-sm-6 top-margin">
                                            <div class="btn-list">
                                                <?php if ($bookingdata['cancellation_ava'] == 1) {
                                                ?>
                                                    <a type="button" href="?viewId=<?php echo $bookingdata['booking_id'] ?>&confirmId=<?php echo $bookingdata['booking_id'] ?>&status=1"><button type="button" class="btn-medium Red">CANCELL BOOKING</button></a>
                                                <?php
                                                }
                                                ?>
                                                <a type="button" href="customer-dashboard.php"><button type="button" class="btn-medium dark">GO BACK</button></a>
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>









        </div>
        </div>
    </section>

    <?php include('includes/jsscripts.php'); ?>
    <?php include('includes/footer.php'); ?>
</body>

</html>