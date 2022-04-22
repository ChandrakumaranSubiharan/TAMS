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

                    if ($ReportView) {
                        $msg = "Report Successufully Generated";
                        echo "<script type='text/javascript'>alert('$msg');</script>";
                    } else {
                        $msg = "Report Failed to Generated";
                        echo "<script type='text/javascript'>alert('$msg');</script>";
                    }
                }
                ?>

                <!-- Form grid Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Select Report Type</h4>
                        </div>
                    </div>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="custom-select2 form-control" name="ReportType" style=" height: 38px;">
                                        <option value="1">Recevied Earning Report</option>
                                        <option value="2">Tour Services Earnings Report</option>
                                        <option value="3">HomeStay Services Earnings Report</option>
                                        <option value="4">Earnings Graterthan 15K Report</option>
                                        <option value="5">Earnings Lowerthan 15K Report</option>
                                        <option value="6">Profit Percentage Graterthan 15% Report</option>
                                        <option value="7">Profit Percentage Lowerthan 15% Report</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>From</label>
                                    <input class="form-control" placeholder="Select Date" name="Sdate" type="date" value="<?php if (isset($_POST['submit'])) {
                                                                                                                                echo $SDate;
                                                                                                                            }; ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>To</label>
                                    <input class="form-control" placeholder="Select Date" name="Edate" type="date" value="<?php if (isset($_POST['submit'])) {
                                                                                                                                echo $EDate;
                                                                                                                            }; ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="btn-list">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Generate</button>
                                </div>
                            </div>
                        </div>

                </div>



                </form>
            </div>



            <!-- multiple select row Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Earning Report (Dynamic)</h4>
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
                                <td colspan="12" style="padding-left: 400px;">No Records Found.</td>
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