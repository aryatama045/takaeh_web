<!-- Featured properties start -->
<div class="featured-properties content-area-7">
    <div class="container-fluid">
        <div class="main-title">
            <h1>Featured Properties</h1>
            <p>Pilihan terbaik untuk rumah idaman.</p>
        </div>
        <div class="row slick-fullwidth wow fadeInUp delay-04s mb-4">

        <?php foreach($feature as $row) { 
            
            $url = FCPATH.'www/properties/'.$row['properties_cover'];

            // tesx(file_exists($url));

            if(file_exists($url)){
                $imgCover = '<img data-original="'.base_url('www/properties/'.$row['properties_cover']).'" 
                        src="'.base_url('www/properties/'.$row['properties_cover']).'" alt="property-box" class="img-fluid">';
            } else {
                $imgCover = '<img data-original="https://placehold.co/415x276" src="https://placehold.co/415x276" alt="property-box" class="img-fluid">';
            }

            if($row['properties_tipe_jual'] == 'Dijual'){
                $status = '<div class="tag-for">For Sale</div>';
            } else {
                $status = '<div class="tag-for">For Rent</div>';
            }

            $date= $row['created_date'];
        ?>

            <div class="slick-slide-item">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="<?= base_url('properti/detail/'.$row['properties_url'])?>" class="property-img">
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <?= $status ?>
                            <!-- <div class="plan-price"><sup>Rp.</sup>650<span>/month</span> </div> -->

                            <?= $imgCover ?>

                        </a>
                        <div class="property-overlay">
                            <a href="<?= base_url('properti/detail/'.$row['properties_url'])?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <!-- <a class="overlay-link property-video" title="Test Title">
                                <i class="fa fa-video-camera"></i>
                            </a> -->
                            <div class="property-magnify-gallery">
                                <a href="https://placehold.co/750x540" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="https://placehold.co/750x540" class="hidden"></a>
                                <a href="https://placehold.co/750x540" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title" >
                            <a href="<?= base_url('properti/detail/'.$row['properties_url'])?>" title="<?= $row['properties_title']?>" > 
                            <?= character_limiter($row['properties_title'], '12') ?></a>
                        </h1>
                        <div class="location">
                            <a href="<?= base_url('properti/detail/'.$row['properties_url'])?>">
                                <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i> 
                                <?= character_limiter($row['properties_alamat'], '20') ?>
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> <?= $row['properties_kamar_tidur'] ?> Bedrooms
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> <?= $row['properties_kamar_mandi'] ?> Bathrooms
                            </li>
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> 
                                Sq Ft: <?= $row['properties_luas_tanah'] ?>
                            </li>
                            <li>
                                <i class="flaticon-car-repair"></i> <?= $row['properties_garasi'] ?> Garage
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="<?= base_url('properti/detail/'.$row['properties_url'])?>">
                            <i class="fa fa-user"></i> Rama A.
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i> 
                            <?= date('d-m-Y' ,$date) ?>
                        </span>
                    </div>
                </div>
            </div>

        <?php } ?>


            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
        <div class="col-lg-12 text-center pt-5">
                <a data-animation="animated fadeInUp delay-10s" 
                href="<?= base_url('properti')?>" class="btn btn-lg btn-theme">More Properties</a>
        </div>
    </div>
</div>
<!-- Featured properties end -->