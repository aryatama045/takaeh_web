

<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <ul class="contact-info">
                        <?php if(setting('address')!="System not available") { ?>
                        <li>
                            <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i> <?=setting('address')?>
                        </li>
                        <?php } ?>

                        <?php if(setting('address')!="System not available") { ?>
                        <li>
                            <i class="fa fa-envelope"></i><a href="mailto:<?=setting('email')?>"> <?=setting('email')?></a>
                        </li>
                        <?php } ?>

                        <?php if(setting('phone')!="System not available") { ?>
                        <li>
                            <i class="fa fa-phone"></i><a href="tel:+55-417-634-7071"> +0477 85X6 552</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>About us</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Service</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Contact Us</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Properties Grid</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Blog Post</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Property Details</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <p class="copy">© <?= date('Y') ?> <a href="#"> Takaeh.</a> </p>
                </div>
                <div class="col-lg-4 col-md-12">
                    <ul class="social-list clearfix">
                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="<?= base_url('properti')?>" method="post" class="search">
        <input  type="search" name="title" placeholder="type keyword(s) here"/>
        <button type="submit" class="btn btn-sm btn-color">Search</button>
    </form>
</div>



<!-- Off-canvas sidebar -->
<div class="off-canvas-sidebar">
    <div class="off-canvas-sidebar-wrapper">
        <div class="off-canvas-header">
            <a class="close-offcanvas" href="#"><span class="fa fa-times"></span></a>
        </div>
        <div class="off-canvas-content">
            <aside class="canvas-widget">
                <div class="logo-sitebar text-center">
                    <img style="height:55px;" src="<?= base_url()?>assets/logo/logo-white.png" alt="logo">
                </div>
            </aside>
            <aside class="canvas-widget">
                <ul class="menu">
                    <li class="menu-item menu-item-has-children">
                        <a href="<?= base_url('agent/account') ?>">Account</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('agent/account') ?>">Properties List</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('agent/account') ?>">Submit Property </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('agent/account') ?>">Contact US</a>
                    </li>
                </ul>
            </aside>
            <aside class="canvas-widget">
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                </ul>
            </aside>
        </div>
    </div>
</div>

<!-- External JS libraries -->
<script src="<?= base_url() ?>themes/takaeh/js/jquery-2.2.0.min.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/popper.min.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/jquery.selectBox.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/rangeslider.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/jquery.filterizr.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/wow.min.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/backstretch.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/jquery.countdown.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/jquery.scrollUp.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/particles.min.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/typed.min.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/dropzone.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/jquery.mb.YTPlayer.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/leaflet.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/leaflet-providers.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/leaflet.markercluster.js"></script>
<script src="<?= base_url() ?>themes/takaeh/js/slick.min.js"></script>
<!-- <script src="<?= base_url() ?>themes/takaeh/js/maps.js"></script> -->
<script src="<?= base_url() ?>themes/takaeh/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- <script src="<?= base_url() ?>https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script> -->
<script src="<?= base_url() ?>themes/takaeh/js/ie-emulation-modes-warning.js"></script>
<!-- Custom JS Script -->
<script type="text/javascript">
	window.base_url = '<?php echo base_url() ?>';
</script>

<script  src="<?= base_url() ?>themes/takaeh/js/app.js"></script>
</body>
</html>