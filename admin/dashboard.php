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
		<div class="pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">HappyHolidayss Overview</h2>
			</div>

			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">50000 LKR</div>
								<div class="font-14 text-secondary weight-500">Earnings</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">2</div>
								<div class="font-14 text-secondary weight-500">Completed Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-file-31"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">0</div>
								<div class="font-14 text-secondary weight-500">Refunded Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><span class="icon-copy dw dw-undo1"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">1</div>
								<div class="font-14 text-secondary weight-500">Inprogress Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy dw dw-counterclockwise" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>

			</div>


			<div class="row pb-10 d-flex">
				<div style="display:grid; margin:0 ; padding:0;" class="col-md-3">
					<div class="col-md-12 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">6</div>
									<div class="font-14 text-secondary weight-500">Unverified Partners</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-human-resources" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">7</div>
									<div class="font-14 text-secondary weight-500">Unverified Reviews</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-question-1"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div style="display:grid; margin:0 ; padding:0;" class="col-md-3">
					<div class="col-md-12 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">5</div>
									<div class="font-14 text-secondary weight-500">Pending Enquiries</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-file-121" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">5</div>
									<div class="font-14 text-secondary weight-500">Active Customers</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf"><i class="icon-copy fi-torsos-all"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div style="display:grid; margin:0 ; padding:0;" class="col-md-3">
					<div class="col-md-12 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">4</div>
									<div class="font-14 text-secondary weight-500">Active Homes</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-house" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">4</div>
									<div class="font-14 text-secondary weight-500">Active Tours</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-sun-umbrella"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div style="display:grid; margin:0 ; padding:0;" class="col-md-3">
					<div class="col-md-12 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">2</div>
									<div class="font-14 text-secondary weight-500">Active Partners</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-deal" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">75</div>
									<div class="font-14 text-secondary weight-500">Cancelled Bookings</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-file-21"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="row pb-10">
				<div class="col-md-6 mb-20">

					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Top 5 Partners</div>
						</div>
						<div class="user-list">
							<?php
							$TopPartners = $booking->GetTopPartners();
							if ($TopPartners) {
								foreach ($TopPartners as $Top5Partner) {
							?>
									<ul>
										<li class="d-flex align-items-center justify-content-between">
											<div class="name-avatar d-flex align-items-center pr-2">
												<div class="avatar mr-2 flex-shrink-0">
													<img src="../assets/images/user.png" class="border-radius-100 box-shadow" width="50" height="50" alt="">
												</div>
												<div class="txt">
													<div class="font-14 weight-600"><?= $Top5Partner['username']; ?></div>
													<div class="font-12 weight-500" data-color="#b2b1b6">Helped to Make <span style="font-weight: 700; color:#09cc06"> <?= $Top5Partner['COUNT(DISTINCT tbl_booking.booking_id)']; ?> </span> Bookings & Paid <span style="font-weight: 700; color:#09cc06"> <?= $Top5Partner['SUM(tbl_earning.net_amount)']; ?> (LKR) </span></div>
												</div>
											</div>
											<div class="cta flex-shrink-0">
												<a href="#" class="btn btn-sm btn-outline-primary">View</a>
											</div>
										</li>
									</ul>
							<?php

								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Top 5 Customers</div>
						</div>
						<div class="user-list">
							<?php
							$TopCustomer = $booking->GetTopCustomer();
							if ($TopCustomer) {
								foreach ($TopCustomer as $Top5Customer) {

							?>
									<ul>
										<li class="d-flex align-items-center justify-content-between">
											<div class="name-avatar d-flex align-items-center pr-2">
												<div class="avatar mr-2 flex-shrink-0">
													<img src="../assets/images/user.png" class="border-radius-100 box-shadow" width="50" height="50" alt="">
												</div>
												<div class="txt">
													<div class="font-14 weight-600"><?= $Top5Customer['first_name']; ?> <?= $Top5Customer['last_name']; ?> </div>
													<div class="font-12 weight-500" data-color="#b2b1b6">Made <span style="font-weight: 700; color:#09cc06"> <?= $Top5Customer['COUNT(DISTINCT tbl_booking.booking_id)']; ?> </span>Booking & Total Booking Amount Is <span style="font-weight: 700; color:#09cc06">  <?= $Top5Customer['SUM(tbl_booking.total_amount)']; ?> (LKR) </span></div>
												</div>
											</div>
											<div class="cta flex-shrink-0">
												<div class="table-actions">
													<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-eye"></i></a>
												</div>
											</div>
										</li>
									</ul>
							<?php

								}
							}
							?>
						</div>
					</div>
				</div>
			</div>



			<div class="row pb-10">
				<div class="col-md-12">
					<!-- Responsive tables Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Recent Bookings</h4>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Customer</th>
										<th scope="col">Service</th>
										<th scope="col">Type</th>
										<th scope="col">Amount</th>
										<th scope="col">Status</th>
										<th scope="col">Payment</th>
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$bookingdata = $booking->displayBookingForAdmin();

									if ($bookingdata) {
										foreach ($bookingdata as $bookings) {
									?>
											<tr>
												<td><?php echo $bookings['booking_id']; ?></td>
												<td><?php echo $bookings['first_name']; ?> <?php echo $bookings['last_name']; ?></td>
												<td><?php echo $bookings['service_name']; ?></td>
												<td><?php echo $bookings['service_type']; ?></td>
												<td>LKR <?php echo $bookings['total_amount']; ?></td>
												<td><?php if ($bookings['status'] == 0) {
														echo "<span style='color: teal;'>Not Confirmed</span>";
													} elseif ($bookings['status'] == 1) {
														echo "<span style='color: firebrick;'>Cancelled</span>";
													} elseif ($bookings['status'] == 2) {
														echo "<span style='color: green;'>Confirmed</span>";
													} elseif ($bookings['status'] == 3) {
														echo "<span style='color: red;'>Cancelled by You</span>";
													} elseif ($bookings['status'] == 4) {
														echo "<span style='color: green;'>Completed</span>";
													} elseif ($bookings['status'] == 5) {
														echo "<span style='color: blue;'>Inprogress</span>";
													} else {
														echo "Booking Failed";
													} ?></td>
												<td><?php if ($bookings['payment_status'] == 1) {
														echo "<span style='color: green;'>Paid</span>";
													} elseif ($bookings['payment_status'] >= 2) {
														echo "<span style='color: blue;'>Refunded</span>";
													} else {
														echo "<span style='color: red;'>Not Paid</span>";
													}
													?></td>
												<td>
													<div class="dropdown">
														<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
															<i class="dw dw-more"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
															<a class="dropdown-item" href="booking-view-model.php?viewId=<?php echo $bookings['booking_id'] ?>"><i class="dw dw-eye"></i> View</a>
														</div>
													</div>
												<?php

											}
										} else {
												?>

												<td colspan="12" style="padding-left: 400px;">No Bookings Found.</td>
											<?php

										}
											?>

											</td>
											</tr>

								</tbody>
							</table>
						</div>
					</div>
					<!-- Responsive tables End -->

				</div>

			</div>




			<div class="footer-wrap pd-20 mb-20 card-box">
				HappyHolidayss By <a href="https://github.com/dropways" target="_blank">Subiharan Chandrakumaran</a>
			</div>
		</div>
	</div>

	<?php include('includes/scripts.php'); ?>
	<script src="../assets/dashboard/vendors/scripts/dashboard3.js"></script>

</body>

</html>