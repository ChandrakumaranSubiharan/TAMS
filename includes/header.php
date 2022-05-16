<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMS | HappyHolidayss</title>
    <meta name="keywords" content="happyholidayss" />
    <meta name="description" content="HappyHolidayss | Accomodations & Tours">
    <meta name="author" content="Subiharan">

    <!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/dashboard/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/dashboard/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/dashboard/vendors/images/favicon-16x16.png">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="assets/components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/components/flexslider/flexslider.css" media="screen" />

    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="assets/css/components/header.css">
    <link id="main-style" rel="stylesheet" href="assets/css/style.css">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css">


    <!-- sweetalert cdn's -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>

<body>
    <?php
    // Include necessary file
    include_once 'dbconfig.php';

    // If customer click logout button system will destroy the session with this code
    if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
        $auth->log_out();
        $auth->redirect('index.php');
    }
    ?>

    <!-- Check if user is not logged in -->
    <?php if (!$auth->is_logged_in()) { ?>

        <header id="header" class="navbar-static-top">
            <div class="topnav hidden-xs">
                <div class="container">
                    <ul class="quick-menu pull-right">
                        <li><a href="login.php" class="#">LOGIN</a></li>
                        <li><a href="signup.php" class="#">SIGNUP</a></li>
                        <li><a href="become-partner.php">BECOME A PARTNER</a></li>
                    </ul>
                    <ul class="quick-menu pull-left">
                        <li><a href="#travelo-login" class="soap-popupbox">Phone: +(094) 125-4985-214</a></li>
                        <li><a href="#travelo-signup" class="soap-popupbox">Email: info@happyholidayss.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-header">

                <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
                    Mobile Menu Toggle
                </a>

                <div class="container">
                    <h1 class=" logo-header navbar-brand">
                        <a href="index.php" title="HappyHolidayss - home">
                            <img src="assets/images/logo.svg" alt="HappyHolidayss_Logo" />
                        </a>
                    </h1>

                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                            <li class="menu-item-has-children">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="listed-tours.php">Tours</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="listed-homes.php">Stays</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="about-us.php">About Us</a>
                            </li>
                            <li class="menu-item-has-children megamenu-menu">
                                <a href="contact-us.php">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Tours</a>
                        </li>
                        <li>
                            <a href="#">Stays</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>

                    <ul class="mobile-topnav container">
                        <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
                        <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
                        <li><a href="#travelo-signup">BECOME A PARTNER</a></li>
                    </ul>
                </nav>
            </div>
        </header>

    <?php } else { ?>

        <?php
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
        ?>

        <header id="header" class="navbar-static-top">
            <div class="topnav hidden-xs">
                <div class="container">
                    <ul class="quick-menu pull-right">
                        <li><a href="#" class="#">Welcome ! <?= $returned_row['username']; ?></a></li>
                        <li><a href="customer-dashboard.php">dashboard</a></li>
                        <li><a href="?logout=true">Log Out</a></li>
                    </ul>
                    <ul class="quick-menu pull-left">
                        <li><a href="#travelo-login" class="soap-popupbox">Phone: +(094) 125-4985-214</a></li>
                        <li><a href="#travelo-signup" class="soap-popupbox">Email: info@happyholidayss.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-header">

                <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
                    Mobile Menu Toggle
                </a>

                <div class="container">
                    <h1 class=" logo-header navbar-brand">
                        <a href="index.html" title="HappyHolidayss - home">
                            <img src="assets/images/logo.svg" alt="HappyHolidayss_Logo" />
                        </a>
                    </h1>

                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                            <li class="menu-item-has-children">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="listed-tours.php">Tours</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="listed-homes.php">Stays</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="about-us.php">About Us</a>
                            </li>
                            <li class="menu-item-has-children megamenu-menu">
                                <a href="contact-us.php">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Tours</a>
                        </li>
                        <li>
                            <a href="#">Stays</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>

                    <ul class="mobile-topnav container">
                        <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
                        <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
                        <li><a href="#travelo-signup">BECOME A PARTNER</a></li>
                    </ul>
                </nav>
            </div>
        </header>




    <?php } ?>
</body>

</html>