<?php

// Include database file
include_once '../includes/dbconfig.php';


// Insert Record in home table
if (isset($_POST['submit'])) {

    $fullname = $_POST['fname'];
    $username = $_POST['uname'];
    $email = $_POST['mail'];
    $contact = $_POST['cnumber'];
    $staffid = $_POST['cid'];
    $department = $_POST['dep'];
    $password = $_POST['pass'];

    $insertData = $admin->create($fullname, $username, $email, $contact, $staffid, $department, $password);

    if ($insertData) {
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        User was added successfully
      </div>";
    } else {
        $msg = "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    User was failed to add
                </div>";
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
                                    <li class="breadcrumb-item active" aria-current="page">Create Internal User</li>
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
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" name="fname" type="text" placeholder="Enter Full Name" required>
                        </div>
                        <div class="form-group">
                            <label>User Name</label>
                            <input class="form-control" name="uname" placeholder="Enter User Name" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input placeholder="Enter Email Address" class="form-control" name="mail" type="email" required>
                        </div>
                        <div class="form-group">
                            <label>Contact No</label>
                            <input placeholder="Enter Contact No" class="form-control" name="cnumber" type="number" required>
                        </div>
                        <div class="form-group">
                            <label>Staff Id</label>
                            <input placeholder="Enter Staff Id" class="form-control" name="cid" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <select name="dep" class="custom-select col-12">
                                <option selected="">Choose...</option>
                                <option value="Adminstartive Department">Adminstartive Department</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input placeholder="Enter Password" class="form-control" name="pass" type="password" required>
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