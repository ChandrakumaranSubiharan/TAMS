<?php
// Include database file
include_once '../includes/dbconfig.php';


// Delete record from table
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $tour->deleteRecord($deleteId);
    $msg = "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    Record deleted successfully
  </div>";
}


if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 1) {
        $tourataactive = $tour->updatestatusActive($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Tour Activated Successfully
      </div>";
    } elseif ($CurrentStatus == 0) {
        $tourddataeactive = $tour->updatestatusDeactive($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Tour Deactivated Successfully
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
                                <h4>Manage Tours</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage tour</li>
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
                                    <th>Tour Name</th>
                                    <th>Ava Start Date</th>
                                    <th>Ava End Date</th>
                                    <th>Status</th>
                                    <th>Duration</th>
                                    <th>Ava Seats</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $tourdata = $tour->displayData();
                                foreach ($tourdata as $tourinfo) {

                                ?>
                                    <tr>
                                        <td><?php echo $tourinfo['tour_id']; ?></td>
                                        <td><?php echo $tourinfo['title']; ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($tourinfo['ava_start_date'])); ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($tourinfo['ava_end_date'])); ?></td>
                                        <td><?php if ($tourinfo['status'] == 0) {
                                                echo "<span style='color: red;'>Inactive</span>";
                                            } elseif ($tourinfo['status'] == 1) {
                                                echo "<span style='color: green;'>Active</span>";
                                            } elseif ($tourinfo['status'] == 2) {
                                                echo "<span style='color: firebrick;'>Not Verified Yet</span>";
                                            } elseif ($tourinfo['status'] == 3) {
                                                echo "<span style='color: red;'>Verification Failed</span>";
                                            } else {
                                                echo "<span style='color: red;'>Disabled by Admin</span>";
                                            } ?></td>
                                        <td><?php echo $tourinfo['duration_nights']; ?> Nights</td>
                                        <td><?php echo $tourinfo['availabile_seats']; ?></td>


                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="tour-view-model.php?viewId=<?php echo $tourinfo['tour_id'] ?>"><i class="dw dw-eye"></i> View</a>
                                                    <a href="tour-manage.php?deleteId=<?php echo $tourinfo['tour_id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</a>
                                                    <?php
                                                    if ($tourinfo['status'] == 0) {
                                                    ?>
                                                        <a class="dropdown-item" href="?confirmId=<?php echo $tourinfo['tour_id'] ?>&status=1"><i style="color:green" class="icon-copy ion-checkmark-circled"></i>Activate</a>
                                                    <?php
                                                    } elseif ($tourinfo['status'] == 1) {
                                                    ?>
                                                        <a class="dropdown-item" href="?confirmId=<?php echo $tourinfo['tour_id'] ?>&status=0"><i style="color:red" class="icon-copy ion-close-circled"></i>Deactivate</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
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


    <?php include('includes/scripts.php'); ?>

    <script>
        $('#Medium-modal').on('show.bs.modal', function(e) {
            var tourId = $(e.relatedTarget).data('tour-id');
            $(e.currentTarget).find('input[name="tourId"]').val(tourId);
        });
    </script>


</body>

</html>