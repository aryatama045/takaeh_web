<link rel="stylesheet" href="<?=base_url()?>themes/admin/vendor/xeditable/bootstrap-editable.css">
<style media="screen">
    .editable-empty{
        color:red!important;
    }
    .editable-click, a.editable-click, a.editable-click:hover {
        text-decoration: none;
        border-bottom: dashed 1px #797979!important;
        color: #797979!important;
    }
    .form-input img {
        width: 100%;
        display:none;
        margin-bottom:30px;
    }

    .center {
        height:100%;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .form-input {
        width:350px;
        padding:20px;
        background:#fff;
        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                3px 3px 7px rgba(94, 104, 121, 0.377);
    }

    .form-input input {
        display:none;
    }
</style>
<script src="<?=base_url()?>themes/admin/vendor/xeditable/bootstrap-editable.min.js"></script>
<div class="row">
    <div class="col-12">
        <h1> <?= $title ?></h1>
        <div class="top-right-button-container">
				<div class="btn-group">
					<a class="btn btn-outline-primary btn-md" href="<?= base_url('user/karyawan') ?>" >
						Kembali
					</a>
				</div>
			</div>
        <br>
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
            <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                <div class="row">
                    <div class="col-12 col-lg-5 col-xl-4 col-left">
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

                                <p class="text-muted mb-1"> Dept</p>

                                <p class="text-muted mb-1"> Divisi</p>

                                <p class="text-muted mb-1"> Store</p>

                                <p class="text-muted text-small mb-2">Social Media</p>
                                <div class="social-icons">
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item">
                                            <a href="#"><i class="simple-icon-social-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="simple-icon-social-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="simple-icon-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline">
                                            <a href="#"><i class="simple-icon-social-facebook"></i></a>
                                        </li>
                                        <li class="list-inline">
                                            <a href="#"><i class="simple-icon-social-twitter"></i></a>
                                        </li>
                                        <li class="list-inline">
                                            <a href="#"><i class="simple-icon-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-8 col-right">
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

                                    <!-- logo -->
                                    <li class="nav-item font-weight-bold">
                                        <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab"
                                            aria-controls="logo" aria-selected="false"> <?= ucfirst('logo')?></a>
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
                                                <table class="table table-borderless table-striped table-hover">
                                                    <tr>
                                                        <td class="table-title"><?=cclang("title")?> Web/App</td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="web_name"
                                                            data-url="<?= base_url("admin/setting/update_action")?>"
                                                            data-type="text" data-pk="1" class="editable editable-click"
                                                            title="Edit"><?=setting('web_name')?></a>
                                                            <!-- <input type="text" class="form-control" name="web_name" value="<?=setting('web_name')?>"> -->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title">Url/Domain</td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="web_domain" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="2" class="editable editable-click" title="Edit"><?=setting('web_domain')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title"><?=cclang("owner")?></td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="web_owner" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="3" class="editable editable-click" title="Edit"><?=setting('web_owner')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title">Email</td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="email" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="4" class="editable editable-click" title="Edit"><?=setting('email')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title"><?=cclang("phone")?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" id="telepon" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="5" class="editable editable-click" title="Edit"><?=setting('telepon')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title"><?=cclang("address")?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" id="address" data-url="<?= base_url("admin/setting/update_action")?>" data-type="textarea" data-rows="4"  data-pk="6" class="editable editable-click" title="Edit"><?=setting('address')?></a>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div> <hr>

                                    </div>

                                    <!-- core -->
                                    <div class="tab-pane fade" id="core" role="tabpanel" aria-labelledby="core-tab">

                                        <table class="table table-borderless table-striped table-hover">
                                            <tr>
                                                <td class="table-title"><?=cclang("time_zone")?></td>
                                                <td>
                                                <a href="javascript:void(0);" id="time_zone" 
                                                data-url="<?= base_url("admin/setting/update_action")?>" 
                                                data-type="select" data-value="<?=$this->config->item("time_zone")?>" 
                                                data-pk="999" class="editable editable-click" title="<?=cclang("update")?>">
                                                <?=$this->config->item("time_zone")?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title">Encryption Key</td>
                                                <td>
                                                <a href="javascript:void(0);" id="encryption_key" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("encryption_key")?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title">Encryption Url</td>
                                                <td>
                                                <a href="javascript:void(0);" id="encryption_url" data-url="<?= base_url("admin/setting/update_action")?>" data-type="select" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("encryption_url") == 1 ? "Y":"N"?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title">Enable Hooks</td>
                                                <td>
                                                <a href="javascript:void(0);" id="enable_hooks" data-url="<?= base_url("admin/setting/update_action")?>" data-type="select" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("enable_hooks") == 1 ? "Y":"N"?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title">Url suffix</td>
                                                <td>
                                                <a href="javascript:void(0);" id="url_suffix" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("url_suffix")?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title">Route admin</td>
                                                <td>
                                                <a href="javascript:void(0);" id="route_admin" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="998" class="editable editable-click" title="<?=cclang("update")?>"><?=ADMIN_ROUTE?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title">Route login</td>
                                                <td>
                                                <a href="javascript:void(0);" id="route_login" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="998" class="editable editable-click" title="<?=cclang("update")?>"><?=LOGIN_ROUTE?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title">Max Upload</td>
                                                <td>
                                                <a href="javascript:void(0);" id="max_upload" data-url="<?= base_url("admin/setting/update_action")?>" data-type="text" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("max_upload")?></a> Kb
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title"><?=cclang("language")?></td>
                                                <td>
                                                <a href="javascript:void(0);" id="language" data-url="<?= base_url("admin/setting/update_action")?>" data-type="select" data-value="<?=$this->config->item("language")?>" data-pk="999" class="editable editable-click" title="<?=cclang("update")?>"><?=$this->config->item("language")?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title"><?=cclang("user_log_activity")?></td>
                                                <td>
                                                <a href="javascript:void(0);" id="user_log_status" data-url="<?= base_url("admin/setting/update_action")?>" data-type="select" data-value="<?=setting('user_log_status')?>" data-pk="61" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('user_log_status')?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="table-title"><?=cclang("maintenance")?></td>
                                                <td>
                                                <a href="javascript:void(0);" id="maintenance_status" data-url="<?= base_url("admin/setting/update_action")?>" data-type="select" data-value="<?=setting('maintenance_status')?>" data-pk="60" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('maintenance_status')?></a>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                    <!-- logo -->
                                    <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">

                                        <h5><span>Upload Image </span></h5>
                                        <div class="row ">
                                            <div class="col-12 col-xl-12 drop-area-container">
                                                <form action="<?= base_url('leaves/cuti_dispensasi/reupload_image')?>" method="post" enctype="multipart/form-data">
                                                    <input type="text" hidden class="form-control" name="id_doc" value="<?= $header_data['header']['cuti_dispensasi_h_id'] ?>" readonly>
                                                    <input type="text" hidden class="form-control" name="no_docs" value="<?= $header_data['header']['no_dok_cuti'] ?>" readonly>
                                                    <div class="card drop-area">
                                                        <div class="card-body">
                                                            <h5><span> Lampiran 1</span></h5>
                                                            <div class="center">
                                                                <div class="form-input">
                                                                    <div class="preview1">
                                                                        <img id="file-ip-1-preview">
                                                                    </div>
                                                                    <label class="btn btn-primary" for="file-ip-1">Select Image</label>
                                                                    <input type="file" name="lampiran1" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card drop-area mt-4">
                                                        <div class="card-body">
                                                            <h5><span> Lampiran 2</span></h5>
                                                            <div class="center">
                                                                <div class="form-input">
                                                                    <div class="preview2">
                                                                        <img id="file-ip-2-preview">
                                                                    </div>
                                                                    <label class="btn btn-primary" for="file-ip-2">Select Image</label>
                                                                    <input type="file" name="lampiran2" id="file-ip-2" accept="image/*" onchange="showPreview2(event);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card drop-area mt-4">
                                                        <div class="card-body">
                                                            <h5><span> Lampiran 3</span></h5>
                                                            <div class="center">
                                                                <div class="form-input">
                                                                    <div class="preview3">
                                                                        <img id="file-ip-3-preview">
                                                                    </div>
                                                                    <label class="btn btn-primary" for="file-ip-3">Select Image</label>
                                                                    <input type="file" name="lampiran3" id="file-ip-3" accept="image/*" onchange="showPreview3(event);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-4">
                                                        <div class="col-12 col-right">
                                                            <button type="submit" class="btn btn-primary mb-0">
                                                            Upload</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

<script type="text/javascript">
    window.base_url = '<?php echo base_url() ?>';
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

<script>
    function showPreview(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview1 = document.getElementById("file-ip-1-preview");
            preview1.src = src;
            preview1.style.display = "block";
        }
    }
    function showPreview2(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview2 = document.getElementById("file-ip-2-preview");
            preview2.src = src;
            preview2.style.display = "block";
        }
    }
    function showPreview3(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview3 = document.getElementById("file-ip-3-preview");
            preview3.src = src;
            preview3.style.display = "block";
        }
    }
</script>



<script type="text/javascript">
    $(document).ready(function(){

        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type: "POST",dataType : 'JSON'};
        $.fn.editableform.buttons ='<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
                                    '<i class="fa fa-fw fa-check"></i>' +
                                    '</button>' +
                                    '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
                                    '<i class="fa fa-fw fa-times"></i>' +
                                    '</button>';
        $('#web_name').editable({
            inputclass: 'form-control',
            success: function(data) {
                if (data.success != true) {
                    return data.msg;
                }
            }
        });

        $('#web_domain').editable({
            inputclass: 'form-control',
            success: function(data) {
                if (data.success != true) {
                    return data.msg;
                }
            }
        });

        $('#web_owner').editable({
            inputclass: 'form-control',
            success: function(data) {
            if (data.success != true) {
                return data.msg;
            }
            }
        });

        $('#telepon').editable({
            inputclass: 'form-control',
            success: function(data) {
            if (data.success != true) {
                return data.msg;
            }
            }
        });

        $('#email').editable({
            inputclass: 'form-control',
            success: function(data) {
            if (data.success != true) {
                return data.msg;
            }
            }
        });

        $('#address').editable({
            inputclass: 'form-control',
            success: function(data) {
            if (data.success != true) {
                return data.msg;
            }
            }
        });

        $('#maintenance_status').editable({
            inputclass: 'form-control-sm',
            source: [
                    {value: 'Y', text: 'Y'},
                    {value: 'N', text: 'N'}
                ],
            success: function(data) {
                if (data.success != true) {
                return data.msg;
                }
            }
        });

        $('#encryption_key').editable({
            inputclass: 'form-control-sm',
            success: function(data) {
            if (data.success != true) {
            return data.msg;
            }
        }
        });

        $('#encryption_url').editable({
            inputclass: 'form-control-sm',
            source: [
                    {value: "TRUE", text: 'Y'},
                    {value: "FALSE", text: 'N'}
                ],
            success: function(data) {
            if (data.success != true) {
            return data.msg;
            }
        }
        });

        $('#enable_hooks').editable({
            inputclass: 'form-control select-single',
            source: [
                    {value: "TRUE", text: 'Y'},
                    {value: "FALSE", text: 'N'}
                ],
            success: function(data) {
                if (data.success != true) {
                return data.msg;
                }
            }
        });

        $('#url_suffix').editable({
            inputclass: 'form-control-sm',
            success: function(data ,newValue) {
            if (data.success != true) {
            return data.msg;
            }else {
            location.href='<?=base_url()?><?=ADMIN_ROUTE?>/setting'+newValue;
            }
        }
        });

        $('#route_admin').editable({
            inputclass: 'form-control-sm',
            success: function(data ,newValue) {
            if (data.success != true) {
            return data.msg;
            }else {
            location.href='<?=base_url()?>'+data.value+"/setting<?=$this->config->item("url_suffix")?>";
            }
        }
        });

        $('#route_login').editable({
            inputclass: 'form-control-sm',
            success: function(data ,newValue) {
            if (data.success != true) {
            return data.msg;
            }
        }
        });

        $('#max_upload').editable({
            inputclass: 'form-control-sm',
            success: function(data) {
            if (data.success != true) {
            return data.msg;
            }
        }
        });


        $('#user_log_status').editable({
            inputclass: 'form-control-sm',
            source: [
                    {value: 'Y', text: 'Y'},
                    {value: 'N', text: 'N'}
                ],
            success: function(data) {
            if (data.success != true) {
            return data.msg;
            }
        }
        });

        $('#language').editable({
            inputclass: 'form-control-sm',
            source: [
                    {value: 'indonesia', text: 'indonesia'},
                    {value: 'english', text: 'english'}
                ],
            success: function(data) {
            if (data.success != true) {
            return data.msg;
            }
        }
        });


        $('#time_zone').editable({
            inputclass: 'form-control select-single',
            source: <?=$time_zone?>,
            success: function(data) {
            if (data.success != true) {
            return data.msg;
            }
        }
        });

    });
</script>


