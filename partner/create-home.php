<?php

// Include database file
include_once '../includes/dbconfig.php';


// Insert Record in home table
if(isset($_POST['submit'])) {

    $home_name = $_POST['hname'];
    $location_address = $_POST['laddress'];
    $adult_price = $_POST['anprice'];
    $kid_price = $_POST['kidprice'];
    $max_adult = $_POST['madult'];
    $max_kid = $_POST['mkid'];
    $lg_desc = $_POST['lgdesc'];
    $home_type = $_POST['type'];
    $home_room = $_POST['rooms'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $cancel = $_POST['cancel'];
    $str_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $str_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $file = $_FILES['image'];
    $pid = $_POST['partnerid'];

    $insertData = $home->insertData($home_name, $location_address, $adult_price, $kid_price, $max_adult, $max_kid, $lg_desc, $home_type,$home_room, $district, $province, $cancel, $str_date, $end_date, $str_time, $end_time, $file,$pid);

    if ($insertData){
        $msg = "Home successfully created ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }else{
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
                                <h4>Create Home</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Home</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <form method="POST" enctype="multipart/form-data">

                    <input type="text" name="partnerid" hidden id="" value="<?= $returned_row['partner_id']; ?>">


                        <div class="form-group">
                            <label>Home Name</label>
                            <input class="form-control" name="hname" type="text" placeholder="Enter Home Name">
                        </div>
                        <div class="form-group">
                            <label>Home Location</label>
                            <input class="form-control" name="laddress" placeholder="Enter Home Location" type="text">
                        </div>
                        <div class="form-group">
                            <label>Adult/Avg/Night Price(LKR)</label>
                            <input placeholder="Enter Avarage Adult Night Price in LKR" class="form-control" name="anprice" type="number">
                        </div>
                        <div class="form-group">
                            <label>Kid/Avg/Night Price(LKR)</label>
                            <input placeholder="Enter Avarage Kid Night Price in LKR" class="form-control" name="kidprice" type="number">
                        </div>
                        <div class="form-group">
                            <label>Max Adults</label>
							<select name="madult" class="custom-select col-12">
									<option selected="">Choose...</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Max Kids</label>
							<select name="mkid" class="custom-select col-12">
									<option selected="">Choose...</option>
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
                                    <option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Home Image</label>
                            <input type="file" class="form-control" name="image" >
                        </div>
                        <div class="form-group">
							<label>Home Details</label>
							<textarea placeholder="Enter Home Details"  name="lgdesc" class="form-control"></textarea>
						</div>
                        <div class="form-group">
							<label>Type</label>
							<select name="type" class="custom-select col-12">
									<option selected="">Choose...</option>
									<option value="Cabin">Cabin</option>
									<option value="Cottage">Cottage</option>
									<option value="Resort">Resort</option>
									<option value="Villa">Villa</option>
									<option value="Hostel">Hostel</option>
							</select>
						</div>
                        <div class="form-group">
							<label>Available Rooms</label>
							<select name="rooms" class="custom-select col-12">
									<option selected="">Choose...</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
							</select>
						</div>
                        <div class="form-group">
							<label>Province</label>
							<select name="province" class="custom-select col-12">
									<option selected="">Choose...</option>
									<option value="Northern Province">Northern Province</option>
									<option value="Central Province">Central Province</option>
									<option value="Western Province">Western Province</option>
							</select>
						</div>
                        <div class="form-group">
							<label>District</label>
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
                        <input type="date" class="form-control" name="start_date" >
                        </div>
                        <div class="form-group">
                        <label>Availability End Date</label>
                        <input type="date" class="form-control" name="end_date" >
                        </div>
                        <div class="form-group">
                        <label>Stay Start Time</label>
                        <input type="time" class="form-control" name="start_time" >
                        </div>
                        <div class="form-group">
                        <label>Stay End Time</label>
                        <input type="time" class="form-control" name="end_time" >
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