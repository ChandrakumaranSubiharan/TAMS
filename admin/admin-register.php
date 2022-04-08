<?php
include_once '../includes/dbconfig.php';

if (isset($_POST['btn-admin-save'])) {
    // Retrieve form input
    $fname = $_POST['afname'];
    $uname = $_POST['auname'];
    $pass = $_POST['apassword'];
    $contact = $_POST['acontact'];
    $staffid = $_POST['astffid'];
    $department = $_POST['adep'];
    $email = $_POST['amail'];
    $category = $_POST['acategory'];


    // Check for empty and invalid inputs
    if (empty($fname)) {
        echo '<script>alert("Please enter a valid First Name")</script>';
    } elseif (empty($staffid)) {
        echo '<script>alert("Please enter a valid Staff ID")</script>';
    } elseif (empty($category)) {
        echo '<script>alert("Please enter a valid User Category")</script>';
    } elseif (empty($uname)) {
        echo '<script>alert("Please enter a valid Username")</script>';
    } elseif (empty($email)) {
        echo '<script>alert("Please enter a valid Email")</script>';
    } elseif (empty($contact)) {
        echo '<script>alert("Please enter a valid Contact No")</script>';
    } elseif (empty($department)) {
        echo '<script>alert("Please Select a valid Department")</script>';
    } elseif (empty($pass)) {
        echo '<script>alert("Please enter a valid Password.")</script>';
    } else {
        // Check if the admin may be registred

        if ($admin->create($fname, $uname, $pass, $contact, $staffid, $department, $email, $category)) {
            header("Location: admin-register.php?success");
        } else {
            header("Location: admin-register.php?failed");
        }
    }
}

?>


<?php
if (isset($_GET['success'])) {
    $msg = "account successfully created.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
} else if (isset($_GET['failed'])) {
    $msg = "Oops !, failed to create account.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>



<form action="" method="post">
    <input type="text" name="afname" class="input-text full-width" placeholder="Enter Full Name">
    <input type="text" name="auname" class="input-text full-width" placeholder="Enter User Name">
    <input type="password" name="apassword" class="input-text full-width" placeholder="Enter New Password">
    <input type="text" name="acontact" class="input-text full-width" placeholder="Enter Contact Number">
    <input type="text" name="astffid" class="input-text full-width" placeholder="Enter Staff ID">
    <input type="text" name="adep" class="input-text full-width" placeholder="Enter Department Name">
    <input type="email" name="amail" class="input-text full-width" placeholder="Enter Email Address">
    <input type="text" name="acategory" class="input-text full-width" placeholder="Select user Category">
    <button type="submit" name="btn-admin-save" class="full-width btn-medium">REGISTER</button>
</form>