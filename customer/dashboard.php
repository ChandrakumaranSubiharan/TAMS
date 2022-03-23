<?php
// Include necessary file
include_once '../includes/dbconfig.php';


// Check if user is not logged in
if (!$auth->is_logged_in()) {
	$auth->redirect('../login.php');
}


try {
	// Define query to select values from the partner table
	$sql = "SELECT * FROM tbl_customer WHERE customer_id=:customer_id";

	// Prepare the statement
	$query = $DB_con->prepare($sql);

	// Bind the parameters
	$query->bindParam(':customer_id', $_SESSION['user_session']);

	// Execute the query
	$query->execute();

	// Return row as an array indexed by both column name
	$returned_row = $query->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	array_push($errors, $e->getMessage());
}

if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
	$auth->log_out();
	$auth->redirect('../login.php');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<span class="user-name"><?= $returned_row['username']; ?></span>

<a class="dropdown-item" href="?logout=true"><i class="dw dw-logout"></i> Log Out</a>

	
</body>
</html>