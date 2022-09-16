
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

                                        <!-- feature -->
                                        <li class="nav-item font-weight-bold">
                                            <a class="nav-link" id="feature-tab" data-toggle="tab" href="#feature" role="tab"
                                                aria-controls="feature" aria-selected="false"> <?= ucfirst('feature')?></a>
                                        </li>

                                        <!-- lokasi -->
                                        <li class="nav-item font-weight-bold">
                                            <a class="nav-link" id="lokasi-tab" data-toggle="tab" href="#lokasi" role="tab"
                                                aria-controls="lokasi" aria-selected="false"> <?= ucfirst('lokasi')?></a>
                                        </li>


                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">

                                        <!-- Details -->
                                        <div class="tab-pane fade show active" id="defaults" role="tabpanel" aria-labelledby="first-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td class="table-title">Properti Title</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_title" class="form-control" type="text"  id="properties_title"
                                                                    value="<?= set_value('properties_title'); ?>" required>
                                                                    <span>Properti Title</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Harga</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_harga" class="form-control" type="text" id="properties_harga"
                                                                    value="<?= set_value('properties_harga'); ?>" required>
                                                                    <span>Harga</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Luas Tanah</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_luas_tanah" class="form-control" type="text"  id="properties_luas_tanah"
                                                                    value="<?= set_value('properties_luas_tanah'); ?>" required>
                                                                    <span>Luas Tanah</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Luas Bangunan</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_luas_bangunan" class="form-control" type="text"  id="properties_luas_bangunan"
                                                                    value="<?= set_value('properties_luas_bangunan'); ?>" required>
                                                                    <span>Luas Bangunan</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Jumlah Lantai</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_jumlah_lantai" class="form-control" type="text"  id="properties_jumlah_lantai"
                                                                    value="<?= set_value('properties_jumlah_lantai'); ?>" required>
                                                                    <span>Jumlah Lantai</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Kamar Tidur</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_kamar_tidur" class="form-control" type="text"  id="properties_kamar_tidur"
                                                                    value="<?= set_value('properties_kamar_tidur'); ?>">
                                                                    <span>Kamar Tidur</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Kamar Mandi</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_kamar_mandi" class="form-control" type="text"  id="properties_kamar_mandi"
                                                                    value="<?= set_value('properties_kamar_mandi'); ?>">
                                                                    <span>Kamar Mandi</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Kamar Tidur Pembantu</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_kamar_tidur_p" class="form-control" type="text"  id="properties_kamar_tidur_p"
                                                                    value="<?= set_value('properties_kamar_tidur_p'); ?>">
                                                                    <span>Kamar Tidur Pembantu</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Toilet Pembantu</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_kamar_mandi_p" class="form-control" type="text"  id="properties_kamar_mandi_p"
                                                                    value="<?= set_value('properties_kamar_mandi_p'); ?>">
                                                                    <span>Toilet Pembantu</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Garasi</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_garasi" class="form-control" type="text"  id="properties_garasi"
                                                                    value="<?= set_value('properties_garasi'); ?>">
                                                                    <span>Garasi</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-title">Dapur</td>
                                                            <td>
                                                                <label class="form-group has-float-label">
                                                                    <input name="properties_dapur" class="form-control" type="text"  id="properties_dapur"
                                                                    value="<?= set_value('properties_dapur'); ?>">
                                                                    <span>Dapur</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <hr>

                                                    <div class="form-row">
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <select class="form-control" name="properties_kondisi_bangunan" required="">
                                                                <option value=""> -- Kondisi Bangunan --</option>
                                                                <option value="Baru">Baru</option>
                                                                <option value="Lama">Lama</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <select class="form-control" name="properties_tipe_market" required="">
                                                                <option value=""> -- Tipe Market --</option>
                                                                <option value="Primary">Primary</option>
                                                                <option value="Secondary">Secondary</option>
                                                                <option value="Apapun">Apapun</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <select class="form-control" name="properties_sertifikat" required="">
                                                                <option value=""> -- Sertifikat --</option>
                                                                <option value="SHM">SHM</option>
                                                                <option value="SHGB">SHGB  </option>
                                                                <option value="SGHU">SHGU</option>
                                                                <option value="AJB">AJB</option>
                                                                <option value="GIRIK">GIRIK</option>
                                                                <option value="LAINNYA">LAINNYA</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <input name="properties_listrik" placeholder="Listrik" class="form-control r-0 light s-12 " type="text" id="properties_listrik" value="<?= set_value('properties_listrik'); ?>">
                                                        </div>
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <input name="properties_sumber_air" placeholder="Sumber Air" class="form-control r-0 light s-12 " type="text" id="properties_sumber_air" value="<?= set_value('properties_sumber_air'); ?>">
                                                        </div>
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <input name="properties_masuk_mobil" placeholder="Apakah Masuk Mobil ?" class="form-control r-0 light s-12 " type="text" value="<?= set_value('properties_masuk_mobil'); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <input name="properties_bebas_banjir" placeholder="Bebas Banjir" class="form-control r-0 light s-12 " type="text" id="properties_bebas_banjir" value="<?= set_value('properties_bebas_banjir'); ?>">
                                                        </div>
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <input name="properties_internet" placeholder="Internet" class="form-control r-0 light s-12 " type="text" id="properties_internet" value="<?= set_value('properties_internet'); ?>">
                                                        </div>
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <input name="properties_ac" placeholder="Pendingin Ruangan (AC)" class="form-control r-0 light s-12 " type="text" id="properties_ac" value="<?= set_value('properties_ac'); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <input name="properties_line_telpon" placeholder="Line Telpon" class="form-control r-0 light s-12 " type="text" id="properties_line_telpon" value="<?= set_value('properties_line_telpon'); ?>">
                                                        </div>
                                                        <div class="form-group col-4 m-0">
                                                            <label class="col-form-label s-12"></label>
                                                            <input name="properties_genset" placeholder="Genset" class="form-control r-0 light s-12 " type="text" id="properties_genset" value="<?= set_value('properties_genset'); ?>">
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="form-row">
                                                        <div class="form-group col-8 m-0">
                                                            <label class="col-form-label s-12"><b>Deskripsi / Detail</b> </label>
                                                            <div class="summernote-theme-3">
                                                                <textarea class="summernote form-control" name="properties_deskripsi">
                                                                <?= set_value('properties_deskripsi'); ?>
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="card-body" id="blah">
                                                        <h5 class="mb-4">Dropzone</h5>
                                                        <input type="file"
                                                            name="itemimage[]"
                                                            class="image-file"
                                                            multiple=""
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
                                        </div>

                                        <!-- Feature -->
                                        <div class="tab-pane fade" id="feature" role="tabpanel" aria-labelledby="feature-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                        <h5 class="with-border m-t-lg"><b>Tipe Properti</b></h5>
                                                        <div class="row m-t-lg">
                                                            <?php foreach ($tipe as $dataTipe) { ?>
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="custom-control custom-radio">
                                                                        <input class="custom-control-input" value="<?= $dataTipe['id_tipe']; ?>" type="radio" name="properties_tipe"  id="tipe-<?= $dataTipe['id_tipe']; ?>" <?= ($dataTipe['id_tipe']=='1')?'checked':''; ?> >
                                                                        <label class="custom-control-label" for="tipe-<?= $dataTipe['id_tipe']; ?>"><?= $dataTipe['nama']; ?></label>
                                                                    </div>
                                                                </div>

                                                            <?php } ?>

                                                        </div>

                                                        <hr>
                                                        <h5 class="with-border m-t-lg"><b>Aksebilitas</b></h5>
                                                        <div class="row m-t-lg">
                                                            <?php foreach ($aksebilitas as $dataAks) { ?>
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input class="custom-control-input" value="<?= $dataAks['id_aksebilitas']; ?>" type="checkbox" name="properties_aksebilitas[]" id="check-toggle-<?= $dataAks['id_aksebilitas']; ?>" checked="">
                                                                        <label class="custom-control-label" for="check-toggle-<?= $dataAks['id_aksebilitas']; ?>"> <?= $dataAks['nama']; ?></label>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>

                                                        <hr>


                                                        <h5 class="with-border m-t-lg"><b>Fasilitas</b></h5>
                                                        <div class="row m-t-lg">

                                                            <?php foreach ($fasilitas as $dataFas) { ?>
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="checkbox-toggle">
                                                                        <input value="<?= $dataFas['id_fasilitas']; ?>" type="checkbox" name="properties_fasilitas[]" id="check-toggle-<?= $dataFas['id_fasilitas']; ?>" checked="">
                                                                        <label for="check-toggle-<?= $dataFas['id_fasilitas']; ?>"> <?= $dataFas['nama']; ?></label>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Lokasi -->
                                        <div class="tab-pane fade" id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
                                            <h5 class="card-title"><b>Alamat Lengkap</b></h5>
                                            <div class="form-row m-2">
                                                <div class="form-group">
                                                    <textarea name="properties_alamat" class="form-control" cols="30" rows="4"
                                                    id="properties_alamat"><?= set_value('properties_alamat'); ?></textarea>
                                                </div>
                                            </div>

                                            <hr>

                                            <h5 class="card-title"><b>Area / Lokasi</b></h5>
                                            <div class="form-row">
                                                <div class="form-group col-3 m-0">
                                                    <label class="col-form-label s-12">Provinsi</label>
                                                    <select name="properties_provinsi" id="provinsi_id" class="form-control select2" >
                                                        <option value=""> --Select-- </option>
                                                        <?php foreach ($provinsi as $dataProvinsi) { ?>
                                                            <option value="<?php echo $dataProvinsi['id'] ?>" ><?php echo $dataProvinsi['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-3 m-0">
                                                    <label class="col-form-label s-12">Kota</label>
                                                    <select name="properties_kota" id="kota" class="form-control select2" >
                                                        <option value=""> --Select -- </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-3 m-0">
                                                    <label class="col-form-label s-12">Kabupaten</label>
                                                    <select name="properties_kabupaten" id="kabupaten" class="form-control select2" >
                                                        <option value=""> --Select -- </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-3 m-0">
                                                    <label class="col-form-label s-12">Kecamatan</label>
                                                    <select name="properties_kecamatan" id="kecamatan" class="form-control select2" >
                                                        <option value=""> --Select-- </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

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
                                        <label class="col-12 col-form-label">Tipe Jual</label>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" value="Dijual" type="radio" name="properties_tipe_jual"  id="tipe-jual" checked>
                                                <label class="custom-control-label" for="tipe-jual">Dijual</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" value="Disewa" type="radio" name="properties_tipe_jual"  id="tipe-sewa">
                                                <label class="custom-control-label" for="tipe-sewa">Disewa</label>
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

                                    <div class="form-group row mb-1">
                                        <label class="col-12 col-form-label">Featured</label>
                                        <div class="col-12">
                                            <div class="custom-switch custom-switch-primary mb-2">
                                                <input name="featured" value="1" class="custom-switch-input" id="Featured" type="checkbox">
                                                <label class="custom-switch-btn" for="Featured"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-1">
                                        <label class="col-12 col-form-label">Posting</label>
                                        <div class="col-12">
                                            <div class="custom-switch custom-switch-primary mb-2">
                                                <input name="properties_active" value="1" class="custom-switch-input" id="Posting" type="checkbox" checked>
                                                <label class="custom-switch-btn" for="Posting"></label>
                                            </div>
                                        </div>
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
                    $('<div class="pip col-sm-3 col-4 boxDiv" align="center" style="margin-bottom: 20px;">' +
                    '<img name="thumb[]" style="width: 120px; height: 100px;" src="' + e.target.result + '" class="prescriptions">'+
                    '<p style="word-break: break-all;">' + value.name + '</p>'+
                    '<p class="cross-image remove btn btn-warning"><i class="fa fa-trash"></i> Remove</p>'+
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

<script type="text/javascript">
    $('document').ready(function(e){
        $('.upload-image').click(function(e){
            var imageDiv = $(".boxDiv").length;
            if(imageDiv == ''){
                alert('Please upload image'); // Check here image selected or not
                return false;
            }
            else if(imageDiv > 3){
                alert('You can upload only 3 images'); //You can select only 3 images at a time to upload
                return false;
            }
            else if(imageDiv != '' && imageDiv <= 3){ // image should not be blank or not greater than 3
                $("#upload_image").submit();
            }
        });
    });
</script>