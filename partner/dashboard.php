<?php
// Include necessary file
include_once '../includes/dbconfig.php';


// Check if user is not logged in
// if (!$auth->is_logged_in()) {
// 	$auth->redirect('partner-login.php');
// }


// try {
	// Define query to select values from the partner table
	// $sql = "SELECT * FROM tbl_partner WHERE partner_id=:partner_id";

	// Prepare the statement
	// $query = $DB_con->prepare($sql);

	// Bind the parameters
	// $query->bindParam(':partner_id', $_SESSION['user_session']);

	// Execute the query
	// $query->execute();

	// Return row as an array indexed by both column name
	// $returned_row = $query->fetch(PDO::FETCH_ASSOC);
// } catch (PDOException $e) {
	// array_push($errors, $e->getMessage());
// }

if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
	$auth->log_out();
	$auth->redirect('partner-login.php');
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
<?php include('includes/header.php');?>
<?php include('includes/navigation.php');?>

<div class="mobile-menu-overlay"></div>


<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="../assets/dashboard/vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">Sanju !</div>
						</h4>
						<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">2020</div>
								<div class="weight-600 font-14">Contact</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">400</div>
								<div class="weight-600 font-14">Deals</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">350</div>
								<div class="weight-600 font-14">Campaign</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">$6060</div>
								<div class="weight-600 font-14">Worth</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				HappyHolidayss By <a href="https://github.com/dropways" target="_blank">Subiharan Chandrakumaran</a>
			</div>
		</div>
	</div>

<?php include('includes/scripts.php');?>

</body>
</html>



