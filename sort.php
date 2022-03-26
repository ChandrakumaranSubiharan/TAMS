<?php
// Include database file
include_once 'includes/dbconfig.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>
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
                                    <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                                </h4>
                                <div id="price-filter" class="">
                                    <div class="panel-content">
                                        <div class="list-group-item">
				<input id="priceSlider" data-slider-id='ex1Slider' type="text" data-slider-min="1000" data-slider-max="65000" data-slider-step="1" data-slider-value="14"/>
				<div class="priceRange">1000 - 65000</div>
				<input type="hidden" id="minPrice" value="0" />
				<input type="hidden" id="maxPrice" value="65000" />                  
			</div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>
                                </h4>
                                <div id="accomodation-type-filter" class="panel-collapse collapse">
                                    <div class="panel-content">
                                        <ul class="check-square filters-option">
                                            <li><a href="#">All</a></li>
                                            <li><a href="#">Hotel</a></li>
                                            <li><a href="#">Resort</a></li>
                                            <li class="active"><a href="#">Bed &amp; Breakfast</a></li>
                                            <li><a href="#">Condo</a></li>
                                            <li><a href="#">Residence</a></li>
                                            <li><a href="#">Guest House</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#language-filter" class="collapsed">District</a>
                                </h4>
                                <div id="language-filter" class="panel-collapse collapse">
                                    <div class="panel-content">
                                        <ul class="check-square filters-option">
                                            <li><a href="#">English<small>(722)</small></a></li>
                                            <li><a href="#">Español<small>(982)</small></a></li>
                                            <li class="active"><a href="#">Português<small>(127)</small></a></li>
                                            <li class="active"><a href="#">Français<small>(222)</small></a></li>
                                            <li><a href="#">Suomi<small>(158)</small></a></li>
                                            <li><a href="#">Italiano<small>(439)</small></a></li>
                                            <li><a href="#">Sign Language<small>(52)</small></a></li>
                                            <li><a href="#">English<small>(722)</small></a></li>
                                            <li><a href="#">Español<small>(982)</small></a></li>
                                            <li class="active"><a href="#">Português<small>(127)</small></a></li>
                                            <li class="active"><a href="#">Français<small>(222)</small></a></li>
                                            <li><a href="#">Suomi<small>(158)</small></a></li>
                                            <li><a href="#">Italiano<small>(439)</small></a></li>
                                            <li><a href="#">Sign Language<small>(52)</small></a></li>
                                            <li><a href="#">English<small>(722)</small></a></li>
                                            <li><a href="#">Español<small>(982)</small></a></li>
                                            <li class="active"><a href="#">Português<small>(127)</small></a></li>
                                            <li class="active"><a href="#">Français<small>(222)</small></a></li>
                                            <li><a href="#">Suomi<small>(158)</small></a></li>
                                            <li><a href="#">Italiano<small>(439)</small></a></li>
                                            <li><a href="#">Sign Language<small>(52)</small></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-9">
                        <div class="sort-by-section box clearfix">
                            <h4 class="sort-by-title block-sm">Recently Listed Homes <i class="fa fa-arrow-down"></i> </h4>
                        </div>
                        <div class="hotel-list listing-style3 hotel">

                            <?php $sql = "SELECT * from tbl_home where status = 1 order by rand()";
                            $query = $DB_con->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {    ?>


                                    <article class="service-info-crd box">
                                        <figure class="col-sm-5 col-md-4">
                                            <a title="" class="popup-gallery"><img width="270" height="160" alt="" src="partner/includes/uploads/<?php echo htmlentities($result->cover_img1); ?>"></a>
                                        </figure>
                                        <div class="details col-sm-7 col-md-8">
                                            <div>
                                                <div>
                                                    <h4 class="box-title"><?php echo htmlentities($result->home_name); ?><small><i class="soap-icon-departure yellow-color"></i> <?php echo htmlentities($result->district); ?>, Sri Lanka</small></h4>
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
                                                    <span class="review"><?php echo htmlentities($result->home_type); ?></span>
                                                </div>
                                            </div>
                                            <div>
                                                <p><?php echo htmlentities($result->lg_desc); ?></p>
                                                <div>

                                                    <span class="price"><small>AVG/NIGHT</small>LKR <?php echo htmlentities($result->ava_night_price); ?></span>
					                                <a class="button btn-small full-width text-center view-card" href="home-detailed.php?homeid=<?php echo htmlentities($result->home_id);?>">Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                            <?php }
                            } ?>











                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/search.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>

</body>

</html>