<?php
// Include database file
include_once 'includes/dbconfig.php';
?>

<!-- retriving from home detailed page via post request -->
<?php
if (isset($_REQUEST['homesubmit'])) {
    $Hdistrict = $_REQUEST["district"];
    $Hsdate = $_REQUEST["sdate"];
    $Hedate = $_REQUEST["edate"];
    $Hcadult = $_REQUEST["cadult"];
    $Hckid = $_REQUEST["ckid"];
    $Hcroom = $_REQUEST["croom"];
    $Hapricerange = $_REQUEST['adultpricerange'];
    $Htype = $_REQUEST['htype'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h3 class="entry-title">Stays Search Results</h3>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOME</a></li>
                <li class="active">Stays Search Results</li>
            </ul>
        </div>
    </div>

    <section id="content">
        <div class="container">
            <div id="main">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <h4 class="search-results-title"><i class="soap-icon-search"></i>Sort results by:</h4>
                        <div class="toggle-container filters-container">

                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <p>Modify Search</p>
                                </h4>
                                <div>
                                    <div class="panel-content">
                                        <form method="post">
                                            <div class="form-group">
                                                <label>Destination</label>
                                                <div class="selector">
                                                    <select name="district" class="full-width">
                                                        <option value="<?php echo $Hdistrict; ?>"><?php echo $Hdistrict; ?></option>
                                                        <option value="Kandy">Kandy</option>
                                                        <option value="Colombo">Colombo</option>
                                                        <option value="Jaffna">Jaffna</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>check in</label>
                                                <div class="datepicker-wrap">
                                                    <input type="date" name="sdate" value="<?php echo $Hsdate; ?>" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>check out</label>
                                                <div class="datepicker-wrap">
                                                    <input type="date" name="edate" value="<?php echo $Hedate; ?>" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Adults</label>
                                                <div class="selector">
                                                    <select name="cadult" class="full-width">
                                                        <option value="<?php echo $Hcadult; ?>"><?php echo $Hcadult; ?></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kids</label>
                                                <div class="selector">
                                                    <select name="ckid" class="full-width">
                                                        <option value="<?php echo $Hckid; ?>"><?php if($Hckid == 0){echo 'No Kids';}else{echo $Hckid;}?></option>
                                                        <option value="0">No Kids</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Rooms</label>
                                                <div class="selector">
                                                    <select name="croom" class="full-width">
                                                        <option value="<?php echo $Hcroom; ?>"><?php echo $Hcroom; ?></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Adult Price Range</label>
                                                <div class="selector">
                                                    <select name="adultpricerange" class="full-width">
                                                        <option value="<?php echo  $Hapricerange; ?>"> Below LKR <?php echo $Hapricerange; ?></option>
                                                        <option value="5000">Below LKR 5000</option>
                                                        <option value="10000">Below LKR 10000</option>
                                                        <option value="15000">Below LKR 15000</option>
                                                        <option value="20000">Below LKR 20000</option>
                                                        <option value="25000">Below LKR 25000</option>
                                                        <option value="30000">Below LKR 30000</option>
                                                        <option value="35000">Below LKR 35000</option>
                                                        <option value="40000">Below LKR 40000</option>
                                                        <option value="45000">Below LKR 45000</option>
                                                        <option value="50000">Below LKR 50000</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Home Type</label>
                                                <div class="selector">
                                                    <select name="htype" class="full-width">
                                                        <option value="<?php echo $Htype; ?>"><?php echo $Htype; ?></option>
                                                        <option value="resort">Resort</option>
                                                        <option value="villa">Villa</option>
                                                        <option value="cabin">Cabin</option>
                                                        <option value="cottage">Cottage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <button type="submit" name="homesubmit" class="btn-medium icon-check uppercase full-width">search again</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-9">
                        <div class="sort-by-section box clearfix">
                            <h4 class="sort-by-title block-sm">Results for Your Search <i class="fa fa-arrow-down"></i> </h4>
                        </div>
                        <div class="hotel-list listing-style3 hotel">
                            <?php
                            //calling a method via object to display searched homes using foreach
                            $homedata = $home->HomeSearchData($Hdistrict, $Hsdate, $Hedate, $Hcadult, $Hckid, $Hcroom, $Hapricerange, $Htype);
                            if ($homedata) {
                                foreach ($homedata as $homeinfo) {
                            ?>
                                    <article class="box">
                                        <figure class="col-sm-5 col-md-4">
                                            <a title="" class="popup-gallery"><img width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $homeinfo['cover_img1']; ?>"></a>
                                        </figure>
                                        <div class="details col-sm-7 col-md-8">
                                            <div>
                                                <div>
                                                    <h4 class="box-title"><?= $homeinfo['home_name']; ?><small><i class="soap-icon-departure yellow-color"></i> <?php echo $homeinfo['district']; ?>, Sri Lanka</small><small> <i style="font-size: 17px;" class="soap-icon-availability yellow-color"></i> <?php echo $homeinfo['ava_start_date']; ?> - <?php echo $homeinfo['ava_end_date']; ?> </small></h4> <br />
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-fitnessfacility circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-television circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="review">Includes <br /><?= $homeinfo['rooms']; ?> Rooms</span>
                                                </div>
                                            </div>
                                            <div>
                                                <p><?= $homeinfo['lg_desc']; ?></p>
                                                <div>
                                                    <span class="price"><small>AVG/NIGHT</small><?= $homeinfo['ava_night_price_adult']; ?></span>
                                                    <a class="button btn-small full-width text-center" title="" href="home-detailed.php?homeid=<?php echo $homeinfo['home_id']; ?>">SELECT</a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                            <?php
                                }
                            } else {
                                echo "Homes Not Found.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/jsscripts.php'); ?>
    <?php include('includes/footer.php'); ?>
</body>

</html>