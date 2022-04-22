<?php
// Include database file
include_once '../includes/dbconfig.php';


// display record
if (isset($_GET['viewId']) && !empty($_GET['viewId'])) {
    $viewId = $_GET['viewId'];
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
                                <h4><?php if ($viewId == 1) {
                                        echo "Earning Reports";
                                    } elseif ($viewId == 2) {
                                        echo "Services Reports";
                                    } ?></h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>




                <?php
                // Insert Record in home table
                if (isset($_POST['submit'])) {

                    $pid = $returned_row['partner_id'];
                    $Rtype = $_POST['ReportType'];
                    $SDate = $_POST['Sdate'];
                    $EDate = $_POST['Edate'];

                    $ReportView = $reports->EarningReport($Rtype, $SDate, $EDate, $pid);
                }
                ?>

                <!-- Form grid Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Filter</h4>
                        </div>
                    </div>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="custom-select2 form-control" name="ReportType" style=" height: 38px;">
                                        <?php if (isset($_POST['submit'])) {
                                        ?>
                                            <option value="<?php if (isset($_POST['submit'])) {
                                                                echo $Rtype;
                                                            }; ?>" <?php if (isset($_POST['submit'])) {
                                                                        echo 'selected="selected"';
                                                                    }; ?>>
                                                <?php if (isset($_POST['submit']) && $Rtype == 1) {
                                                    echo 'Earning Report : Selected';
                                                } elseif ($Rtype == 2) {
                                                    echo 'Tour Services Earnings Report : Selected';
                                                } elseif ($Rtype == 3) {
                                                    echo 'HomeStay Services Earnings Report : Selected';
                                                } elseif ($Rtype == 4) {
                                                    echo 'Earnings Greaterthan 15K Report : Selected';
                                                } elseif ($Rtype == 5) {
                                                    echo 'Earnings Lowerthan 15K Report : Selected';
                                                } elseif ($Rtype == 6) {
                                                    echo 'Profit Percentage Greaterthan 85% Report : Selected';
                                                } elseif ($Rtype == 7) {
                                                    echo 'Profit Percentage Lowerthan 85% Report : Selected';
                                                }; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>

                                        <option value="1">Earning Report</option>
                                        <option value="2">Tour Services Earnings Report</option>
                                        <option value="3">HomeStay Services Earnings Report</option>
                                        <option value="4">Earnings Greaterthan 15K Report</option>
                                        <option value="5">Earnings Lowerthan 15K Report</option>

                                        <option value="6">Profit Percentage Greaterthan 85% Report</option>
                                        <option value="7">Profit Percentage Lowerthan 85% Report</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Date From</label>
                                    <input class="form-control" placeholder="Select Date" name="Sdate" type="date" value="<?php if (isset($_POST['submit'])) {
                                                                                                                                echo $SDate;
                                                                                                                            }; ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Date To</label>
                                    <input class="form-control" placeholder="Select Date" name="Edate" type="date" value="<?php if (isset($_POST['submit'])) {
                                                                                                                                echo $EDate;
                                                                                                                            }; ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="btn-list" style="display: flex; padding-top: 20px;">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">FILTER</button>
                                    <button type="submit" class="btn btn-success">PRINT</button>
                                </div>
                            </div>
                        </div>

                </div>



                </form>
            </div>



            <!-- multiple select row Datatable start -->
            <div class="card-box mb-30">





                <!-- <div class="pd-20">
                    <h4 class="text-blue h4">Earning Report</h4>
                </div> -->

                <div class="row pd-20">
                    <style>
                        #sys_logo {
                            object-fit: cover;
                            object-position: center center;
                            width: 10em;
                            height: 4em;
                        }
                    </style>
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <img src="../assets/images/logo.svg" class="img-circle" id="sys_logo" alt="System Logo">
                    </div>
                    <div class="col-8">
                        <h4 class="text-center"> HappyHolidayss Travel & Accommodation Marketplace </h4>
                        <h3 class="text-center">Date-wise Earning Report</h3>
                        <h5 class="text-center">as of</h5>
                        <h5 class="text-center">November 30, 2021 - April 23, 2022</h5>
                    </div>
                    <div class="col-2"></div>
                </div>











                <div class="pb-20">
                    <table class="data-table table hover multiple-select-row nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Earning Id</th>
                                <th>Booking Id</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Full Amount</th>
                                <th>Income</th>
                                <th>Income <br> Percentage%</th>
                                <th>Status</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['submit'])) {

                                $Reportdata = $reports->EarningReport($Rtype, $SDate, $EDate, $pid);
                                if ($Reportdata) {

                                    foreach ($Reportdata as $Reportdatas) {
                            ?>
                                        <tr>
                                            <td><?php echo $Reportdatas['earning_id']; ?></td>
                                            <td><?php echo $Reportdatas['booking_id']; ?></td>
                                            <td><?php echo $Reportdatas['first_name'], ' ', $Reportdatas['last_name']; ?></td>
                                            <td><?php echo $Reportdatas['service_type']; ?></td>
                                            <td><?php echo $Reportdatas['total_amount']; ?> LKR</td>
                                            <td><?php echo $Reportdatas['payout']; ?> LKR</td>
                                            <?php $incomePercent = 100 - $Reportdatas['profit_percentage']   ?>
                                            <td><?php echo $incomePercent ?> %</td>
                                            <td><?php if ($Reportdatas['payment_status'] == 1) {
                                                    echo "<span style='color: green;'>Received</span>";
                                                } elseif ($Reportdatas['payment_status'] >= 2) {
                                                    echo "<span style='color: blue;'>Refunded</span>";
                                                } else {
                                                    echo "<span style='color: red;'>Proccessing</span>";
                                                }
                                                ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item" href="earning-view-model.php?viewId=<?php echo $Reportdatas['earning_id'] ?>"><i class="dw dw-eye"></i> View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <td colspan="9" style="text-align: center;">No Records Found.</td>
                            <?php

                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- multiple select row Datatable End -->


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