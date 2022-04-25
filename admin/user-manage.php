<?php
// Include database file
include_once '../includes/dbconfig.php';



if (isset($_GET['UId']) && !empty($_GET['UId'])) {
    $editId = $_GET['UId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $Activate = $admin->updatestatusActive($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    User Activated Successfully
  </div>";
    } elseif ($CurrentStatus == 0) {
        $Deactivate = $admin->updatestatusDeactive($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    User Deactivated Successfully
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
                                <h4>Manage Internal Users </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Internal Users</li>
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


                <!-- Export Datatable start -->
                <div class="card-box mb-30">
                    <div class=" pt-20">
                        <table class=" table hover data-table-export nowrap ">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Id</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Staff Id</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userdata = $admin->displayUserData();
                                foreach ($userdata as $users) {
                                ?>
                                    <tr>
                                        <td><?= $users['admin_id']; ?></td>
                                        <td><?= $users['full_name'] ?></td>
                                        <td><?= $users['email']; ?></td>
                                        <td><?= $users['staff_id']; ?></td>
                                        <td><?= $users['department']; ?></td>
                                        <td><?php if ($users['status'] == 0) {
                                                echo "<span style='color: red;'>Inactive</span>";
                                            } elseif ($users['status'] == 1) {
                                                echo "<span style='color: green;'>Active</span>";
                                            }  else {
                                                echo "Disabled";
                                            } ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="booking-view-model.php?viewId=<?php echo $users['booking_id'] ?>"><i class="dw dw-eye"></i> View</a>
                                                    <?php
                                                    if ($users['status'] <= 0 && $users['admin_id'] != $returned_row['admin_id']) {
                                                    ?>
                                                        <a class="dropdown-item" href="?UId=<?php echo $users['admin_id'] ?>&status=1"><i style="color:green" class="icon-copy ion-checkmark-circled"></i>Active</a>
                                                    <?php
                                                    } elseif ($users['status'] == 1 && $users['admin_id'] != $returned_row['admin_id']) {
                                                    ?>
                                                        <a class="dropdown-item" href="?UId=<?php echo $users['admin_id'] ?>&status=0"><i style="color:red" class="icon-copy ion-checkmark-circled"></i>Deactive</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Export Datatable End -->
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