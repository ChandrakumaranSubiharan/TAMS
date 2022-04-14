<?php

// Include database file
include_once '../includes/dbconfig.php';


// Insert Record in home table
if (isset($_POST['submit'])) {

    $tour_title = $_POST['ttitle'];
    $tour_location = $_POST['tlocation'];
    $adult_price = $_POST['anprice'];
    $kid_status = $_POST['kidava'];
    $kid_price = $_POST['kidprice'];
    $file = $_FILES['image'];
    $tour_details = $_POST['lgdesc'];
    $tour_duration = $_POST['duration'];
    $tour_type = $_POST['type'];
    $ava_seats = $_POST['seats'];
    $tour_language = $_POST['language'];
    $district = $_POST['district'];
    $cancel = $_POST['cancel'];
    $str_date = $_POST['start_date'];
    $str_time = $_POST['start_time'];
    $end_date = $_POST['end_date'];
    $end_time = $_POST['end_time'];
    $g_location = $_POST['gatherlocation'];
    $pid = $_POST['partnerid'];

    $insertData = $tour->insertData($tour_title, $tour_location, $adult_price, $kid_status, $kid_price, $file, $tour_details, $tour_duration, $tour_type, $ava_seats, $tour_language, $district, $cancel, $str_date ,$str_time, $end_date ,$end_time ,$g_location ,$pid);

    if ($insertData) {
        $msg = "Tour Package successfully created ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    } else {
        $msg = "Failed to Create Tour Package ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
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
                                <h4>Create Tour Package</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Tour</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">create tour</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

                    <form method="POST" enctype="multipart/form-data">
                        <input type="text" name="partnerid" hidden id="" value="<?= $returned_row['partner_id']; ?>">

                        <div class="form-group">
                            <label>Tour Title</label>
                            <input class="form-control" name="ttitle" type="text" placeholder="Enter Tour Title">
                        </div>
                        <div class="form-group">
                            <label>Tour Starting Location</label>
                            <input class="form-control" name="tlocation" placeholder="Enter Tour Starting Location" type="text">
                        </div>
                        <div class="form-group">
                            <label>Adult Price(LKR)</label>
                            <input placeholder="Enter Adult Price in LKR" class="form-control" name="anprice" type="number">
                        </div>


                        <Script>
                            function myFunction() {
                                var x = document.getElementById('retrievekidava').value;
                                if (x == '1') {
                                    document.getElementById('kidpricespan').innerHTML = '<div class="form-group"><label>Kid Price(LKR)</label><input placeholder="Enter Kid Price in LKR" class="form-control" name="kidprice" type="number"></div>';
                                } else {
                                    document.getElementById('kidpricespan').innerHTML = '';;
                                }
                            }
                        </Script>


                        <div class="form-group">
                            <label>Is Kids Allowed ?</label>
                            <select name="kidava" class="custom-select col-12" id="retrievekidava" onblur="myFunction()">
                                <option selected="">Choose...</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <span id="kidpricespan"></span>

                        <div class="form-group">
                            <label>Tour Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label>Tour Details</label>
                            <textarea placeholder="Enter Tour Details" name="lgdesc" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tour Duration (in nights)</label>
                            <input class="form-control" name="duration" placeholder="Enter Tour Duration in Nights" type="number">
                        </div>
                        <div class="form-group">
                            <label>Tour Type</label>
                            <select name="type" class="custom-select col-12">
                                <option selected="">Choose...</option>
                                <option value="Active Adventure">Active Adventure</option>
                                <option value="Explorer">Explorer</option>
                                <option value="In-depth Cultural">In-depth Cultural</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tour Available Seats (count)</label>
                            <input class="form-control" placeholder="Enter Seats Availability in Number" name="seats" type="number">
                        </div>
                        <div class="form-group">
                            <label>Tour language</label>
                            <select name="language" class="custom-select col-12">
                                <option selected="">Choose...</option>
                                <option value="English">English</option>
                                <option value="Tamil">Tamil</option>
                                <option value="Sinhala">Sinhala</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tour District</label>
                            <select name="district" class="custom-select col-12">
                                <option selected="">Choose...</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Colombo">Colombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cancellation</label>
                            <select name="cancel" class="custom-select col-12">
                                <option selected="">Choose...</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Availability Start Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="time" class="form-control" name="start_time">
                        </div>
                        <div class="form-group">
                            <label>Availability End Date</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <div class="form-group">
                            <label>End Time</label>
                            <input type="time" class="form-control" name="end_time">
                        </div>
                        <div class="form-group">
                            <label>Gathering Location</label>
                            <input type="text" class="form-control" name="gatherlocation">
                        </div>
                        <input class="btn btn-primary" name="submit" type="submit" value="Submit">
                        <input class="btn btn-info" type="reset" value="Reset">
                    </form>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                HappyHolidayss By <a href="https://github.com/dropways" target="_blank">Subiharan Chandrakumaran</a>
            </div>
        </div>
    </div>

    </div>

    <?php include('includes/scripts.php'); ?>

</body>

</html>