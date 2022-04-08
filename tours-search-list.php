<?php
// Include database file
include_once 'includes/dbconfig.php';
?>


<?php
if (isset($_REQUEST['toursubmit'])) {
    $tdistrict = $_REQUEST["tdistrict"];
    $tsdate = $_REQUEST["sdate"];
    $tcadult = $_REQUEST["cadult"];
    $tckid = $_REQUEST["ckid"];
    $tpricerange = $_REQUEST['pricerange'];
    $ttype = $_REQUEST['ttype'];
    $tlanguage = $_REQUEST['tlan'];
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
                <h3 class="entry-title">Tours Search Results</h3>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOME</a></li>
                <li class="active">Tours Search Results</li>
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
                                <div class="#">
                                    <div class="panel-content">
                                        <form method="post">
                                            <div class="form-group">
                                                <label>Destination</label>
                                                <div class="selector">
                                                    <select name="tdistrict" class="full-width">
                                                        <option value="<?php echo $tdistrict; ?>"><?php echo $tdistrict; ?></option>
                                                        <option value="Kandy">Kandy</option>
                                                        <option value="Colombo">Colombo</option>
                                                        <option value="Jaffna">Jaffna</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>from when onwards</label>
                                                <div class="datepicker-wrap">
                                                    <input type="date" name="sdate" value="<?php echo $tsdate; ?>" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tour Type</label>
                                                <div class="selector">
                                                    <select name="ttype" class="full-width">
                                                        <option value="<?php echo $ttype; ?>"><?php echo $ttype; ?></option>
                                                        <option value="Active Adventure">Active Adventure</option>
                                                        <option value="resort">Resort</option>
                                                        <option value="villa">Villa</option>
                                                        <option value="cabin">Cabin</option>
                                                        <option value="cottage">Cottage</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Guide Language</label>
                                                <div class="selector">
                                                    <select name="tlan" class="full-width">
                                                        <option value="<?php echo $tlanguage; ?>"><?php echo $tlanguage; ?></option>
                                                        <option value="english">English</option>
                                                        <option value="tamil">Tamil</option>
                                                        <option value="sinhala">Sinhala</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Adult</label>
                                                <div class="selector">
                                                    <select name="cadult" class="full-width">
                                                        <option value="<?php echo $tcadult; ?>"><?php echo $tcadult; ?></option>
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
                                                        <option value="<?php echo $tckid;?>"><?php if($tckid == 0){echo 'No Kids';}else{echo $tckid;}?></option>
                                                        <option value="0">No Kids</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Price Range</label>
                                                <div class="selector">
                                                    <select name="pricerange" class="full-width">
                                                        <option value="<?php echo  $tpricerange; ?>"> Below LKR <?php echo $tpricerange; ?></option>
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
                                            <br />
                                            <button type="submit" name="toursubmit" class="btn-medium icon-check uppercase full-width">search again</button>
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
                        <div class="cruise-list listing-style3 cruise">
                            <?php
                            $tourdata = $tour->TourSearchData($tdistrict, $tsdate, $tlanguage, $tpricerange, $ttype);
                            if ($tourdata) {
                                foreach ($tourdata as $tourinfo) {
                            ?>
                                    <article class="service-info-crd box">
                                        <figure class="col-sm-4">
                                            <a title="" class=""><img width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $tourinfo['image']; ?>"></a>
                                        </figure>
                                        <div class="details col-sm-8">
                                            <div class="clearfix">
                                                <h4 class="box-title pull-left"><?php echo $tourinfo['title']; ?><small>Total <?php echo $tourinfo['duration_nights']; ?> Nights</small></h4>
                                                <span class="price pull-right"><small>from</small>LKR <?php echo $tourinfo['adult_price']; ?></span>
                                            </div>
                                            <div class="character clearfix">
                                                <div class="col-xs-4 date">
                                                    <i class="soap-icon-fireplace yellow-color"></i>
                                                    <div>
                                                        <span class="skin-color">Type</span><br><?php echo $tourinfo['tour_type']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 date">
                                                    <i class="soap-icon-clock yellow-color"></i>
                                                    <div>
                                                        <span class="skin-color">Starting From:</span><br><?php echo $tourinfo['ava_start_date']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 departure">
                                                    <i class="soap-icon-departure yellow-color"></i>
                                                    <div>
                                                        <span class="skin-color">Location</span><br>Starting From <?php echo $tourinfo['district']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="review pull-left">
                                                    <?php
                                                    $string = $tourinfo['details'];

                                                    // strip tags to avoid breaking any html
                                                    $string = strip_tags($string);
                                                    if (strlen($string) > 100) {

                                                        // truncate string
                                                        $stringCut = substr($string, 0, 100);
                                                        $endPoint = strrpos($stringCut, ' ');

                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= '... <a">Read More</a>';
                                                    }
                                                    ?>
                                                    <p><?php echo $string; ?></p>
                                                </div>
                                                <a class="button btn-small pull-right view-card" href="tour-detailed.php?tourid=<?php echo $tourinfo['tour_id']; ?>">select Tour</a>
                                            </div>
                                        </div>
                                    </article>
                            <?php
                                }
                            } else {

                                echo "No Tours Found.";
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