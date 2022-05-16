<?php

// Include database file
include_once '../includes/dbconfig.php';


// display record
if (isset($_GET['viewId']) && !empty($_GET['viewId'])) {
    $viewId = $_GET['viewId'];
    $homedata = $home->displyaRecordById($viewId);
}


if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $homedataactive = $home->updatestatusActive($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Home Activated Successfully
      </div>";
        $homedata = $home->displyaRecordById($viewId);
    } elseif ($CurrentStatus == 0) {
        $homeddataeactive = $home->updatestatusDeactive($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Home Deactivated Successfully
      </div>";
        $homedata = $home->displyaRecordById($viewId);
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
                                <h4>View Home Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">manage home</li>
                                    <li class="breadcrumb-item active" aria-current="page">view home</li>
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
                                    <label>Home Id</label>
                                    <h6><?php echo $viewId; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Home Name</label>
                                    <h6><?php echo $homedata['home_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Home Type</label>
                                    <h6><?php echo $homedata['home_type']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Rooms Included</label>
                                    <h6><?php echo $homedata['rooms']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group">
                                    <label>Home Details</label>
                                    <h6 style="text-align: justify;"><?php echo $homedata['lg_desc']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Home Image</label>
                                    <div>
                                        <img src="../partner/includes/uploads/<?php echo $homedata['cover_img1']; ?>" width="250">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Home District</label>
                                    <h6><?php echo $homedata['district']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Home Location</label>
                                    <h6><?php echo $homedata['location_address']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Availability Start Date</label>
                                    <h6><?php echo $homedata['ava_start_date']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Availability End Date</label>
                                    <h6><?php echo $homedata['ava_end_date']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Home Province</label>
                                    <h6><?php echo $homedata['province']; ?></h6>
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
                                    <label>Max Kids</label>
                                    <h6><?php echo $homedata['max_kids']; ?></h6>
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
                                    <h6><?php if ($homedata['status'] == 0) {
                                            echo "<span style='color: red;'>Inactive</span>";
                                        } elseif ($homedata['status'] == 1) {
                                            echo "<span style='color: green;'>Active</span>";
                                        } elseif ($homedata['status'] == 2) {
                                            echo "<span style='color: firebrick;'>Not Verified Yet</span>";
                                        } elseif ($homedata['status'] == 3) {
                                            echo "<span style='color: red;'>Verification Failed</span>";
                                        } else {
                                            echo "<span style='color: red;'>Disabled by Admin</span>";
                                        } ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                                <div class="btn-list">
                                    <?php
                                    if ($homedata['status'] == 0) {
                                    ?>
                                        <a type="button" href="?viewId=<?php echo $homedata['home_id'] ?>&confirmId=<?php echo $homedata['home_id'] ?>&status=1" class="btn btn-success">Activate Home</a>
                                    <?php
                                    } elseif ($homedata['status'] == 1) {
                                    ?>
                                        <a type="button" href="?viewId=<?php echo $homedata['home_id'] ?>&confirmId=<?php echo $homedata['home_id'] ?>&status=0" class="btn btn-danger">Deactivate Home</a>
                                    <?php
                                    }
                                    ?>
                                    <a type="button" href="home-manage.php" class="btn btn-secondary">Go Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                HappyHolidayss By <a href="https://github.com/dropways" target="_blank">Chandrakumaran Subiharan</a>
            </div>
        </div>
    </div>

    </div>

    <?php include('includes/scripts.php'); ?>

</body>

</html>