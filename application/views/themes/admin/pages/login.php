<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?= base_url('themes/admin/') ?>font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?= base_url('themes/admin/') ?>font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?= base_url('themes/admin/') ?>css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('themes/admin/') ?>css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?= base_url('themes/admin/') ?>css/vendor/bootstrap-float-label.min.css" />
	<link rel="stylesheet" href="<?= base_url('themes/admin/') ?>css/dore.light.bluenavy.css" />
	<link rel="stylesheet" href="<?= base_url('themes/admin/') ?>css/main.css" />
</head>

<body class="background  no-footer">
    <!-- <div class="fixed-background"></div> -->
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2"></p>

                            <!-- <p class="white mb-0">
                                Please use your credentials to login.
                                <br>If you are not a member, please
                                <a href="#" class="white">register</a>.
                            </p> -->
                        </div>
                        <div class="form-side">
                            <h6 class="mb-4">Login</h6>

                            <?php echo validation_errors(); ?>

                            <?php if(!empty($errors)) {
                            echo $errors;
                            } ?>

                            <form action="<?php echo base_url('admin/auth') ?>" method="post">
                                <label class="form-group has-float-label mb-4">
                                    <input type="text" class="form-control" name="email" id="user" placeholder="Nip" autocomplete="off" required tabIndex="1" autofocus />
                                    <span>NIP</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required tabIndex="2" />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- <a href="#">Forget password?</a> -->
                                    <button tabIndex="3" class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/dore.script.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/scripts.single.theme.js"></script>

    <script type="text/javascript">
    $(document).on('keypress', 'input,select', function (e) {
        if (e.which == 13) {
            e.preventDefault();
            var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
            console.log($next.length);
            if (!$next.length) {
            $next = $('[tabIndex=1]');        }
            $next.focus() .click();
        }
    });
    </script>
</body>

</html>
