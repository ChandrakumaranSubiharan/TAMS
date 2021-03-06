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
		<div class="pd-ltr-20">
			<div class="dashfirst">
				<div class="card-box1 pd-20 height-100-p mb-30 col-xl-9">
					<div class="row align-items-center">
						<div class="col-md-4">
							<img src="../assets/dashboard/vendors/images/banner-img.png" alt="">
						</div>
						<div class="col-md-8">
							<h4 class="font-20 weight-500 mb-10 text-capitalize">
								Welcome back <div class="weight-600 font-30 text-blue"><?= $returned_row['first_name']; ?> <?= $returned_row['last_name']; ?> </div>
							</h4>
							<h6 class="font-18 max-width-600">Use our performance dashboard to make strategic decisions. With more control over your info at a glance, it???s easier to meet your goals.</h6>
						</div>
					</div>

				</div>
				<div class="col-xl-3 mb-20 dashcol">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<?php
							$pid =  $returned_row['partner_id'];
							$TotalTourBookingCount = $booking->PartnerTotTourBookingCount($pid);
							?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $TotalTourBookingCount; ?></div>
								<div class="font-14 text-secondary weight-500">Total Tour Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><span class="icon-copy dw dw-pin"></span></div>
							</div>
						</div>
					</div>

					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<?php
							$pid =  $returned_row['partner_id'];
							$TotalHomeBookingCount = $booking->PartnerTotHomeBookingCount($pid);
							?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $TotalHomeBookingCount; ?></div>
								<div class="font-14 text-secondary weight-500">Total Home Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><span class="icon-copy dw dw-house"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<?php
							$pid =  $returned_row['partner_id'];
							$ActiveHomeCount = $home->PartnerGetHomeCount($pid);
							?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $ActiveHomeCount; ?></div>
								<div class="font-14 text-secondary weight-500">Active Homes</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><span class="icon-copy dw dw-house1"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<?php
							$pid =  $returned_row['partner_id'];
							$ActiveTourCount = $tour->PartnerGetTourCount($pid);
							?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $ActiveTourCount; ?></div>
								<div class="font-14 text-secondary weight-500">Active Tours</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy dw dw-sun-umbrella" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<?php
								$TotalEarningAmount = $earning->TotEarAmount($pid);
								if ($TotalEarningAmount) {
									foreach ($TotalEarningAmount as $TotalEarning) {
								?>
										<div class="weight-700 font-24 text-dark"><?= $TotalEarning['SUM(tbl_earning.payout)']; ?> LKR</div>
								<?php
									}
								}
								?>
								<div class="font-14 text-secondary weight-500">Total Earning</div>
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
							<?php
								$TotalPayoutAmount = $earning->TotPayoutAmount($pid);
								if ($TotalPayoutAmount) {
									foreach ($TotalPayoutAmount as $TotalPayout) {
								?>
										<div class="weight-700 font-24 text-dark"><?= $TotalPayout['SUM(tbl_earning.net_amount)']; ?> LKR</div>
								<?php
									}
								}
								?>
								<div class="font-14 text-secondary weight-500">Total Payout</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-file-11"></i></div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<?php
							$pid =  $returned_row['partner_id'];
							$UnConfirmedBookingCount = $booking->PartnerGetUnConfirmedBookingCount($pid);
							?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $UnConfirmedBookingCount; ?></div>
								<div class="font-14 text-secondary weight-500">UnConfirmed Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><span class="icon-copy dw dw-edit-file"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<?php
							$pid =  $returned_row['partner_id'];
							$ConfirmedBookingCount = $booking->PartnerGetConfirmedBookingCount($pid);
							?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $ConfirmedBookingCount; ?></div>
								<div class="font-14 text-secondary weight-500">Confirmed Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy dw dw-add-file1" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<?php
							$pid =  $returned_row['partner_id'];
							$CompletedBookingCount = $booking->PartnerGetCompletedBookingCount($pid);
							?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $CompletedBookingCount; ?></div>
								<div class="font-14 text-secondary weight-500">Completed Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy dw dw-file-31" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<?php
							$pid =  $returned_row['partner_id'];
							$RefundedBookingCount = $booking->PartnerGetRefundedBookingCount($pid);
							?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $RefundedBookingCount; ?></div>
								<div class="font-14 text-secondary weight-500">Refunded Bookings</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy dw dw-undo1"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

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
								<th scope="col">Customer Name</th>
								<th scope="col">Service Type</th>
								<th scope="col">Service Name</th>
								<th scope="col">Total Amount</th>
								<th scope="col">Status</th>
								<th scope="col">Payment Status</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$pid = $returned_row['partner_id'];
							$viewId = 3;


							$StatusProgressAutoUpdate = $booking->UpdateBookingStatusProgressByDate();
							$StatusCompleteAutoUpdate = $booking->UpdateBookingStatusCompletedByDate();
							$bookingdata = $booking->displayBookingByPartner($pid, $viewId);

							if ($bookingdata) {
								foreach ($bookingdata as $bookings) {
							?>
									<tr>
										<td><?php echo $bookings['booking_id']; ?></td>
										<td><?php echo $bookings['first_name']; ?> <?php echo $bookings['last_name']; ?></td>
										<td><?php echo $bookings['service_type']; ?></td>
										<td><?php echo $bookings['service_name']; ?></td>
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

										</td>
									</tr>

								<?php

								}
							} else {
								?>

								<td colspan="12" style="padding-left: 400px;">No Bookings Found.</td>


							<?php

							}
							?>

						</tbody>
					</table>
				</div>
			</div>
			<!-- Responsive tables End -->

			<div class="footer-wrap pd-20 mb-20 card-box">
				HappyHolidayss By <a href="#">Subiharan Chandrakumaran</a>
			</div>
		</div>
	</div>

	<?php include('includes/scripts.php'); ?>

</body>

</html>