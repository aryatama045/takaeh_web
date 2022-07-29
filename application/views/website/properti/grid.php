<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Properties GRID</h1>
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
                <div class="search-area search-area-6 mb-4">
                    <div class="search-area-inner">
                        <div class="search-contents">
                            <form method="GET">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                        <div class="form-group">
                                            <input type="text" id="title" name="title" class="search-fields sf2 fc2" placeholder="Enter Keyword" >
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" id="tipe" name="tipe">
                                                <option>Property Types</option>
                                                <option>Residential</option>
                                                <option>Commercial</option>
                                                <option>Land</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" id="lokasi" name="lokasi">
                                                <option>Location</option>
                                                <option>United Kingdom</option>
                                                <option>American Samoa</option>
                                                <option>Belgium</option>
                                                <option>Canada</option>
                                                <option>Delaware</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2 cp3">
                                        <div class="form-group fg2">
                                            <button class="search-button btn-md btn-color">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


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

                <div class="row filter_data">
                    
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination-box hidden-mb-45 text-center" id="pagination_link">
                        <?php //error_reporting(0); echo $paginations;?>
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

<style>
    #loading
    {
    text-align:center;
    background: url('<?php echo base_url(); ?>asset/loader.gif') no-repeat center;
    height: 150px;
    }
</style>

<script type="text/javascript">
    window.base_url = '<?php echo base_url() ?>';
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<?= $this->load->assetspublic('properti', 'grid', 'js');  ?>