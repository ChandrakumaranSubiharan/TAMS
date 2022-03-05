<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php include('includes/header.php');?>

<div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h3 class="entry-title">Listed Tours</h3>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOME</a></li>
                <li class="active">Listed Tours</li>
            </ul>
        </div>
</div>

<section id="content">
        <div class="container">
            <div id="main">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <h4 class="search-results-title"><i class="soap-icon-search"></i>Sort Tours by:</h4>
                        <div class="toggle-container filters-container">
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <p>Search</p>
                                </h4>
                                <div  class="#">
                                    <div class="panel-content">
                                        <form method="post">
                                            <div class="form-group">
                                                <label>destination</label>
                                                <input type="text" class="input-text full-width" placeholder="" value="Paris" />
                                            </div>
                                            <div class="form-group">
                                                <label>Departure date</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Cruise Length</label>
                                                <div class="selector full-width">
                                                    <select>
                                                        <option value="">select cruise length</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Cruise line</label>
                                                <div class="selector full-width">
                                                    <select>
                                                        <option value="">select cruise line</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-medium icon-check uppercase full-width">search again</button>
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
                                    <a data-toggle="collapse" href="#cruise-cabin-type-filter" class="collapsed">Cabin Type</a>
                                </h4>
                                <div id="cruise-cabin-type-filter" class="panel-collapse collapse">
                                    <div class="panel-content">
                                        <ul class="check-square filters-option">
                                            <li><a href="#">Inside<small>($620)</small></a></li>
                                            <li><a href="#">Oceanview<small>($982)</small></a></li>
                                            <li class="active"><a href="#">Balcony<small>($127)</small></a></li>
                                            <li class="active"><a href="#">Suites<small>($222)</small></a></li>
                                            <li><a href="#">Junior Suite<small>($158)</small></a></li>
                                            <li><a href="#">Suite w/ Balcony<small>($439)</small></a></li>
                                            <li><a href="#">Outside<small>($52)</small></a></li>
                                        </ul>
                                        <a class="button btn-mini">MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-9">
                        <div class="sort-by-section box clearfix">
                            <h4 class="sort-by-title block-sm">Recently Listed Tours <i class="fa fa-arrow-down"></i> </h4>
                        </div>
                        <div class="cruise-list listing-style3 cruise">
                            <article class="service-info-crd box">
                                <figure class="col-sm-4">
                                    <a title="" class=""><img width="270" height="160" alt="" src="assets/images/services card images/pkg02.png"></a>
                                </figure>
                                <div class="details col-sm-8">
                                    <div class="clearfix">
                                        <h4 class="box-title pull-left">Scintillating Tropical Tour to South<small>7 Days & 6 Nights</small></h4>
                                        <span class="price pull-right"><small>from</small>$239</span>
                                    </div>
                                    <div class="character clearfix">
                                        <div class="col-xs-4 date">
                                            <i class="soap-icon-fireplace yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Type</span><br>Sightseeing Tour
                                            </div>
                                        </div>
                                        <div class="col-xs-4 date">
                                            <i class="soap-icon-clock yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Date</span><br>mon, Jan 26, 2014
                                            </div>
                                        </div>
                                        <div class="col-xs-5 departure">
                                            <i class="soap-icon-departure yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Location</span><br> Galle, Sri Lanka
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="review pull-left">
                                           <p>Sri Lanka is surrounded by elevated area lie sprawling plains the coastal areas are dotted with beautiful beaches and lagoons.</p>
                                        </div>
                                        <a href="cruise-detailed.html" class="button btn-small pull-right view-card">select Tour</a>
                                    </div>
                                </div>
                            </article>

                            <article class="service-info-crd box">
                                <figure class="col-sm-4">
                                    <a title="" class=""><img width="270" height="160" alt="" src="assets/images/services card images/pkg02.png"></a>
                                </figure>
                                <div class="details col-sm-8">
                                    <div class="clearfix">
                                        <h4 class="box-title pull-left">Scintillating Tropical Tour to South<small>7 Days & 6 Nights</small></h4>
                                        <span class="price pull-right"><small>from</small>$239</span>
                                    </div>
                                    <div class="character clearfix">
                                        <div class="col-xs-4 date">
                                            <i class="soap-icon-fireplace yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Type</span><br>Sightseeing Tour
                                            </div>
                                        </div>
                                        <div class="col-xs-4 date">
                                            <i class="soap-icon-clock yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Date</span><br>mon, Jan 26, 2014
                                            </div>
                                        </div>
                                        <div class="col-xs-5 departure">
                                            <i class="soap-icon-departure yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Location</span><br> Galle, Sri Lanka
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="review pull-left">
                                           <p>Sri Lanka is surrounded by elevated area lie sprawling plains the coastal areas are dotted with beautiful beaches and lagoons.</p>
                                        </div>
                                        <a href="cruise-detailed.html" class="button btn-small pull-right view-card">select Tour</a>
                                    </div>
                                </div>
                            </article>

                            <article class="service-info-crd box">
                                <figure class="col-sm-4">
                                    <a title="" class=""><img width="270" height="160" alt="" src="assets/images/services card images/pkg02.png"></a>
                                </figure>
                                <div class="details col-sm-8">
                                    <div class="clearfix">
                                        <h4 class="box-title pull-left">Scintillating Tropical Tour to South<small>7 Days & 6 Nights</small></h4>
                                        <span class="price pull-right"><small>from</small>$239</span>
                                    </div>
                                    <div class="character clearfix">
                                        <div class="col-xs-4 date">
                                            <i class="soap-icon-fireplace yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Type</span><br>Sightseeing Tour
                                            </div>
                                        </div>
                                        <div class="col-xs-4 date">
                                            <i class="soap-icon-clock yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Date</span><br>mon, Jan 26, 2014
                                            </div>
                                        </div>
                                        <div class="col-xs-5 departure">
                                            <i class="soap-icon-departure yellow-color"></i>
                                            <div>
                                                <span class="skin-color">Location</span><br> Galle, Sri Lanka
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="review pull-left">
                                           <p>Sri Lanka is surrounded by elevated area lie sprawling plains the coastal areas are dotted with beautiful beaches and lagoons.</p>
                                        </div>
                                        <a href="cruise-detailed.html" class="button btn-small pull-right view-card">select Tour</a>
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