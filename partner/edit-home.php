<?php

// Include database file
include_once '../includes/dbconfig.php';

// Edit customer record

if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $homedata = $home->displyaRecordById($editId);
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
                                    <li class="breadcrumb-item active" aria-current="page">edit home</li>
                                </ol>
                            </nav>
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
                            <label>Avarage Night Price(LKR)</label>
                            <input class="form-control" name="anprice" type="number" value="<?php echo $homedata['ava_night_price']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="focusedinput" >Package Image</label>
                            <div class="col-sm-8">
                                <img src="includes/uploads/<?php echo $homedata['cover_img1']; ?>" width="500">&nbsp;&nbsp;&nbsp;
                                
                                
                                <!-- onwards -->
                                
                                
                                
                                <a href="change-image.php?imgid=<?php echo htmlentities($result->PackageId); ?>">Change Image</a>
                            </div>
                        </div>



                        <!-- <div class="form-group">
                            <label>Home Image</label>
                            <input type="file" class="form-control" value="<?= $homedata['cover_img1']; ?>" name="image">
                        </div> -->
                        <div class="form-group">
                            <label>Home Details</label>
                            <textarea name="lgdesc" class="form-control"><?php echo $homedata['lg_desc']; ?></textarea>
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
                            <label>Extra People</label>
                            <input type="text" class="form-control" name="e_people">
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
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>Availability End Date</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <input class="btn btn-primary" name="submit" type="submit" value="Submit">
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