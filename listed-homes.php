<?php
// Include database file
include_once 'includes/dbconfig.php';
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
                <h3 class="entry-title">Listed Homes</h3>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOME</a></li>
                <li class="active">Listed Homes</li>
            </ul>
        </div>
    </div>

    <section id="content">
        <div class="container">
            <div id="main">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <h4 class="search-results-title"><i class="soap-icon-search"></i>Sort Homes by:</h4>
                        <div class="toggle-container filters-container">

                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <p>Search</p>
                                </h4>
                                <div class="panel-content">
                                    <form action="homes-search-list.php" method="post">
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <div class="selector">
                                                <select name="district" class="full-width">
                                                    <option value="Kandy">Kandy</option>
                                                    <option value="Colombo">Colombo</option>
                                                    <option value="Jaffna">Jaffna</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>check in</label>
                                            <div class="datepicker-wrap">
                                                <input type="date" name="sdate" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>check out</label>
                                            <div class="datepicker-wrap">
                                                <input type="date" name="edate" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Adults</label>
                                            <div class="selector">
                                                <select name="cadult" class="full-width">
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
                                            <label>Price Range</label>
                                            <div class="selector">
                                                <select name="adultpricerange" class="full-width">
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
                    <div class="col-sm-8 col-md-9">
                        <div class="sort-by-section box clearfix">
                            <h4 class="sort-by-title block-sm">Recently Listed Homes <i class="fa fa-arrow-down"></i> </h4>
                        </div>
                        <div class="hotel-list listing-style3 hotel">

                            <?php

                            if (isset($_GET['district'])) {
                                $bydistrict = ($_GET['district']);

                                $homedata = $home->HomebyDistrictData($bydistrict);
                                foreach ($homedata as $homeinfo) {

                            ?>
                                    <article class="service-info-crd box">
                                        <figure class="col-sm-5 col-md-4">
                                            <a title="" class="popup-gallery"><img width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $homeinfo['cover_img1']; ?>"></a>
                                        </figure>
                                        <div class="details col-sm-7 col-md-8">
                                            <div>
                                                <div>
                                                    <h4 class="box-title"><?php echo $homeinfo['home_name']; ?><small><i class="soap-icon-departure yellow-color"></i> <?php echo $homeinfo['district']; ?>, Sri Lanka</small></h4>
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-fitnessfacility circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-television circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="five-stars-container">
                                                        <span class="five-stars" style="width: 80%;"></span>
                                                    </div>
                                                    <span class="review"><?php echo $homeinfo['home_type']; ?></span>
                                                </div>
                                            </div>
                                            <div>
                                                <p><?php echo $homeinfo['lg_desc']; ?></p>
                                                <div>
                                                    <span class="price"><small>AVG/NIGHT</small>LKR <?php echo $homeinfo['ava_night_price_adult']; ?></span>
                                                    <a class="button btn-small full-width text-center view-card" href="home-detailed.php?homeid=<?php echo $homeinfo['home_id']; ?>">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                <?php }
                            } else {
                                ?>
                                <?php
                                $homedata = $home->HomeActiveListedData();
                                foreach ($homedata as $homeinfo) {
                                ?>
                                
                                    <article class="service-info-crd box">
                                        <figure class="col-sm-5 col-md-4">
                                            <a title="" class="popup-gallery"><img width="270" height="160" alt="" src="partner/includes/uploads/<?php echo $homeinfo['cover_img1']; ?>"></a>
                                        </figure>
                                        <div class="details col-sm-7 col-md-8">
                                            <div>
                                                <div>
                                                    <h4 class="box-title"><?php echo $homeinfo['home_name']; ?><small><i class="soap-icon-departure yellow-color"></i> <?php echo $homeinfo['district']; ?>, Sri Lanka</small></h4>
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-fitnessfacility circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-television circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="five-stars-container">
                                                        <span class="five-stars" style="width: 80%;"></span>
                                                    </div>
                                                    <span class="review"><?php echo $homeinfo['home_type']; ?></span>
                                                </div>
                                            </div>
                                            <div>
                                                <p><?php echo $homeinfo['lg_desc']; ?></p>
                                                <div>
                                                    <span class="price"><small>AVG/NIGHT</small>LKR <?php echo $homeinfo['ava_night_price_adult']; ?></span>
                                                    <a class="button btn-small full-width text-center view-card" href="home-detailed.php?homeid=<?php echo $homeinfo['home_id']; ?>">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                            <?php   }
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