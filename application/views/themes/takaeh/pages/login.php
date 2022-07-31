<!-- Contact section start -->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-inner-form">
                    <div class="details">
                        <a href="<?= base_url()?>">
                            <img src="<?= base_url()?>assets/logo/black-logo.png" alt="logo">
                        </a>
                        <h3>Sign into your account</h3>
                        <?php echo validation_errors(); ?>
                        <form id="form" action="<?php echo base_url('login')?>"  method="POST" enctype="multipart/form-data">
                        
                            <div class="form-group">
                                <input type="text" name="email" class="input-text" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" placeholder="Password" required>
                            </div>
                            <div class="checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <a href="<?= base_url('forgot') ?>">Forgot Password</a>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" value="form" class="btn-md btn-theme btn-block">Login</button>
                            </div>
                        
                        </form>
                        <!-- <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul> -->
                    </div>
                    <div class="footer">
                        <span>Don't have an account? <a href="<?= base_url('register') ?>">Register here</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->