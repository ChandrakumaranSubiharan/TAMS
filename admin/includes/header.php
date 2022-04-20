<?php
// Include necessary file
include_once '../includes/dbconfig.php';


// Check if user is not logged in
if (!$auth->is_logged_in()) {
	$auth->redirect('admin-login.php');
}


try {
	// Define query to select values from the admin table
	$sql = "SELECT * FROM tbl_admin WHERE admin_id=:admin_id";

	// Prepare the statement
	$query = $DB_con->prepare($sql);

	// Bind the parameters
	$query->bindParam(':admin_id', $_SESSION['user_session']);

	// Execute the query
	$query->execute();

	// Return row as an array indexed by both column name
	$returned_row = $query->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	array_push($errors, $e->getMessage());
}

if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
	$auth->log_out();
	$auth->redirect('admin-login.php');
}

?>
    
	
	
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

    <div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="../assets/dashboard/vendors/images/user.png" alt="">
						</span>
						<span class="user-name"><?= $returned_row['username']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.php"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="?logout=true"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>