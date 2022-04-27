<?php

// Include database file
include_once '../includes/dbconfig.php';

// display record
if (isset($_GET['RId']) && !empty($_GET['RId'])) {
    $RId = $_GET['RId'];
    $reviewdata = $review->displyaRecordById($RId);
}

if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $ReviewApprove = $review->updatestatusApprove($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Review Approved.
      </div>";
        $reviewdata = $review->displyaRecordById($RId);
    } elseif ($CurrentStatus == 0) {
        $ReviewDisapprove = $review->updatestatusDisapprove($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Review Disapproved.
      </div>";
        $reviewdata = $review->displyaRecordById($RId);
    } elseif ($CurrentStatus == 2) {
        $ReviewDelete = $review->DeleteReview($editId);
        echo "<script>alert('Review Removed Successfully'); window.location = 'review-manage.php';</script>";
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
                                <h4>View Review Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Manage Reviews</li>
                                    <li class="breadcrumb-item active" aria-current="page">View review</li>
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
                                    <label>Review Id</label>
                                    <h6><?= $RId; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <h6><?= $reviewdata['review_title']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <h6><?php if ($reviewdata['status'] == 0) {
                                            echo "<span style='color: red;'>Disapproved</span>";
                                        } elseif ($reviewdata['status'] == 1) {
                                            echo "<span style='color: green;'>Approved</span>";
                                        } ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Type</label>
                                    <h6><?= $reviewdata['review_user_type']; ?></h6>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <h6><?= $reviewdata['first_name']; ?> <?= $reviewdata['last_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Service Name</label>
                                    <h6><?= $reviewdata['service_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Review Rating</label>
                                    <h6><?= $reviewdata['review_rating']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Submitted Date</label>
                                    <h6><?= date('jS F, Y h:i A', strtotime($reviewdata['created_date'])); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <?php
                            if ($reviewdata['approved_date']) {
                            ?>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Approved Date&Time</label>
                                        <h6><?= date('jS F, Y h:i A', strtotime($reviewdata['approved_date'])); ?></h6>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="col-md-9 col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <h6><?= $reviewdata['review_description']; ?></h6>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-12 col-sm-12 text-right">
                                <div class="btn-list">
                                    <?php
                                    if ($reviewdata['status'] == 0) {
                                    ?>
                                        <a type="button" href="?RId=<?= $reviewdata['review_id'] ?>&confirmId=<?= $reviewdata['review_id'] ?>&status=1" class="btn btn-success">Approve Review</a>
                                    <?php
                                    } elseif ($reviewdata['status'] == 1) {
                                    ?>
                                        <a type="button" href="?RId=<?= $reviewdata['review_id'] ?>&confirmId=<?= $reviewdata['review_id'] ?>&status=0" class="btn btn-danger">Disapprove Review</a>
                                    <?php
                                    }
                                    ?>
                                    <a type="button" href="?RId=<?= $reviewdata['review_id'] ?>&confirmId=<?= $reviewdata['review_id'] ?>&status=2" class="btn btn-danger">Remove Review</a>
                                    <a type="button" href="review-manage.php" class="btn btn-secondary">Go Back</a>
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