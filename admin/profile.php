<?php

// Include database file
include_once '../includes/dbconfig.php';


// Update Record in admin table
if (isset($_POST['update'])) {
    $id = $_POST['uid'];
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $mail = $_POST['email'];
    $contact = $_POST['contact'];

    $UpdateProfileData = $admin->update($id, $fname, $uname, $pass, $mail, $contact);

    if ($UpdateProfileData) {

        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Record was updated successfully
      </div>";


        $admindata = $admin->displyaRecordById($aid);
    } else {
        $msg = "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    Record was failed to updated
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

    <?php
    // display edit record
    if ($returned_row['admin_id']) {
        $aid = $returned_row['admin_id'];
        $admindata = $admin->displyaRecordById($aid);
    }
    ?>

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Profile</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="profile-photo">
                                <img src="../assets/dashboard/vendors/images/user.png" alt="" class="avatar-photo">
                            </div>
                            <h5 class="text-center h5 mb-0 "><?php echo $admindata['username']; ?></h5>
                            <p class="text-center text-muted font-14"></p>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Full Name:</span>
                                        <?php echo $admindata['full_name']; ?>
                                    </li>
                                    <li>
                                        <span>Email Address:</span>
                                        <?php echo $admindata['email']; ?>
                                    </li>
                                    <li>
                                        <span>Phone Number:</span>
                                        <?php echo $admindata['contact_number']; ?>

                                    </li>
                                    <li>
                                        <span>Staff ID:</span>
                                        <?php echo $admindata['staff_id']; ?>
                                    </li>
                                    <li>
                                        <span>Department:</span>
                                        <?php echo $admindata['department']; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                        <div class="card-box height-100-p overflow-hidden">
                            <div class="profile-tab height-100-p">
                                <div class="tab height-100-p">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Settings</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Setting Tab start -->
                                        <div class="tab-pane fade height-100-p show active" id="setting" role="tabpanel">
                                            <div class="profile-setting">
                                                <form method="POST">
                                                    <input type="hidden" name="uid" value="<?php echo $returned_row['admin_id']; ?>">
                                                    <ul class="profile-edit-list row">
                                                        <li class="weight-500 col-md-12">
                                                            <h4 class="text-blue h5 mb-20">Edit Your Personal Details</h4>
                                                            <div class="form-group">
                                                                <label>Full Name</label>
                                                                <input class="form-control form-control-lg" type="text" name="fname" value="<?php echo $admindata['full_name']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>User Name</label>
                                                                <input class="form-control form-control-lg" type="text" name="uname" value="<?php echo $admindata['username']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input class="form-control form-control-lg" type="password" name="pass" value="" autocomplete="off">
                                                                <span>Leave this blank if you dont want to change the password.</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input class="form-control form-control-lg" type="email" name="email" value="<?php echo $admindata['email']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Contact</label>
                                                                <input class="form-control form-control-lg" type="text" name="contact" value="<?php echo $admindata['contact_number']; ?>">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <input type="submit" class="btn btn-primary" name="update" value="Update Information">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Setting Tab End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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