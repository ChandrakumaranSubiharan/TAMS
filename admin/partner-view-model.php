<?php

// Include database file
include_once '../includes/dbconfig.php';

// display record
if (isset($_GET['UId']) && !empty($_GET['UId'])) {
    $UId = $_GET['UId'];
    $partnerdata = $partner->displyaRecordById($UId);
}

if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $UserActivate = $partner->updatestatusActive($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Partner Activated Successfully
      </div>";
        $partnerdata = $partner->displyaRecordById($UId);
    } elseif ($CurrentStatus == 0) {
        $UserDeactivate = $partner->updatestatusDeactive($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Partner Deactivated Successfully
      </div>";
        $partnerdata = $partner->displyaRecordById($UId);
    } elseif ($CurrentStatus == 2) {
        $UserDelete = $partner->DeleteUser($editId);
        echo "<script>alert('Partner Removed Successfully'); window.location = 'partner-manage.php';</script>";
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
                                <h4>View Partner Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Manage Partners</li>
                                    <li class="breadcrumb-item active" aria-current="page">View partner</li>
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
                                    <label>Partner Id</label>
                                    <h6><?= $UId; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <h6><?= $partnerdata['first_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <h6><?= $partnerdata['last_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <h6><?= $partnerdata['username']; ?></h6>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <h6><?= $partnerdata['contact_number']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <h6><?= $partnerdata['email_address']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <h6><?= $partnerdata['address']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Province</label>
                                    <h6><?= $partnerdata['province']; ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <h6><?= $partnerdata['gender']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Zipcode</label>
                                    <h6><?= $partnerdata['zipcode']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <h6><?php if ($partnerdata['status'] == 0) {
                                            echo "<span style='color: red;'>Inactive</span>";
                                        } elseif ($partnerdata['status'] == 1) {
                                            echo "<span style='color: green;'>Active</span>";
                                        } ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Registred Date&Time</label>
                                    <h6><?= date('jS F, Y h:i A', strtotime($partnerdata['created_date'])); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-right">
                                <div class="btn-list">
                                    <?php
                                    if ($partnerdata['status'] == 0) {
                                    ?>
                                        <a type="button" href="?UId=<?= $partnerdata['partner_id'] ?>&confirmId=<?= $partnerdata['partner_id'] ?>&status=1" class="btn btn-success">Activate User</a>
                                    <?php
                                    } elseif ($partnerdata['status'] == 1) {
                                    ?>
                                        <a type="button" href="?UId=<?= $partnerdata['partner_id'] ?>&confirmId=<?= $partnerdata['partner_id'] ?>&status=0" class="btn btn-danger">Deactivate User</a>
                                    <?php
                                    }
                                    ?>
                                    <a type="button" href="?UId=<?= $partnerdata['partner_id'] ?>&confirmId=<?= $partnerdata['partner_id'] ?>&status=2" class="btn btn-danger">Remove User</a>
                                    <a type="button" href="partner-manage.php" class="btn btn-secondary">Go Back</a>
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