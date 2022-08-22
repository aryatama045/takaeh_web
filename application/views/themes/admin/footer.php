



</main>
<footer class="page-footer mt-5">
		<div class="footer-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted">Copyright &copy; <?= date('Y') ?> All rights reserved. <br>
                        | <?= $_SERVER['HTTP_HOST'] ?> 
                        | <?= (ENVIRONMENT!='production')?ENVIRONMENT:""?>
                        | <b>CI </b> <?php echo CI_VERSION; ?>
                        | rendered in <strong>{elapsed_time}</strong> seconds.
                        <?=$this->config->item("author") ?> - <?=$this->config->item("version") ?>
                        </p>
                        

                    
                    </div>
                    <div class="col-sm-6 d-none d-sm-block">
                        <ul class="breadcrumb pt-0 pr-0 float-right">
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Review</a>
                            </li>
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Purchase</a>
                            </li>
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Docs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/Chart.bundle.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/chartjs-plugin-datalabels.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/moment.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/fullcalendar.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/datatables.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/progressbar.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/jquery.barrating.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/select2.full.js"></script>
	<script src="<?= base_url('themes/admin/') ?>js/vendor/jquery.smartWizard.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/nouislider.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/dropzone.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/Sortable.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/mousetrap.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/vendor/glide.min.js"></script>
	<script src="<?= base_url('themes/admin/') ?>js/vendor/bootstrap-tagsinput.min.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/dore.script.js"></script>
    <script src="<?= base_url('themes/admin/') ?>js/scripts.js"></script>

    <!-- <script src="<?= base_url('themes/admin/') ?>jquery.magnific-popup.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
<script src="<?=base_url()?>themes/admin/vendor/xeditable/bootstrap-editable.min.js"></script>




<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/setting/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/setting/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>

<script type="text/javascript">
	var base_url= '<?php echo base_url()?>';


	$(document).ready(function() {
		// $('.image-link').magnificPopup({ type: 'image' });

		// $('.test-popup-link').magnificPopup({
		// 	type: 'image'
		// 		// other options
		// });

		function goBack() {
			window.history.back();
		}

		$('#smartWizardClickTable').smartWizard({
			selected: 0,
			theme: 'default',
			transitionEffect: 'fade',
			showStepURLhash: false,
			anchorSettings: {
				enableAllAnchors: true
			}
		});

		// memanggil plugin magnific popup
		// $('.portfolio-popup').magnificPopup({
		// 	type: 'image',
		// 	removalDelay: 300,
		// 	mainClass: 'mfp-fade',
		// 	gallery: {
		// 		enabled: true
		// 	},
		// 	zoom: {
		// 		enabled: true,
		// 		duration: 300,
		// 		easing: 'ease-in-out',
		// 		opener: function(openerElement) {
		// 			return openerElement.is('img') ? openerElement : openerElement.find('img');
		// 		}
		// 	}
		// });

	});


    (function($) {
        'use strict';
        $(function() {
            /* Code for attribute data-custom-class for adding custom class to tooltip */
            if (typeof $.fn.popover.Constructor === 'undefined') {
            throw new Error('Bootstrap Popover must be included first!');
            }

            var Popover = $.fn.popover.Constructor;

            // add customClass option to Bootstrap Tooltip
            $.extend(Popover.Default, {
            customClass: ''
            });

            var _show = Popover.prototype.show;

            Popover.prototype.show = function() {

            // invoke parent method
            _show.apply(this, Array.prototype.slice.apply(arguments));

            if (this.config.customClass) {
                var tip = this.getTipElement();
                $(tip).addClass(this.config.customClass);
            }

            };

            $('[data-toggle="popover"]').popover()
        });
    })(jQuery);
</script>


</body>

</html>

