<?php

// Include database file
include_once '../includes/dbconfig.php';

// display record
if (isset($_GET['EId']) && !empty($_GET['EId'])) {
    $EId = $_GET['EId'];
    $inquirydata = $inquiry->displyaRecordById($EId);
}

if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $Approve = $inquiry->updatestatusApprove($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Inquiry Updated as Answred.
      </div>";
        $inquirydata = $inquiry->displyaRecordById($EId);
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
                                <h4>View Inquiry Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Manage Enquiries</li>
                                    <li class="breadcrumb-item active" aria-current="page">View inquiry</li>
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
                                    <label>Inquiry Id</label>
                                    <h6><?= $EId; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <h6><?= $inquirydata['enquirer_subject']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <h6><?= $inquirydata['enquirer_descr']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <h6><?= $inquirydata['enquirer_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <h6><?= $inquirydata['enquirer_email']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <h6><?= $inquirydata['enquirer_contact']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Inquiry Recevied Date&Time</label>
                                    <h6><?= date('jS F, Y h:i A', strtotime($inquirydata['inquiry_received_date'])); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <h6><?php if ($inquirydata['status'] == 0) {
                                            echo "<span style='color: red;'>Unanswred</span>";
                                        } elseif ($inquirydata['status'] == 1) {
                                            echo "<span style='color: green;'>Answered</span>";
                                        } ?></h6>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Inquiry Updated Date&Time</label>
                                    <h6><?= date('jS F, Y h:i A', strtotime($inquirydata['inquiry_updated_date'])); ?></h6>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 text-right">
                                <div class="btn-list">
                                    <?php
                                    if ($inquirydata['status'] == 0) {
                                    ?>
                                        <a type="button" href="?EId=<?= $inquirydata['inquiry_id'] ?>&confirmId=<?= $inquirydata['inquiry_id'] ?>&status=1" class="btn btn-success">Make it as Answered</a>
                                    <?php
                                    }
                                    ?>
                                    <a type="button" href="enquiries.php" class="btn btn-secondary">Go Back</a>
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