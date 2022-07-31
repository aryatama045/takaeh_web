
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1><?= $title_page ?></h1>
            <ul class="breadcrumbs">
                <li ><?= ucfirst($this->uri->segment(1)) ?></li>
                <?php $link=$this->uri->segment(2); if(isset($link)) { ?>
                <li class="active"><?= ucfirst($this->uri->segment(2)) ?></li><?php } ?>

                | <?= $_SERVER['HTTP_HOST'] ?> <br>
                 | <?php 

                    switch ($_SERVER['HTTP_HOST']) {
                        case 'localhost':
                            $env = 'developments';
                            break;
                        case 'takaeh.development':
                            $env = 'developments';
                            break;
                        case 'www.testing.takaeh.com':
                            $env = 'testing';
                            break;
                        case 'www.takaeh.com':
                            $env = 'production';
                            break;
                        default:
                            $env = 'developments';
                            break;
                    } ?>
                 
                 <?= isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : $env ?>
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
                                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 col-pad2">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="make">
                                                <option>Room</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
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
                                <select class="selectpicker search-fields" id="pages" name="pages">
                                    <option value="20" selected>20</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="subtitle" id="total_data">
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





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>

<script type="text/javascript">
    window.base_url = '<?php echo base_url() ?>';
    $("img").lazyload({
        effect : "fadeIn"
    });


    $(document).ready(function() {

        // alert('tes');

        filter_data(1);


        function filter_data(page) {
            $('.filter_data').html('<div class="loader"></div>');
            var action  = 'fetch_data';
            var title   = $('#title').val();
            var tipe    = $('#tipe').val();
            var lokasi  = $('#lokasi').val();
            var pages    = $('#pages').val();

            // var ram = get_filter('ram');
            // var storage = get_filter('storage');
            $.ajax({
                url: base_url + "properti/fetch_data/" + page,
                method: "POST",
                dataType: "JSON",
                data: { action: action, title: title, lokasi: lokasi, tipe: tipe, pages:pages },
                success: function(data) {
                    $('.filter_data').html(data.properti_list);
                    $('#total_data').html(data.total_data);
                    $('#pagination_link').html(data.pagination_link);
                }
            })
        }

        function throttle(f, delay){
            var timer = null;
            return function(){
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = window.setTimeout(function(){
                    f.apply(context, args);
                },
                delay || 500);
            };
        }

        $('#title').keyup(throttle(function(){
            filter_data(1);
        }));

        $('#pages').on('change', function(event) { // for text boxes
            filter_data(1);
        });


        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $(document).on('click', '.pagination li a', function(event) {
            event.preventDefault();
            var page = $(this).data('ci-pagination-page');
            filter_data(page);
        });

        $('.common_selector').click(function() {
            filter_data(1);
        });

        $('#price_range').slider({
            range: true,
            min: 1000,
            max: 65000,
            values: [1000, 65000],
            step: 500,
            stop: function(event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data(1);
            }

        });

    });

</script>

<?php echo $this->load->assetspublic('properti', 'grid', 'js');  ?>