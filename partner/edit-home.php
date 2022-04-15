<?php

// Include database file
include_once '../includes/dbconfig.php';

// display edit record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $homedata = $home->displyaRecordById($editId);
}


// Update Record in customer table
if (isset($_POST['update'])) {
    $id = $_GET['editId'];
    $homename = $_POST['hname'];
    $location = $_POST['laddress'];
    $aprice = $_POST['anprice'];
    $kprice = $_POST['kidprice'];
    $madult = $_POST['madult'];
    $mkid = $_POST['mkid'];
    $room = $_POST['rooms'];
    $des = $_POST['lgdesc'];
    $type = $_POST['type'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $cancell = $_POST['cancel'];
    $ava_start = $_POST['start_date'];
    $ava_end = $_POST['end_date'];
    $s_time = $_POST['starttime'];
    $e_time = $_POST['endtime'];
    $sta = $_POST['stat'];


    $updateData = $home->update($id, $homename, $location, $aprice, $kprice, $madult, $mkid, $room, $des, $type, $province, $district, $cancell, $ava_start, $ava_end, $s_time, $e_time, $sta);

    if ($updateData) {

        $msg = "<div class='alert alert-info'>
        <strong>WOW!</strong> Record was updated successfully!
        </div>";
        $homedata = $home->displyaRecordById($editId);

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
                                <h4>Edit Home</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="index.html">Manage Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Home</li>
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
                            <label>Home Name</label>
                            <input class="form-control" name="hname" type="text" value="<?php echo $homedata['home_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Home Location</label>
                            <input class="form-control" name="laddress" placeholder="Enter Home Location" value="<?php echo $homedata['location_address']; ?>" type="text">
                        </div>
                        <div class="form-group">
                            <label>Adult/Avg/Night Price(LKR)</label>
                            <input class="form-control" name="anprice" type="number" value="<?php echo $homedata['ava_night_price_adult']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Kid/Avg/Night Price(LKR)</label>
                            <input class="form-control" name="kidprice" type="number" value="<?php echo $homedata['ava_night_price_kid']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Max Adults</label>
                            <input class="form-control" name="madult" type="number" value="<?php echo $homedata['max_adults']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Max Kids</label>
                            <input class="form-control" name="mkid" type="number" value="<?php echo $homedata['max_kids']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Rooms Included</label>
                            <input class="form-control" name="rooms" type="number" value="<?php echo $homedata['rooms']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="focusedinput">Home Image</label>
                            <div>
                                <img src="includes/uploads/<?php echo $homedata['cover_img1']; ?>" width="400">&nbsp;&nbsp;&nbsp;

                                <a href="change-image.php?homeimgid=<?php echo $homedata['home_id']; ?>">Change Image</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Home Details</label>
                            <textarea name="lgdesc" class="form-control"><?php echo $homedata['lg_desc']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="custom-select col-12">
                                <option value="<?php echo $homedata['home_type']; ?>"><?php echo $homedata['home_type']; ?></option>
                                <option value="Cabin">Cabin</option>
                                <option value="Cottage">Cottage</option>
                                <option value="Resort">Resort</option>
                                <option value="Villa">Villa</option>
                                <option value="Hostel">Hostel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Province</label>
                            <select name="province" class="custom-select col-12">
                                <option value="<?php echo $homedata['province']; ?>"><?php echo $homedata['province']; ?></option>
                                <option value="Northern Province">Northern Province</option>
                                <option value="Central Province">Central Province</option>
                                <option value="Western Province">Western Province</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>District</label>
                            <select name="district" class="custom-select col-12">
                                <option value="<?php echo $homedata['district']; ?>"><?php echo $homedata['district']; ?></option>
                                <option value="Kandy">Kandy</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Colombo">Colombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cancellation</label>
                            <select name="cancel" class="custom-select col-12">
                                <option value="<?php echo $homedata['cancellation']; ?>"><?php if ($homedata['cancellation'] == 1) {
                                                                                                echo "Enabled";
                                                                                            } else {
                                                                                                echo "Disabled";
                                                                                            } ?></option>
                                <option value="1">Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Availability Start Date</label>
                            <input type="date" value="<?php echo $homedata['ava_start_date']; ?>" class="form-control" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>Availability End Date</label>
                            <input type="date" value="<?php echo $homedata['ava_end_date']; ?>" class="form-control" name="end_date">
                        </div>
                        <div class="form-group">
                            <label>Stay Start Time</label>
                            <input type="time" value="<?php echo $homedata['s_time']; ?>" class="form-control" name="starttime">
                        </div>
                        <div class="form-group">
                            <label>Stay End Time</label>
                            <input type="time" value="<?php echo $homedata['e_time']; ?>" class="form-control" name="endtime">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="stat" class="custom-select col-12">
                                <option value="<?php echo $homedata['status']; ?>"><?php if($homedata['status'] == 1)
                                                {echo"Active";} 
                                                else
                                                {echo"Deactive";} ?></option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <input class="btn btn-primary" name="update" type="submit" value="Update">
                        <input class="btn btn-info" type="reset" value="Reset">
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

