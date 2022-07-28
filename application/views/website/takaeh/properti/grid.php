<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Properties Listing</h1>
            <ul class="breadcrumbs">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li class="active"><?= ucfirst($this->uri->segment(1)) ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->


<!-- Properties list rightside start -->
<div class="properties-list-rightside content-area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="option-bar">
                    <div class="row clearfix">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-5 col-3">
                            <h4>
                                <span class="heading-icon">
                                    <i class="fa fa-caret-right icon-design"></i>
                                    <i class="fa fa-th-large"></i>
                                </span>
                                <span class="heading">Properties Grid</span>
                            </h4>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-7 col-9">
                            <div class="sorting-options clearfix">
                                <a href="properties-list-rightside.html" class="change-view-btn"><i class="fa fa-th-list"></i></a>
                                <a href="properties-grid-rightside.html" class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
                            </div>
                            <div class="search-area">
                                <select class="selectpicker search-fields" name="location">
                                    <option>High to Low</option>
                                    <option>Low to High</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="subtitle">
                    20 Result Found
                </div>

                <div class="row">
                    <?php foreach ($properties->result() as $dataProperties) { ?>

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="listing-badges">
                                        <!-- <span class="featured">Featured</span> -->
                                    </div>
                                    <!-- <div class="tag-for">For Sale</div> -->
                                    <!-- <div class="plan-price"><sup>$</sup>820<span>/month</span> </div> -->
                                    <img src="https://place-hold.it/350x250" alt="property-box" class="img-fluid">
                                </a>
                                <div class="property-overlay">
                                    <a href="properties-details.html" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a class="overlay-link property-video" title="Test Title">
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                    <div class="property-magnify-gallery">
                                        <a href="https://place-hold.it/750x540" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="https://place-hold.it/750x540"></a>
                                        <a href="https://place-hold.it/750x540"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title" >
                                    <a href="properties-details.html" title="<?= $dataProperties->properties_title ?>"><?= character_limiter($dataProperties->properties_title, '20') ?></a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>
                                        <?= character_limiter($dataProperties->properties_alamat, '20') ?>
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-bed"></i> 3 Bedrooms
                                    </li>
                                    <li>
                                        <i class="flaticon-bath"></i> 2 Bathrooms
                                    </li>
                                    <li>
                                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                                    </li>
                                    <li>
                                        <i class="flaticon-car-repair"></i> 1 Garage
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <a href="#">
                                    <i class="fa fa-user"></i> Jhon Doe
                                </a>
                                <span>
                            <i class="fa fa-calendar-o"></i> 2 day ago
                        </span>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination-box hidden-mb-45 text-center">
                        <?php error_reporting(0); echo $paginations;?>
                            <!-- <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item"><a class="page-link active" href="properties-grid-rightside.html">1</a></li>
                                    <li class="page-item"><a class="page-link" href="properties-grid-leftside.html">2</a></li>
                                    <li class="page-item"><a class="page-link " href="properties-grid-fullwidth.html">3</a></li>
                                    <li class="page-item"><a class="page-link" href="properties-grid-leftside.html"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Properties list rightside end -->

