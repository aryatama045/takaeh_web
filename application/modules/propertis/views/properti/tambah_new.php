
<style>
    #imagePreview {
        margin-top: 7px;
        width: 350px;
        height: 200px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
    .dz-max-files-reached {background-color: red};

    .thumb {
        margin: 24px 5px 20px 0;
        width: 150px;
        height: auto;
        float: left;
    }
    #blah {
        border: 2px solid;
        display: block;
        background-color: white;
        border-radius: 5px;
    }
</style>
<!-- https://elevenstechwebtutorials.com/detail/39/preview-and-remove-image-before-upload-jquery-and-codeigniter -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1> <?= $title?> </h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item active" aria-current="page"> <?= $title?></li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div>

    </div>

    <div class="row mb-4">
        <div class="col-12">
            <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                        aria-controls="first" aria-selected="true">PROFILE</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " id="second-tab" data-toggle="tab" href="#second" role="tab"
                        aria-controls="second" aria-selected="false">FOLLOWERS</a>
                </li>
            </ul>


            <div class="tab-content">
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php elseif($this->session->flashdata('error')): ?>
                <div class="alert alert-danger rounded " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php endif; ?>
                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger rounded " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo validation_errors(); ?>
                    </div>
            <?php endif; ?>

            <?php echo form_open_multipart('propertis/properti/tambah', array('id' => 'upload_image')); ?>

                <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                    <div class="row">

                        <div class="col-12 col-lg-8 col-xl-8 col-right">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs " role="tablist">

                                        <!-- defaults -->
                                        <li class="nav-item font-weight-bold">
                                            <a class="nav-link active" id="defaults-tab" data-toggle="tab" href="#defaults" role="tab"
                                                aria-controls="defaults" aria-selected="true"><?= ucfirst('defaults')?></a>
                                        </li>

                                        <!-- core -->
                                        <li class="nav-item font-weight-bold">
                                            <a class="nav-link" id="core-tab" data-toggle="tab" href="#core" role="tab"
                                                aria-controls="core" aria-selected="false"> <?= ucfirst('core')?></a>
                                        </li>


                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">

                                        <!-- Details -->
                                        <div class="tab-pane fade show active" id="defaults" role="tabpanel" aria-labelledby="first-tab">
                                            <!-- defaults -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td class="table-title"><?=cclang("Properti Title")?></td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_title" class="form-control" type="text"  id="properties_title" value="<?= set_value('properties_title'); ?>" required>
                                                                    <span><?=cclang("Properti Title")?></span>
                                                                </label>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                    <hr>
                                                    <div class="card-body" id="blah">
                                                        <h5 class="mb-4">Dropzone</h5>
                                                        <!-- <input type="file"
                                                            class="btn btn-default btn-file"
                                                            id="image_file"
                                                            name="userfiles[]"
                                                            multiple
                                                            maxlength="3"
                                                            accept="gif|jpg|png"
                                                            data-maxfile="1024"
                                                            required /> -->
                                                        <br>
                                                        <input type="file"
                                                            class="image-file"
                                                            name="userfiles[]"
                                                            multiple
                                                            required=""
                                                            data-maxfile="1024"
                                                            accept="image/png, image/jpeg">

                                                        <br>
                                                        <div class="row" style="margin-top: 20px;">
                                                            <span id="selected-images"></span>
                                                        </div>
                                                        <!-- <div id="uploadPreview"></div> -->
                                                        <!-- <div class="dropzone"> -->
                                                            <!-- <input type="file" name="userfiles[]"
                                                            multiple
                                                            maxlength="3"
                                                            accept="gif|jpg|png"
                                                            data-maxfile="1024"
                                                            id="mydropzone" class="multi with-preview"
                                                            /> -->
                                                        <!-- </div> -->
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>

                                        </div>

                                        <!-- core -->
                                        <div class="tab-pane fade" id="core" role="tabpanel" aria-labelledby="core-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-borderless table-striped table-hover">
                                                        <tr>
                                                            <td class="table-title"><?=cclang("time_zone")?></td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="time_zone" data-url="<?=url("setting/update_action")?>" data-type="select" data-value="<?=$this->config->item("time_zone")?>" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("time_zone")?></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title">Encryption Key</td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="encryption_key" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("encryption_key")?></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title">Encryption Url</td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="encryption_url" data-url="<?=url("setting/update_action")?>" data-type="select" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("encryption_url") == 1 ? "Y":"N"?></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title">Url suffix</td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="url_suffix" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("url_suffix")?></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title">Route admin</td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="route_admin" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="998" class="editable editable-click" title="<?=cclang("update")?>"><?=ADMIN_ROUTE?></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title">Route login</td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="route_login" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="998" class="editable editable-click" title="<?=cclang("update")?>"><?=LOGIN_ROUTE?></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title">Max Upload</td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="max_upload" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("max_upload")?></a> Kb
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title"><?=cclang("language")?></td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="language" data-url="<?=url("setting/update_action")?>" data-type="select" data-value="<?=$this->config->item("language")?>" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("language")?></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title"><?=cclang("user_log_activity")?></td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="user_log_status" data-url="<?=url("setting/update_action")?>" data-type="select" data-value="<?=setting('user_log_status')?>" data-pk="61" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('user_log_status')?></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-title"><?=cclang("maintenance")?></td>
                                                            <td>
                                                            <a href="javascript:void(0);" id="maintenance_status" data-url="<?=url("setting/update_action")?>" data-type="select" data-value="<?=setting('maintenance_status')?>" data-pk="60" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('maintenance_status')?></a>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                            <hr>

                                        </div>


                                    </div>

                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm upload-image">
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 col-xl-4 col-left">
                            <div class="card mb-4" style=" position: -webkit-sticky;position: sticky;top: 7rem;">
                                <div class="card-body">
                                    <div class="d-flex flex-row mb-3">
                                        <a class="d-block position-relative" href="#">
                                            <img src="https://placehold.co/100x100/666/fff.png?text=Not%20Found" class="img-thumbnail border-0  mb-4 list-thumbnail mx-auto">
                                        </a>
                                        <div class="pl-3 pt-2 pr-2 pb-2">
                                            <p class="list-item-heading font-weight-bold">
                                            </p>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-1">
                                        <label class="col-12 col-form-label">Featured</label>
                                        <div class="col-12">
                                            <div class="custom-switch custom-switch-primary mb-2">
                                                <input name="featured" value="1" class="custom-switch-input" id="switch" type="checkbox">
                                                <label class="custom-switch-btn" for="switch"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-1">
                                        <label class="d-block">Rating</label>
                                        <select name="rating" class="rating" data-current-rating="2">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>

                <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card d-flex flex-row mb-4">
                                <a class="d-flex" href="#">
                                    <img alt="Profile" src="img/profiles/l-8.jpg"
                                        class="img-thumbnail border-0 rounded-circle m-4 list-thumbnail align-self-center">
                                </a>
                                <div class=" d-flex flex-grow-1 min-width-zero">
                                    <div
                                        class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                        <div class="min-width-zero">
                                            <a href="#">
                                                <p class="list-item-heading mb-1 truncate">Latarsha Gama</p>
                                            </a>
                                            <p class="mb-2 text-muted text-small">Head Developer</p>
                                            <button type="button"
                                                class="btn btn-xs btn-outline-primary ">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card d-flex flex-row mb-4">
                                <a class="d-flex" href="#">
                                    <img alt="Profile" src="img/profiles/l-2.jpg"
                                        class="img-thumbnail border-0 rounded-circle m-4 list-thumbnail align-self-center">
                                </a>
                                <div class=" d-flex flex-grow-1 min-width-zero">
                                    <div
                                        class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                        <div class="min-width-zero">
                                            <a href="#">
                                                <p class="list-item-heading mb-1 truncate">Kathryn Mengel</p>
                                            </a>
                                            <p class="mb-2 text-muted text-small">Art Director</p>
                                            <button type="button"
                                                class="btn btn-xs btn-outline-primary ">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    window.base_url = '<?php echo base_url() ?>';
</script>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<?php echo $this->load->assetsadmin('properti', 'tambah', 'js');  ?>

<script type="text/javascript">
    $(document).ready(function() {

        if (window.File && window.FileList && window.FileReader)
        {
        $(".image-file").on("change", function(e)
        {
            var file = e.target.files,
            imagefiles = $(".image-file")[0].files;
            var i = 0;
            $.each(imagefiles, function(index, value){
            var f = file[i];
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {

                $('<div class="pip col-sm-3 col-4 boxDivs" align="center" style="margin-bottom: 20px;">' +
                '<img style="width: 120px; height: 100px;" src="' + e.target.result + '" class="prescriptions">'+
                '<p style="word-break: break-all;">' + value.name + '</p>'+
                '<p class="cross-image remove">Remove</p>'+
                '<input type="hidden" name="image[]" value="' + e.target.result + '">' +
                '<input type="hidden" name="imageName[]" value="' + value.name + '">' +
                '</div>').insertAfter("#selected-images");
                $(".remove").click(function(){
                    $(this).parent(".pip").remove();
                });
            });
            fileReader.readAsDataURL(f);
                i++;
            });
        });
        } else {
        alert("Your browser doesn't support to File API")
        }
    });
</script>

<script>
    $('document').ready(function(e){
        $('.upload-image').click(function(e){
            var imageDiv = $(".boxDivs").length;
            if(imageDiv == ''){
                alert('Please upload image'); // Check here image selected or not
            return false;
            }
            else if(imageDiv > 5){
                alert('You can upload only 5 images'); //You can select only 5 images at a time to upload
                return false;
            }
            else if(imageDiv != '' && imageDiv < 6){ // image should not be blank or not greater than 5
                $("#upload_image").submit();
            }
        });
    });
</script>

