<?php

// Include database file
include_once '../includes/dbconfig.php';

// display record
if (isset($_GET['viewId']) && !empty($_GET['viewId'])) {
    $viewId = $_GET['viewId'];
    $tourdata = $tour->displyaRecordById($viewId);
}

if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $tourdataactive = $tour->updatestatusActive($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Tour Activated Successfully
      </div>";
        $tourdata = $tour->displyaRecordById($viewId);
    } elseif ($CurrentStatus == 0) {
        $homeddataeactive = $tour->updatestatusDeactive($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Tour Deactivated Successfully
      </div>";
        $tourdata = $tour->displyaRecordById($viewId);
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
                                <h4>View Tour Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Tour</a></li>
                                    <li class="breadcrumb-item" aria-current="page">manage tour</li>
                                    <li class="breadcrumb-item active" aria-current="page">view tour</li>
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
                                    <label>Tour Id</label>
                                    <h6><?php echo $viewId; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Title</label>
                                    <h6><?php echo $tourdata['title']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Type</label>
                                    <h6><?php echo $tourdata['tour_type']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Language</label>
                                    <h6><?php echo $tourdata['language']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Details</label>
                                    <h6 style="text-align: justify;"><?php echo $tourdata['details']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Image</label>
                                    <div>
                                        <img src="includes/uploads/<?php echo $tourdata['image']; ?>" width="250">

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour District</label>
                                    <h6><?php echo $tourdata['district']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Starting Location</label>
                                    <h6><?php echo $tourdata['location']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Start Date</label>
                                    <h6><?php echo $tourdata['ava_start_date']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour End Date</label>
                                    <h6><?php echo $tourdata['ava_end_date']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Duration</label>
                                    <h6><?php echo $tourdata['duration_nights']; ?> Nights</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Cancellation</label>
                                    <h6><?php if ($tourdata['cancellation'] == 1) {
                                            echo "Enabled";
                                        } else {
                                            echo "Disabled";
                                        } ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Start Time</label>
                                    <h6><?php echo date('h:i A', strtotime($tourdata['s_time'])); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour End Time</label>
                                    <h6><?php echo date('h:i A', strtotime($tourdata['e_time'])); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Available Seats</label>
                                    <h6><?php echo $tourdata['availabile_seats']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Gather Location</label>
                                    <h6><?php echo $tourdata['gathering_location']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Adult Price</label>
                                    <h6><?php echo $tourdata['adult_price']; ?> LKR</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Kids Allowing Status</label>
                                    <h6> <?php if ($tourdata['kid_status'] == 1) {
                                                echo "Enabled";
                                            } else {
                                                echo "Disabled";
                                            } ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            if ($tourdata['kid_status'] == 1) {
                            ?>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Tour Kid Price</label>
                                        <h6><?php if ($tourdata['kid_price']) {
                                                echo $tourdata['kid_price'];
                                            } else {
                                                echo "0";
                                            } ?> LKR</h6>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Created Date and Time</label>
                                    <h6><?php echo date('jS F, Y h:i A', strtotime($tourdata['created_date'])); ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Tour Status</label>
                                    <h6><?php if ($tourdata['status'] == 0) {
                                            echo "<span style='color: red;'>Inactive</span>";
                                        } elseif ($tourdata['status'] == 1) {
                                            echo "<span style='color: green;'>Active</span>";
                                        } elseif ($tourdata['status'] == 2) {
                                            echo "<span style='color: firebrick;'>Not Verified Yet</span>";
                                        } elseif ($tourdata['status'] == 3) {
                                            echo "<span style='color: red;'>Verification Failed</span>";
                                        } else {
                                            echo "<span style='color: red;'>Disabled by Admin</span>";
                                        } ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 text-right">
                                <div class="btn-list">
                                    <?php
                                    if ($tourdata['status'] == 0) {
                                    ?>
                                        <a type="button" href="?viewId=<?php echo $tourdata['tour_id'] ?>&confirmId=<?php echo $tourdata['tour_id'] ?>&status=1" class="btn btn-success">Activate Tour</a>
                                    <?php
                                    } elseif ($tourdata['status'] == 1) {
                                    ?>
                                        <a type="button" href="?viewId=<?php echo $tourdata['tour_id'] ?>&confirmId=<?php echo $tourdata['tour_id'] ?>&status=0" class="btn btn-danger">Deactivate Tour</a>
                                    <?php
                                    }
                                    ?>
                                    <a type="button" href="edit-tour.php?editId=<?php echo $tourdata['tour_id'] ?>" class="btn btn-primary">Edit home</a>
                                    <a type="button" href="manage-tour.php" class="btn btn-secondary">Go Back</a>
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