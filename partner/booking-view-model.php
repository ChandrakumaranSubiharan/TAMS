<?php

// Include database file
include_once '../includes/dbconfig.php';


// display record
if (isset($_GET['viewId']) && !empty($_GET['viewId'])) {
    $viewId = $_GET['viewId'];
    $bookingdata = $booking->displyaRecordById($viewId);
}


if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 0) {
        $bookingdataconfirm = $booking->updatestatusConfirm($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Booking Confirmed Successfully
      </div>";
        $bookingdata = $booking->displyaRecordById($viewId);
    } elseif ($CurrentStatus == 1) {
        $bookingdatacancel = $booking->updatestatusCancel($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Booking Cancelled Successfully
      </div>";
        $bookingdata = $booking->displyaRecordById($viewId);
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>HappyHolidayss</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/dashboard/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/dashboard/vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/dashboard/vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/dashboard/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="../assets/dashboard/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/dashboard/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/dashboard/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/dashboard/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script> -->
</head>

<body>
    <?php include('includes/header.php'); ?>
    <?php include('includes/navigation.php'); ?>

    <div class="mobile-menu-overlay"></div>


    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>View Booking Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Manage Booking</li>
                                    <li class="breadcrumb-item active" aria-current="page">View Booking</li>
                                </ol>
                            </nav>
                            <?php
                            if (isset($msg)) {
                                echo $msg;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <form>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Booking Id</label>
                                    <h6><?php echo $viewId; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer First Name</label>
                                    <h6><?php echo $bookingdata['first_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Last Name</label>
                                    <h6><?php echo $bookingdata['last_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Contact</label>
                                    <h6><?php echo $bookingdata['contact_number']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Email</label>
                                    <h6><?php echo $bookingdata['email_address']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Booking Total Amount</label>
                                    <h6><?php echo $bookingdata['total_amount']; ?> LKR</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Payment Status</label>
                                    <h6><?php if ($bookingdata['payment_status'] == 1) {
                                            echo "<span style='color: green;'>Paid</span>";
                                        } elseif ($bookingdata['payment_status'] >= 2) {
                                            echo "<span style='color: blue;'>Refunded</span>";
                                        } else {
                                            echo "<span style='color: red;'>Not Paid</span>";
                                        }
                                        ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Payment Card Type</label>
                                    <h6><?php echo $bookingdata['cus_payment_card_type']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Booking Start Date</label>
                                    <h6><?php echo date('jS F, Y', strtotime($bookingdata['start_date'])); ?></h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Booking Income Amount</label>
                                    <h6>
                                        <?php if ($bookingdata['status'] == 1) {
                                            echo "0";
                                        } elseif ($bookingdata['status'] == 3) {
                                            echo "0";
                                        } else {
                                            echo $bookingdata['payout'];
                                        } ?>
                                        <?php
                                        ?> LKR</h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <h6><?php echo $bookingdata['payment_card_number']; ?></h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Card Holder Name</label>
                                    <h6><?php echo $bookingdata['payment_card_holder_name']; ?></h6>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Booking End Date</label>
                                    <h6><?php echo date('jS F, Y', strtotime($bookingdata['end_date'])); ?></h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Total Nights</label>
                                    <h6><?php echo $bookingdata['total_nights']; ?></h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Total Persons</label>
                                    <h6><?php echo $bookingdata['total_persons']; ?></h6>
                                </div>

                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Adult Count</label>
                                    <h6><?php echo $bookingdata['total_adults']; ?></h6>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Reserved Service Type</label>
                                    <h6><?php echo $bookingdata['service_type']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Reserved Service Name</label>
                                    <h6><?php echo $bookingdata['service_name']; ?> </h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Booking Created Date and Time</label>
                                    <h6><?php echo date('jS F, Y h:i A', strtotime($bookingdata['created_date'])); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Kid Count</label>
                                    <h6><?php echo $bookingdata['total_kids']; ?></h6>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Booking Status</label>
                                    <h6><?php if ($bookingdata['status'] == 0) {
												echo "<span style='color: teal;'>Not Confirmed</span>";
											} elseif ($bookingdata['status'] == 1) {
												echo "<span style='color: firebrick;'>Cancelled</span>";
											} elseif ($bookingdata['status'] == 2) {
												echo "<span style='color: green;'>Confirmed</span>";
											} elseif ($bookingdata['status'] == 3) {
												echo "<span style='color: red;'>Cancelled by You</span>";
											} elseif ($bookingdata['status'] == 4) {
												echo "<span style='color: green;'>Completed</span>";
											} elseif ($bookingdata['status'] == 5) {
												echo "<span style='color: blue;'>Inprogress</span>";
											} else {
												echo "Booking Failed";
											} ?></h6>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 text-right">
                                <div class="btn-list">
                                    <?php
                                    if ($bookingdata['status'] == 0) {
                                    ?>
                                        <a type="button" href="?viewId=<?php echo $bookingdata['booking_id'] ?>&confirmId=<?php echo $bookingdata['booking_id'] ?>&status=0" class="btn btn-success">Confirm Booking</a>
                                        <a type="button" href="?viewId=<?php echo $bookingdata['booking_id'] ?>&confirmId=<?php echo $bookingdata['booking_id'] ?>&status=1" class="btn btn-danger">Cancel Booking</a>
                                    <?php
                                    } elseif ($bookingdata['status'] == 1) {
                                    ?>
                                        <a type="button" href="?viewId=<?php echo $bookingdata['booking_id'] ?>&confirmId=<?php echo $bookingdata['booking_id'] ?>&status=0" class="btn btn-success">Confirm Booking</a>
                                    <?php
                                    } elseif ($bookingdata['status'] == 2) {
                                    ?>
                                        <a type="button" href="earning-view-model.php?viewId=<?php echo $bookingdata['earning_id'] ?>" class="btn btn-primary">View Earning</a>
                                    <?php
                                    }
                                    ?>
                                    <a type="button" href="manage-booking.php?viewId=1" class="btn btn-secondary">Go Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                HappyHolidayss Pvt(Ltd).</a>
            </div>
        </div>
    </div>

    </div>

    <?php include('includes/scripts.php'); ?>

</body>

</html>