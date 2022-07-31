<!-- Contact section start -->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-inner-form">
                    <div class="details">
                        <a href="index.html">
                            <img src="<?= base_url()?>assets/logo/black-logo.png" alt="logo">
                        </a>
                        <h3>Create an account</h3>
                        <form action="index.html" method="GET">
                            <div class="form-group">
                                <input type="text" name="fullname" class="input-text" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="input-text" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="Password" class="input-text" placeholder="Password" required>
                            </div>
                            <div class="checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        I agree to the<a href="#" class="terms">terms of service</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md btn-theme btn-block">Register</button>
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
                        <span>Already a member? <a href="<?= base_url('login') ?>">Login here</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->