<?php
// Include database file
include_once '../includes/dbconfig.php';


// Delete record from table
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $tour->deleteRecord($deleteId);
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
                                <h4>Manage Tours</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage tour</li>
                                </ol>
                            </nav>


                            <?php
                            if (isset($_GET['msg2']) == "active") {
                                echo "<div class='alert alert-success alert-dismissible'>
                                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                          Record activated successfully
                                        </div>";
                            }
                            if (isset($_GET['msg3']) == "delete") {
                                echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
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

                                    <!-- hidden -->
                                    <th hidden>Tour Starting Location</th>
                                    <th hidden>Adult Price(LKR)</th>
                                    <th hidden>Tour Details</th>
                                    <th hidden>Tour Type</th>
                                    <th hidden>Tour Language</th>
                                    <th hidden>Tour District</th>
                                    <th hidden>Tour Start Time</th>
                                    <th hidden>Tour End Time</th>
                                    <th hidden>Gathering Location</th>
                                    <th hidden>Kids Allowing Status</th>
                                    <th hidden>Tour Kid Price</th>
                                    <th hidden>Cancellation</th>
                                    <th hidden>Image</th>
                                    <th hidden>Tour Created Date</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $pid = $returned_row['partner_id'];
                                $tourdata = $tour->displayDataAsPartner($pid);

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
                                            } else {
                                                echo "Verification Failed";
                                            } ?></td>
                                        <td><?php echo $tourinfo['duration_nights']; ?> Nights</td>
                                        <td><?php echo $tourinfo['availabile_seats']; ?></td>


                                        <!-- hidden -->
                                        <td hidden><?php echo $tourinfo['location']; ?></td>
                                        <td hidden><?php echo $tourinfo['adult_price']; ?> LKR</td>
                                        <td hidden><?php echo $tourinfo['details']; ?></td>
                                        <td hidden><?php echo $tourinfo['tour_type']; ?></td>
                                        <td hidden><?php echo $tourinfo['language']; ?></td>
                                        <td hidden><?php echo $tourinfo['district']; ?></td>
                                        <td hidden><?php echo date('h:i A', strtotime($tourinfo['s_time'])); ?></td>
                                        <td hidden><?php echo date('h:i A', strtotime($tourinfo['e_time'])); ?></td>
                                        <td hidden><?php echo $tourinfo['gathering_location']; ?></td>
                                        <td hidden><?php if ($tourinfo['kid_status'] == 1) {
                                                        echo "Enabled";
                                                    } else {
                                                        echo "Disabled";
                                                    } ?></td>
                                        <td hidden><?php echo $tourinfo['kid_price']; ?></td>
                                        <td hidden><?php if ($tourinfo['cancellation'] == 0) {
                                                        echo "Disabled";
                                                    } else {
                                                        echo "Enabled";
                                                    } ?></td>
                                        <td hidden><img src="<?php echo 'includes/uploads/' . $tourinfo['image'] ?>" width="150px"></td>
                                        <td hidden><?php echo date('d-M-Y', strtotime($tourinfo['created_date'])); ?></td>

                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                                    <a class="dropdown-item" href="tour-view-model.php?viewId=<?php echo $tourinfo['tour_id'] ?>"><i class="dw dw-eye"></i> View</a>
                                                    <a class="dropdown-item" href="edit-tour.php?editId=<?php echo $tourinfo['tour_id'] ?>"><i class="dw dw-edit2" aria-hidden="true"></i> Edit</a>
                                                    <a href="manage-tour.php?deleteId=<?php echo $tourinfo['tour_id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</a>
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
                HappyHolidayss Pvt(Ltd).</a>
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