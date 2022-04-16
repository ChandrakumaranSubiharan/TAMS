<?php
// Include database file
include_once '../includes/dbconfig.php';


if (isset($_GET['confirmId']) && !empty($_GET['confirmId'])) {
    $editId = $_GET['confirmId'];
    $CurrentStatus = $_GET['status'];

    if ($CurrentStatus == 0) {
        $bookingdataconfirm = $booking->updatestatusConfirm($editId);
        $msg = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Booking Confirmed Successfully
      </div>";

    } elseif ($CurrentStatus == 1) {
        $bookingdatacancel = $booking->updatestatusCancel($editId);
        $msg = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        Booking Cancelled Successfully
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
                                <h4>Manage Bookings </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage booking</li>
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
                                    <th>Customer Name</th>
                                    <th>Service Type</th>
                                    <th>Service Name</th>
                                    <th>Total Amount (LKR)</th>
                                    <th>Status</th>
                                    <th class="datatable-nosort">Action</th>

                                    <!-- hidden -->
                                    <th hidden>Customer Contact</th>
                                    <th hidden>Customer Email</th>
                                    <th hidden>Payment Status</th>
                                    <th hidden>Payment Card Type</th>
                                    <th hidden>Card Number</th>
                                    <th hidden>Card Holder Name</th>
                                    <th hidden>Booking Start Date</th>
                                    <th hidden>Booking End Date</th>
                                    <th hidden>Booking Income Amount</th>
                                    <th hidden>Total Nights</th>
                                    <th hidden>Total Persons</th>
                                    <th hidden>Adult Count</th>
                                    <th hidden>Kid Count</th>
                                    <th style="color: firebrick;" hidden>Booking Created Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pid = $returned_row['partner_id'];
                                $bookingdata = $booking->displayBookingByPartner($pid);
                                foreach ($bookingdata as $bookings) {
                                ?>
                                    <tr>
                                        <td><?php echo $bookings['booking_id']; ?></td>
                                        <td><?php echo $bookings['first_name'], ' ', $bookings['last_name']; ?></td>
                                        <td><?php echo $bookings['service_type']; ?></td>
                                        <td><?php echo $bookings['service_name']; ?></td>
                                        <td><?php echo $bookings['total_amount']; ?> LKR</td>
                                        <td><?php if ($bookings['status'] == 0) {
                                                echo "<span style='color: teal;'>Not Confirmed</span>";
                                            } elseif ($bookings['status'] == 1) {
                                                echo "<span style='color: firebrick;'>Cancelled</span>";
                                            } elseif ($bookings['status'] == 2) {
                                                echo "<span style='color: green;'>Confirmed</span>";
                                            } elseif ($bookings['status'] == 3) {
                                                echo "<span style='color: red;'>Cancelled by Customer</span>";
                                            } else {
                                                echo "Booking Failed";
                                            } ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="booking-view-model.php?viewId=<?php echo $bookings['booking_id'] ?>"><i class="dw dw-eye"></i> View</a>
                                                    <?php
                                                    if ($bookings['status'] <= 0) {
                                                    ?>
                                                        <a class="dropdown-item" href="?confirmId=<?php echo $bookings['booking_id'] ?>&status=0"><i style="color:green" class="icon-copy ion-checkmark-circled"></i> Confirm Booking</a>
                                                        <a class="dropdown-item" href="?confirmId=<?php echo $bookings['booking_id'] ?>&status=1"><i style="color:red" class="icon-copy ion-close-circled"></i> Cancel Booking</a>
                                                    <?php
                                                    } elseif ($bookings['status'] == 1) {
                                                    ?>
                                                        <a class="dropdown-item" href="?confirmId=<?php echo $bookings['booking_id'] ?>&status=0"><i style="color:green" class="icon-copy ion-checkmark-circled"></i> Confirm Booking</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- hidden -->
                                        <td hidden><?php echo $bookings['contact_number']; ?> </td>
                                        <td hidden><?php echo $bookings['email_address']; ?> </td>
                                        <td hidden><?php if ($bookings['payment_status'] == 1) {
                                                        echo "Paid";
                                                    } else {
                                                        echo "Not Paid";
                                                    }
                                                    ?> </td>
                                        <td hidden><?php echo $bookings['cus_payment_card_type']; ?> </td>
                                        <td hidden><?php echo $bookings['payment_card_number']; ?> </td>
                                        <td hidden><?php echo $bookings['payment_card_holder_name']; ?> </td>
                                        <td hidden><?php echo date('jS F, Y ', strtotime($bookings['start_date'])); ?> </td>
                                        <td hidden><?php echo date('jS F, Y ', strtotime($bookings['end_date'])); ?> </td>
                                        <td hidden><?php echo $bookings['payout']; ?> LKR </td>
                                        <td hidden><?php echo $bookings['total_nights']; ?> </td>
                                        <td hidden><?php echo $bookings['total_persons']; ?> </td>
                                        <td hidden><?php echo $bookings['total_adults']; ?> </td>
                                        <td hidden><?php echo $bookings['total_kids']; ?> </td>
                                        <td hidden><?php echo date('jS F, Y ', strtotime($bookings['created_date'])); ?></td>


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

    </div>

    <?php include('includes/scripts.php'); ?>

</body>

</html>