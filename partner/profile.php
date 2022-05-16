<?php

// Include database file
include_once '../includes/dbconfig.php';

// Update Record in customer table
if (isset($_POST['update'])) {
    $id = $_POST['uid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $mail = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $zip = $_POST['zip'];
    $province = $_POST['province'];
    $gender = $_POST['gender'];

    $UpdateProfileData = $partner->update($id, $fname, $lname, $uname, $pass, $mail, $contact, $address, $zip, $province, $gender);

    if ($UpdateProfileData) {

        $msg = "<div class='alert alert-info'>
        <strong>WOW!</strong> Record was updated successfully!
        </div>";
        $partnerdata = $partner->displyaRecordById($pid);
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

</head>

<body>
    <?php include('includes/header.php'); ?>
    <?php include('includes/navigation.php'); ?>

    <?php
    // display edit record
    if ($returned_row['partner_id']) {
        $pid = $returned_row['partner_id'];
        $partnerdata = $partner->displyaRecordById($pid);
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
                                <h4>Profile </h4>
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
                            <h5 class="text-center h5 mb-0 "><?php echo $partnerdata['username']; ?></h5>
                            <p class="text-center text-muted font-14"></p>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        <?php echo $partnerdata['email_address']; ?>
                                    </li>
                                    <li>
                                        <span>Phone Number:</span>
                                        <?php echo $partnerdata['contact_number']; ?>

                                    </li>
                                    <li>
                                        <span>Address:</span>
                                        <?php echo $partnerdata['address']; ?>
                                    </li>
                                    <li>
                                        <span>Province:</span>
                                        <?php echo $partnerdata['province']; ?>
                                    </li>
                                    <li>
                                        <span>Zip Code:</span>
                                        <?php echo $partnerdata['zipcode']; ?>
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

                                                    <input type="hidden" name="uid" value="<?php echo $returned_row['partner_id']; ?>">
                                                    <ul class="profile-edit-list row">
                                                        <li class="weight-500 col-md-12">
                                                            <h4 class="text-blue h5 mb-20">Edit Your Personal Details</h4>
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input class="form-control form-control-lg" type="text" name="fname" value="<?php echo $partnerdata['first_name']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input class="form-control form-control-lg" type="text" name="lname" value="<?php echo $partnerdata['last_name']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>User Name</label>
                                                                <input class="form-control form-control-lg" type="text" name="uname" value="<?php echo $partnerdata['username']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input class="form-control form-control-lg" type="password" name="pass" value="">
                                                                <span>Leave this blank if you dont want to change the password.</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input class="form-control form-control-lg" type="email" name="email" value="<?php echo $partnerdata['email_address']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Contact</label>
                                                                <input class="form-control form-control-lg" type="text" name="contact" value="<?php echo $partnerdata['contact_number']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input class="form-control form-control-lg" type="text" name="address" value="<?php echo $partnerdata['address']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Zip Code</label>
                                                                <input class="form-control form-control-lg" type="number" name="zip" value="<?php echo $partnerdata['zipcode']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>State/Province/Region</label>
                                                                <select name="province" class="custom-select col-12" required>
                                                                    <option value="<?php echo $partnerdata['province']; ?>"><?php echo $partnerdata['province']; ?></option>
                                                                    <option value="Northern">Northern</option>
                                                                    <option value="North Western">North Western</option>
                                                                    <option value="Western">Western</option>
                                                                    <option value="North Central">North Central</option>
                                                                    <option value="Central">Central</option>
                                                                    <option value="Sabaragamuwa">Sabaragamuwa</option>
                                                                    <option value="Eastern">Eastern</option>
                                                                    <option value="Uva">Uva</option>
                                                                    <option value="Southern">Southern</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Gender</label>
                                                                <select name="gender" class="custom-select col-12" required>
                                                                    <option value="<?php echo $partnerdata['gender']; ?>"><?php echo $partnerdata['gender']; ?></option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
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