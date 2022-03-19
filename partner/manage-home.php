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
                                <h4>Manage Homes</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage home</li>
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
                                    <th>Home Name</th>
                                    <th>Location</th>
                                    <th>Ava Start Date</th>
                                    <th>Ava End Date</th>
                                    <th>Avg/Night(LKR)</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Extra people</th>
                                    <th>Province</th>
                                    <th>District</th>
                                    <th>Cancellation</th>
                                    <th>Image</th>
                                    <th>Created Date</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // Include database file

                                $customers = $home->displayData();

                                foreach ($customers as $homes) {

                                ?>
                                    <tr>
                                        <td><?php echo $homes['home_id']; ?></td>
                                        <td><?php echo $homes['home_name']; ?></td>
                                        <td><?php echo $homes['location_address']; ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($homes['ava_start_date'])) ; ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($homes['ava_end_date'])) ; ?></td>
                                        <td><?php echo $homes['ava_night_price']; ?></td>
                                        <td><?php echo $homes['lg_desc']; ?></td>
                                        <td><?php if($homes['status'] == 0){echo "Inactive";} else{echo "Active";} ?></td>
                                        <td><?php echo $homes['home_type']; ?></td>
                                        <td><?php echo $homes['extra_people']; ?></td>
                                        <td><?php echo $homes['province']; ?></td>
                                        <td><?php echo $homes['district']; ?></td>
                                        <td><?php if($homes['cancellation'] == 0){echo "Disabled";} else{echo "Enabled";} ?></td>
                                        <td><img src="<?php echo 'includes/uploads/' . $homes['cover_img1'] ?>" width="150px"></td>
                                        <td><?php echo date('d-M-Y', strtotime($homes['created_date'])) ; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                                <?php if($homes['status'] == 0)
                                                {echo"<a class='dropdown-item' href='#'><i class='dw dw-eye'></i> Active</a>";} 
                                                else
                                                {echo"<a class='dropdown-item' href='#'><i class='dw dw-eye'></i> Deactive</a>";} ?>
                                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
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

    </div>

    <?php include('includes/scripts.php'); ?>

</body>

</html>