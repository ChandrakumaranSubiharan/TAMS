<?php
// Include database file
include_once '../includes/dbconfig.php';

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
                                <h4>Earnings</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Earnings</li>
                                </ol>
                            </nav>
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
                                    <th>Customer</th>
                                    <th>Service</th>
                                    <th>Full Amount (LKR)</th>
                                    <th>Income (LKR)</th>
                                    <th>Payout Percentage %</th>
                                    <th>Payout (LKR)</th>
                                    <th>Status</th>
                                    <th class="datatable-nosort">Action</th>

                                    <!-- hidden -->
                                    <th hidden>Customer Contact</th>
                                    <th hidden>Customer Email</th>
                                    <th hidden>Service Name</th>
                                    <th hidden>Card Holder Name</th>
                                    <th hidden>Card Number</th>
                                    <th hidden>Payment Card Type</th>
                                    <th hidden>Earning Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pid = $returned_row['partner_id'];
                                $earningdata = $earning->displayEarningByPartner($pid);
                                foreach ($earningdata as $earnings) {
                                ?>
                                    <tr>
                                        <td><?php echo $earnings['earning_id']; ?></td>
                                        <td><?php echo $earnings['first_name'], ' ', $earnings['last_name']; ?></td>
                                        <td><?php echo $earnings['service_type']; ?></td>
                                        <td><?php echo $earnings['total_amount']; ?></td>
                                        <td><?php echo $earnings['payout']; ?> LKR</td>
                                        <td><?php echo $earnings['profit_percentage']; ?> %</td>
                                        <td><?php echo $earnings['net_amount']; ?> LKR</td>
                                        <td><?php if ($earnings['payment_status'] == 0) {
                                                echo "<span style='color: red;'>Not Paid</span>";
                                            } elseif ($earnings['payment_status'] == 1) {
                                                echo "<span style='color: green;'>Paid</span>";
                                            } else {
                                                echo "Payment Failed";
                                            } ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="earning-view-model.php?viewId=<?php echo $earnings['earning_id'] ?>"><i class="dw dw-eye"></i> View</a>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- hidden -->
                                        <td hidden><?php echo $earnings['contact_number']; ?> </td>
                                        <td hidden><?php echo $earnings['email_address']; ?> </td>
                                        <td hidden><?php echo $earnings['service_name']; ?> </td>
                                        <td hidden><?php echo $earnings['payment_card_holder_name']; ?> </td>
                                        <td hidden><?php echo $earnings['payment_card_number']; ?> </td>
                                        <td hidden><?php echo $earnings['cus_payment_card_type']; ?> </td>
                                        <td hidden><?php echo date('jS F, Y ', strtotime($earnings['created_date'])); ?></td>


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