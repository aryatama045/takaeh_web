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