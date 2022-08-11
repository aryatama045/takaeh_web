

<link rel="stylesheet" href="<?=base_url()?>themes/admin/vendor/xeditable/bootstrap-editable.css">


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

                                    <!-- Default -->
                                    <li class="nav-item font-weight-bold">
                                        <a class="nav-link active" id="firsts-tab" data-toggle="tab" href="#firsts" role="tab"
                                            aria-controls="firsts" aria-selected="true">Defaults</a>
                                    </li>

                                    <!-- pengalaman -->
                                    <li class="nav-item font-weight-bold">
                                        <a class="nav-link" id="pengalaman-tab" data-toggle="tab" href="#pengalaman" role="tab"
                                            aria-controls="pengalaman" aria-selected="false"> Pengalaman</a>
                                    </li>

                                    <!-- dokumen -->
                                    <li class="nav-item font-weight-bold">
                                        <a class="nav-link" id="dokumen-tab" data-toggle="tab" href="#dokumen" role="tab"
                                            aria-controls="dokumen" aria-selected="false"> Dokumen</a>
                                    </li>

                                    <!-- penilaian -->
                                    <li class="nav-item font-weight-bold">
                                        <a class="nav-link" id="penilaian-tab" data-toggle="tab" href="#penilaian" role="tab"
                                            aria-controls="penilaian" aria-selected="false"> Penilaian</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">

                                    <!-- Details -->
                                    <div class="tab-pane fade show active" id="firsts" role="tabpanel" aria-labelledby="first-tab">
                                        <!-- Biodata -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td class="table-title"><?=cclang("title")?> Web/App</td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="web_name" data-url="<?= base_url("setting/update_action")?>" data-type="text" data-pk="1" class="editable editable-click" title="Edit"><?=setting('web_name')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title">Url/Domain</td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="web_domain" data-url="<?= base_url("setting/update_action")?>" data-type="text" data-pk="2" class="editable editable-click" title="Edit"><?=setting('web_domain')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title"><?=cclang("owner")?></td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="web_owner" data-url="<?= base_url("setting/update_action")?>" data-type="text" data-pk="3" class="editable editable-click" title="Edit"><?=setting('web_owner')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title">Email</td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="email" data-url="<?= base_url("setting/update_action")?>" data-type="text" data-pk="4" class="editable editable-click" title="Edit"><?=setting('email')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title"><?=cclang("phone")?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" id="telepon" data-url="<?= base_url("setting/update_action")?>" data-type="text" data-pk="5" class="editable editable-click" title="Edit"><?=setting('telepon')?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="table-title"><?=cclang("address")?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" id="address" data-url="<?= base_url("setting/update_action")?>" data-type="textarea" data-rows="4"  data-pk="6" class="editable editable-click" title="Edit"><?=setting('address')?></a>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div> <hr>

                                        <!-- Data Keluarga -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="font-weight-bold">Data Keluarga</h4>
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Hubungan</th>
                                                            <th scope="col">Tgl Lahir</th>
                                                            <th scope="col">Alamat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- <?php $no=1;?>
                                                            <?php if(empty($keluarga) || $keluarga == NULL || $keluarga == ""){?>
                                                                <tr><td colspan="5" class="text-center">Tidak ada data</td></tr>
                                                            <?php } else {   foreach($keluarga as $dk) {?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $dk['nama'] ?></td>
                                                                    <td><?= $dk['hubungan'] ?></td>
                                                                    <td><?= $dk['tgl_lahir'] ?></td>
                                                                    <td><?= $dk['alamat'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?> -->

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> <hr>

                                    </div>

                                    <!-- Pengalaman -->
                                    <div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">

                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Perusahaan</th>
                                                    <th scope="col">Jabatan</th>
                                                    <th scope="col">Lama Bekerja</th>
                                                    <th scope="col">Bagian</th>
                                                    <th scope="col">Penghargaan</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $no=1;?>
                                                    <?php if(empty($pengalaman) || $pengalaman == NULL || $pengalaman == ""){?>
                                                        <tr><td colspan="7" class="text-center">Tidak ada data</td></tr>
                                                    <?php } else {   foreach($pengalaman as $dk) {?>
                                                        <tr>
                                                            <th scope="row"><?= $no++; ?></th>
                                                            <td><?= $dk['nama_perusahaan'] ?></td>
                                                            <td><?= $dk['jabatan'] ?></td>
                                                            <td><?= $dk['lama_krj_thn'] ?></td>
                                                            <td><?= $dk['bagian'] ?></td>
                                                            <td><?= $dk['penghargaan'] ?></td>
                                                            <td><?= $dk['keterangan'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>

                                            </tbody>
                                        </table>

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
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>themes/admin/vendor/xeditable/bootstrap-editable.min.js"></script>


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
        inputclass: 'form-control-sm',
        success: function(data) {
            if (data.success != true) {
            return data.msg;
            }
        }
        });

        $('#web_domain').editable({
        inputclass: 'form-control-sm',
        success: function(data) {
        if (data.success != true) {
            return data.msg;
        }
        }
        });


        $('#web_owner').editable({
        inputclass: 'form-control-sm',
        success: function(data) {
        if (data.success != true) {
            return data.msg;
        }
        }
        });

        $('#telepon').editable({
        inputclass: 'form-control-sm',
        success: function(data) {
        if (data.success != true) {
            return data.msg;
        }
        }
        });

        $('#email').editable({
        inputclass: 'form-control-sm',
        success: function(data) {
        if (data.success != true) {
            return data.msg;
        }
        }
        });

        $('#address').editable({
        inputclass: 'form-control-sm',
        success: function(data) {
        if (data.success != true) {
            return data.msg;
        }
        }
        });

    });
</script>

