<?php

// Include database file
include_once '../includes/dbconfig.php';

// display edit record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $tourdata = $tour->displyaRecordById($editId);
}


// Update Record in customer table
if (isset($_POST['update'])) {
    $id = $_GET['editId'];
    $tourtitle = $_POST['ttitle'];
    $location = $_POST['tloc'];
    $price = $_POST['anprice'];
    $k_status = $_POST['kstatus'];
    $k_price = $_POST['kidprice'];
    $des = $_POST['detail'];
    $duration = $_POST['duration'];
    $type = $_POST['type'];
    $avaseats = $_POST['ava_seat'];
    $glocation = $_POST['g_location'];
    $language = $_POST['language'];
    $district = $_POST['district'];
    $cancell = $_POST['cancel'];
    $ava_start = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $ava_end = $_POST['end_date'];
    $end_time = $_POST['end_time'];
    $sta = $_POST['stat'];


    $updateData = $tour->update($id, $tourtitle, $location, $price, $k_status, $k_price, $des, $duration, $type, $avaseats, $glocation, $language, $district, $cancell, $ava_start, $start_time, $ava_end, $end_time, $sta);

    if ($updateData) {

        $msg = "<div class='alert alert-info'>
        <strong>WOW!</strong> Record was updated successfully!
        </div>";
        $tourdata = $tour->displyaRecordById($editId);
    } else {
        $msg = "Failed to Create Home ";
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
                                <h4>Edit Tour Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Tour</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Manage Tour</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Tour</li>
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
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tour Title</label>
                            <input class="form-control" name="ttitle" type="text" value="<?php echo $tourdata['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tour Starting Location</label>
                            <input class="form-control" name="tloc" placeholder="Enter Tour Starting Location" value="<?php echo $tourdata['location']; ?>" type="text">
                        </div>
                        <div class="form-group">
                            <label>Adult Price(LKR)</label>
                            <input class="form-control" name="anprice" type="number" value="<?php echo $tourdata['adult_price']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Kids Allowing Status</label>
                            <select name="kstatus" class="custom-select col-12" id="retrievekidava" onblur="myFunction()">
                                <option value="<?php echo $tourdata['kid_status']; ?>"><?php if ($tourdata['kid_status'] == 1) {
                                                                                            echo "Enabled";
                                                                                        } else {
                                                                                            echo "Disabled";
                                                                                        } ?></option>
                                <option value="1">Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                        <?php
                        if ($tourdata['kid_status'] == 1) {
                        ?>
                            <div class="form-group">
                                <label>Kid Price(LKR)</label>
                                <input class="form-control" name="kidprice" type="number" value="<?php echo $tourdata['kid_price']; ?>">
                            </div>
                        <?php
                        } else {
                        ?>
                            <span id="kidpricespan"></span>
                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="focusedinput">Tour Image</label>
                            <div>
                                <img src="includes/uploads/<?php echo $tourdata['image']; ?>" width="400">&nbsp;&nbsp;&nbsp;

                                <a href="change-image.php?tourimgid=<?php echo $tourdata['tour_id']; ?>">Change Image</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tour Details</label>
                            <textarea name="detail" class="form-control"><?php echo $tourdata['details']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tour Duration (in nights)</label>
                            <input class="form-control" name="duration" type="number" value="<?php echo $tourdata['duration_nights']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="custom-select col-12">
                                <option value="<?php echo $tourdata['tour_type']; ?>"><?php echo $tourdata['tour_type']; ?></option>
                                <option value="Active Adventure">Active Adventure</option>
                                <option value="Explorer">Explorer</option>
                                <option value="In-depth Cultural">In-depth Cultural</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Available Seats (count)</label>
                            <input type="text" value="<?php echo $tourdata['availabile_seats']; ?>" class="form-control" name="ava_seat">
                        </div>
                        <div class="form-group">
                            <label>Tour Gather Location</label>
                            <input type="text" value="<?php echo $tourdata['gathering_location']; ?>" class="form-control" name="g_location">
                        </div>
                        <div class="form-group">
                            <label>Tour language</label>
                            <select name="language" class="custom-select col-12">
                                <option value="<?php echo $tourdata['language']; ?>"><?php echo $tourdata['language']; ?></option>
                                <option value="english">English</option>
                                <option value="tamil">tamil</option>
                                <option value="sinhala">sinhala</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tour Starting District</label>
                            <select name="district" class="custom-select col-12">
                                <option value="<?php echo $tourdata['district']; ?>"><?php echo $tourdata['district']; ?></option>
                                <option value="Kandy">Kandy</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Colombo">Colombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tour Cancellation Status</label>
                            <select name="cancel" class="custom-select col-12">
                                <option value="<?php echo $tourdata['cancellation']; ?>"><?php if ($tourdata['cancellation'] == 1) {
                                                                                                echo "Enabled";
                                                                                            } else {
                                                                                                echo "Disabled";
                                                                                            } ?></option>
                                <option value="1">Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tour Start Date</label>
                            <input type="date" value="<?php echo $tourdata['ava_start_date']; ?>" class="form-control" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>Tour Start Time</label>
                            <input type="time" value="<?php echo $tourdata['s_time']; ?>" class="form-control" name="start_time">
                        </div>
                        <div class="form-group">
                            <label>Tour End Date</label>
                            <input type="date" value="<?php echo $tourdata['ava_end_date']; ?>" class="form-control" name="end_date">
                        </div>
                        <div class="form-group">
                            <label>Tour End Time</label>
                            <input type="time" value="<?php echo $tourdata['e_time']; ?>" class="form-control" name="end_time">
                        </div>
                        <div class="form-group">
                            <label>Tour Status</label>
                            <select name="stat" class="custom-select col-12">
                                <option value="<?php echo $tourdata['status']; ?>"><?php if ($tourdata['status'] == 1) {
                                                                                        echo "Active";
                                                                                    } else {
                                                                                        echo "Deactive";
                                                                                    } ?></option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <input class="btn btn-primary" name="update" type="submit" value="Update">
                        <a type="button" href="manage-tour.php" class="btn btn-secondary">Go Back</a>
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
    <Script>
        function myFunction() {
            var x = document.getElementById('retrievekidava').value;
            if (x == '1') {
                document.getElementById('kidpricespan').innerHTML = '<div class="form-group"><label>Kid Price(LKR)</label><input class="form-control" name="kidprice" type="number" value="<?php echo $tourdata['kid_price']; ?>"></div>';
            } else {
                document.getElementById('kidpricespan').innerHTML = '';;
            }
        }
    </Script>
</body>

</html>