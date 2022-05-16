<?php

// Include database file
include_once '../includes/dbconfig.php';

// display record
if (isset($_GET['UId']) && !empty($_GET['UId'])) {
    $UId = $_GET['UId'];
    $admindata = $admin->displyaRecordById($UId);
}

if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $UserActivate = $admin->updatestatusActive($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        User Activated Successfully
      </div>";
        $admindata = $admin->displyaRecordById($UId);
    } elseif ($CurrentStatus == 0) {
        $UserDeactivate = $admin->updatestatusDeactive($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        User Deactivated Successfully
      </div>";
        $admindata = $admin->displyaRecordById($UId);
    } elseif ($CurrentStatus == 2) {
        $UserDelete = $admin->DeleteUser($editId);
        echo "<script>alert('User Removed Successfully'); window.location = 'user-manage.php';</script>";
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

    <div class="mobile-menu-overlay"></div>


    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>View Earning Details</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Internal Users</li>
                                    <li class="breadcrumb-item active" aria-current="page">View User</li>
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
                                    <label>User Id</label>
                                    <h6><?= $UId; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <h6><?= $admindata['full_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <h6><?= $admindata['username']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <h6><?= $admindata['contact_number']; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <h6><?= $admindata['email']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Staff Id</label>
                                    <h6><?= $admindata['staff_id']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <h6><?= $admindata['department']; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <h6><?php if ($admindata['status'] == 0) {
                                            echo "<span style='color: red;'>Inactive</span>";
                                        } elseif ($admindata['status'] == 1) {
                                            echo "<span style='color: green;'>Active</span>";
                                        } else {
                                            echo "Disabled";
                                        } ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Registred Date&Time</label>
                                    <h6><?= date('jS F, Y h:i A', strtotime($admindata['created_date'])); ?></h6>
                                </div>
                            </div>

                            <div class="col-md-9 col-sm-12 text-right">
                                <div class="btn-list">
                                    <?php
                                    if ($admindata['status'] == 0  && $admindata['admin_id'] != $returned_row['admin_id']) {
                                    ?>
                                        <a type="button" href="?UId=<?= $admindata['admin_id'] ?>&confirmId=<?= $admindata['admin_id'] ?>&status=1" class="btn btn-success">Activate User</a>
                                    <?php
                                    } elseif ($admindata['status'] == 1 && $admindata['admin_id'] != $returned_row['admin_id']) {
                                    ?>
                                        <a type="button" href="?UId=<?= $admindata['admin_id'] ?>&confirmId=<?= $admindata['admin_id'] ?>&status=0" class="btn btn-danger">Deactivate User</a>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($admindata['admin_id'] != $returned_row['admin_id']) {
                                    ?>
                                        <a type="button" href="?UId=<?= $admindata['admin_id'] ?>&confirmId=<?= $admindata['admin_id'] ?>&status=2" class="btn btn-danger">Remove User</a>
                                    <?php
                                    }
                                    ?>
                                    <a type="button" href="user-manage.php" class="btn btn-secondary">Go Back</a>
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