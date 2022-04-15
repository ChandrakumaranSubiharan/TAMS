<?php

// Include database file
include_once '../includes/dbconfig.php';


// display record
if (isset($_GET['viewId']) && !empty($_GET['viewId'])) {
    $viewId = $_GET['viewId'];
    $bookingdata = $booking->displyaRecordById($viewId);
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
                            <div class="container">
                                <?php
                                if (isset($msg)) {
                                    echo $msg;
                                }
                                ?>
                            </div>
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
                                    <h6><?php if($bookingdata['payment_status'] == 1){
                                        echo "Paid";
                                    }else{
                                        echo "Not Paid";
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
                                    <label>Home Cancellation</label>
                                    <h6><?php if ($homedata['cancellation'] == 1) {
                                            echo "Enabled";
                                        } else {
                                            echo "Disabled";
                                        } ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Stay Start Time</label>
                                    <h6><?php echo date('h:i A', strtotime($homedata['s_time'])); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Stay End Time</label>
                                    <h6><?php echo date('h:i A', strtotime($homedata['e_time'])); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Adult/Avg/Night Price</label>
                                    <h6><?php echo $homedata['ava_night_price_adult']; ?> LKR</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Kid/Avg/Night Price</label>
                                    <h6><?php echo $homedata['ava_night_price_kid']; ?> LKR</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Max Adults</label>
                                    <h6><?php echo $homedata['max_adults']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                <div class="form-group">
                                    <label>Max Kids</label>
                                    <h6><?php echo $homedata['max_kids']; ?></h6>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Home Created Date and Time</label>
                                    <h6><?php echo date('jS F, Y h:i A', strtotime($homedata['created_date'])); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Home Status</label>
                                    <h6><?php if ($homedata['status'] == 1) {
                                            echo "Active";
                                        } elseif ($homedata['status'] == 2) {
                                            echo "Not Verified Yet";
                                        } elseif ($homedata['status'] == 3) {
                                            echo "Verification Unsuccessful";
                                        } else {
                                            echo "InActive";
                                        } ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="btn-list">
                                    <a type="button" href="edit-home.php?editId=<?php echo $homedata['home_id'] ?>" class="btn btn-lg btn-primary">Edit home</a>
                                    <a type="button" href="manage-home.php" class="btn btn-secondary btn-lg">Go Back</a>
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