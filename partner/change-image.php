<?php

// Include database file
include_once '../includes/dbconfig.php';

// Update Record in customer table
if (isset($_POST['submit'])) {

    if (isset($_GET['tourimgid'])) {

        $imgid = intval($_GET['tourimgid']);
        $img = $_FILES['image']['name'];

        $updateimg = $tour->updateimg($imgid, $img);

        if ($updateimg) {

            $msg = "<div class='alert alert-info'>
            <strong>WOW!</strong> Image was updated successfully!
            </div>";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            $tourdata = $tour->displyaImgById($imgid);
        } else {
            $msg = "Failed to Update Tour Image ";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    } else {

        $imgid = intval($_GET['homeimgid']);
        $img = $_FILES['image']['name'];

        $updateimg = $home->updateimg($imgid, $img);

        if ($updateimg) {

            $msg = "<div class='alert alert-info'>
        <strong>WOW!</strong> Image was updated successfully!
        </div>";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            $tourdata = $tour->displyaImgById($imgid);
        } else {
            $msg = "Failed to Update Tour Image ";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    }
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
            <div class="min-height-100px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Change Image</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Manage Service</a></li>
                                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Change Image</li>
                                </ol>
                            </nav>
                            <div class="container">
                                <?php
                                if (isset($msg)) {
                                    echo $msg;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <form class="form-horizontal spaced" name="package" method="post" enctype="multipart/form-data">
                <?php
                if (isset($_GET['tourimgid'])) {

                    $imgid = intval($_GET['tourimgid']);
                    $tourdata = $tour->displyaImgById($imgid);

                ?>
                    <div class="form-group">
                        <h5 for="focusedinput" class="col-sm-2 control-label spaced"> Tour Image </h5>
                        <div class="col-sm-8">
                            <img src="includes/uploads/<?php echo $tourdata['image'] ?>" width="400">
                        </div>
                    </div>

                    <div class="form-group">
                        <h6 for="focusedinput" class="col-sm-2 control-label spaced2">New Image</h6>
                        <div class="col-sm-8">
                            <input type="file" name="image" id="image" required>
                        </div>
                    </div>

                <?php
                } else {

                    $imgid = intval($_GET['homeimgid']);
                    $homedata = $home->displyaImgById($imgid);
                ?>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label"> Home Image </label>
                        <div class="col-sm-8">
                            <img src="includes/uploads/<?php echo $homedata['cover_img1'] ?>" width="300">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                        <div class="col-sm-8">
                            <input type="file" name="image" id="image" required>
                        </div>
                    </div>
                <?php
                }
                ?>
                    <div class="col-sm-8 col-sm-offset-2">
                        <button type="submit" name="submit" class="btn-primary btn">Update</button>

                    </div>
        </div>

        </form>

        <div class="footer-wrap pd-20 mb-20 card-box">
            HappyHolidayss Pvt(Ltd).</a>
        </div>
    </div>
    </div>

    </div>

    <?php include('includes/scripts.php'); ?>

</body>

</html>