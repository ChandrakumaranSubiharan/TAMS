<?php

// Include database file
include_once '../includes/dbconfig.php';


// display record
if (isset($_GET['viewId']) && !empty($_GET['viewId'])) {
    $viewId = $_GET['viewId'];
    $earningdata = $earning->displyaRecordById($viewId);
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
                                <h4>View Earning Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Earnings</li>
                                    <li class="breadcrumb-item active" aria-current="page">View Earning</li>
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
                                    <label>Earning Id</label>
                                    <h6><?php echo $viewId; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Booking ID</label>
                                    <h6><?php echo $earningdata['booking_id']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Full Name</label>
                                    <h6><?php echo $earningdata['first_name']; ?> <?php echo $earningdata['last_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Contact</label>
                                    <h6><?php echo $earningdata['contact_number']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Email</label>
                                    <h6><?php echo $earningdata['email_address']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Service Type</label>
                                    <h6><?php echo $earningdata['service_type']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Service Name</label>
                                    <h6><?php echo $earningdata['service_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Total Amount (LKR)</label>
                                    <h6><?php echo $earningdata['total_amount']; ?> LKR</h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Income (LKR)</label>
                                    <h6><?php echo $earningdata['net_amount']; ?> LKR</h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Income Percentage %</label>
                                    <h6><?php echo $earningdata['profit_percentage']; ?> %<h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <h6><?php if ($earningdata['payment_status'] == 1) {
                                            echo "<span style='color: green;'>Received</span>";
                                        } elseif ($earningdata['payment_status'] >= 2) {
                                            echo "<span style='color: blue;'>Refunded</span>";
                                        } else {
                                            echo "<span style='color: red;'>Not Paid</span>";
                                        }
                                        ?></h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Card Holder Name</label>
                                    <h6><?php echo $earningdata['payment_card_holder_name']; ?></h6>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <h6><?php echo $earningdata['payment_card_number']; ?></h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Card Type</label>
                                    <h6><?php echo $earningdata['cus_payment_card_type']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Earning Created Date and Time</label>
                                    <h6><?php echo date('jS F, Y h:i A', strtotime($earningdata['created_date'])); ?></h6>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-right">
                                <div class="btn-list">
                                    <a type="button" href="earning.php" class="btn btn-secondary">Go Back</a>
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