<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php include('includes/header.php');?>

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
                                <div >
                                    <div class="panel-content">
                                        <form method="post">
                                            <div class="form-group">
                                                <label>destination</label>
                                                <input type="text" class="input-text full-width" placeholder="" value="Paris" />
                                            </div>
                                            <div class="form-group">
                                                <label>check in</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>check out</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <br />
                                            <button class="btn-medium icon-check uppercase full-width">search again</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                                </h4>
                                <div id="price-filter" class="panel-collapse collapse">
                                    <div class="panel-content">
                                        <div id="price-range"></div>
                                        <br />
                                        <span class="min-price-label pull-left"></span>
                                        <span class="max-price-label pull-right"></span>
                                        <div class="clearer"></div>
                                    </div><!-- end content -->
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
           
                            <article class="service-info-crd box">
                                <figure class="col-sm-5 col-md-4">
                                    <a title="" class="popup-gallery"><img width="270" height="160" alt="" src="assets/images/stays/The Riverfront TinyRoom Private Garden Terrace.png"></a>
                                </figure>
                                <div class="details col-sm-7 col-md-8">
                                    <div>
                                        <div>
                                            <h4 class="box-title">Hotel Hilton and Resorts<small><i class="soap-icon-departure yellow-color"></i> Bastille, Paris france</small></h4>
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
                                            <!-- <span class="review">270 reviews</span> -->
                                        </div>
                                    </div>
                                    <div>
                                        <p>Located amid rolling green hills and the Madulkelle Tea Estate, this property offers tents with a terrace, a seating area, and private bathroom with hot/cold water. Wired internet access is available.</p>
                                        <div>
                                            
                                            <span class="price"><small>AVG/NIGHT</small>$620</span>
                                            <a class="button btn-small full-width text-center view-card" title="" href="hotel-detailed.html">SELECT</a>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="service-info-crd box">
                                <figure class="col-sm-5 col-md-4">
                                    <a title="" class="popup-gallery"><img width="270" height="160" alt="" src="assets/images/stays/The Riverfront TinyRoom Private Garden Terrace.png"></a>
                                </figure>
                                <div class="details col-sm-7 col-md-8">
                                    <div>
                                        <div>
                                            <h4 class="box-title">Hotel Hilton and Resorts<small><i class="soap-icon-departure yellow-color"></i> Bastille, Paris france</small></h4>
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
                                            <!-- <span class="review">270 reviews</span> -->
                                        </div>
                                    </div>
                                    <div>
                                        <p>Located amid rolling green hills and the Madulkelle Tea Estate, this property offers tents with a terrace, a seating area, and private bathroom with hot/cold water. Wired internet access is available.</p>
                                        <div>
                                            
                                            <span class="price"><small>AVG/NIGHT</small>$620</span>
                                            <a class="button btn-small full-width text-center view-card" title="" href="hotel-detailed.html">SELECT</a>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="service-info-crd box">
                                <figure class="col-sm-5 col-md-4">
                                    <a title="" class="popup-gallery"><img width="270" height="160" alt="" src="assets/images/stays/The Riverfront TinyRoom Private Garden Terrace.png"></a>
                                </figure>
                                <div class="details col-sm-7 col-md-8">
                                    <div>
                                        <div>
                                            <h4 class="box-title">Hotel Hilton and Resorts<small><i class="soap-icon-departure yellow-color"></i> Bastille, Paris france</small></h4>
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
                                            <!-- <span class="review">270 reviews</span> -->
                                        </div>
                                    </div>
                                    <div>
                                        <p>Located amid rolling green hills and the Madulkelle Tea Estate, this property offers tents with a terrace, a seating area, and private bathroom with hot/cold water. Wired internet access is available.</p>
                                        <div>
                                            
                                            <span class="price"><small>AVG/NIGHT</small>$620</span>
                                            <a class="button btn-small full-width text-center view-card" title="" href="hotel-detailed.html">SELECT</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('includes/jsscripts.php');?>
<?php include('includes/footer.php');?>
</body>
</html>