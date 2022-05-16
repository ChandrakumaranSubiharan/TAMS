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
                                $earningdata = $earning->displyaAllRecord();
                                $TotalIncome = 0;

                                if ($earningdata) {
                                    foreach ($earningdata as $earnings) {
                                ?>
                                        <tr>
                                            <td><?php echo $earnings['earning_id']; ?></td>
                                            <td><?php echo $earnings['booking_id']; ?></td>
                                            <td><?php echo $earnings['first_name'], ' ', $earnings['last_name']; ?></td>
                                            <td><?php echo $earnings['service_type']; ?></td>
                                            <td><?php echo $earnings['total_amount']; ?> LKR</td>
                                            <td><?php echo $earnings['net_amount']; ?> LKR</td>
                                            <td><?php echo $earnings['profit_percentage']; ?> %</td>
                                            <td><?php if ($earnings['payment_status'] == 1) {
                                                    echo "<span style='color: green;'>Received</span>";
                                                } elseif ($earnings['payment_status'] >= 2) {
                                                    echo "<span style='color: blue;'>Refunded</span>";
                                                } else {
                                                    echo "<span style='color: red;'>Proccessing</span>";
                                                }
                                                ?></td>
                                            <?php
                                            if ($earnings) {
                                                $TotalIncome += $earnings['net_amount'];
                                            }
                                            ?>
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
                                        </tr>
                                    <?php }
                                    ?>
                                    <tr>
                                        <td colspan="10" style="text-align: center; font-weight: bold;">
                                            <h4> <span style="color: green;">Total Income</span> : LKR
                                                <?php echo $TotalIncome ?>
                                            </h4>
                                        </td>
                                    </tr>
                                <?php
                                } else {
                                ?>
                                    <td colspan="9" style="text-align: center;">No Records Found.</td>
                                <?php
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Export Datatable End -->
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                HappyHolidayss By <a href="#">Chandrakumaran Subiharan</a>
            </div>
        </div>
    </div>

    </div>

    <?php include('includes/scripts.php'); ?>

</body>

</html>