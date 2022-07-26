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
</style>

<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h2>Properties</h2>
                    </div>
                </div>
            </div>
        </header>

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
                
        <?php echo form_open_multipart('propertis/properti/tambah', array('class' => 'form-horizontal', 'name' => 'add_name', 'id' => 'add_name')); ?>
            
            <div class="card no-b  no-r">
                <div class="card-body">
                <div class="card-body">
                    <h5 class="with-border m-t-lg"><b>Detail Properti</b></h5>
                    <div class="form-row">
                        <div class="col-md-8">
                            <div class="form-group m-0">
                                <label class="col-form-label s-12">Nama Properti</label>
                                <input name="properties_title" placeholder="Nama Properti" class="form-control r-0 light s-12 " type="text"  id="properties_title" 
                                value="<?= $data['properties_title'] ?>" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Luas Tanah</label>
                                    <input name="properties_luas_tanah" placeholder="Luas Tanah" class="form-control r-0 light s-12 " type="text" id="properties_luas_tanah" value="<?= set_value('properties_luas_tanah'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Luas Bangunan</label>
                                    <input name="properties_luas_bangunan" placeholder="Luas Bangunan" class="form-control r-0 light s-12 " type="text" id="properties_luas_bangunan" value="<?= set_value('properties_luas_bangunan'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Kamar Tidur</label>
                                    <input name="properties_kamar_tidur" placeholder="Kamar Tidur" class="form-control r-0 light s-12 " type="text" id="properties_kamar_tidur" value="<?= set_value('properties_kamar_tidur'); ?>">
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Kamar Mandi</label>
                                    <input name="properties_kamar_mandi" placeholder="Kamar Mandi" class="form-control r-0 light s-12 " type="text" id="properties_kamar_mandi" value="<?= set_value('properties_kamar_mandi'); ?>">
                                </div>
                                
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Kamar Mandi Pembantu</label>
                                    <input name="properties_kamar_mandi_p" placeholder="Kamar Mandi Pembantu" class="form-control r-0 light s-12 " type="text" id="properties_kamar_mandi_p" value="<?= set_value('properties_kamar_mandi_p'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Kamar Tidur Pembantu</label>
                                    <input name="properties_kamar_tidur_p" placeholder="Kamar Tidur Pembantu" class="form-control r-0 light s-12 " type="text" id="properties_kamar_tidur_p" value="<?= set_value('properties_kamar_tidur_p'); ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Garasi / Carport</label>
                                    <input name="properties_garasi" placeholder="Garasi / Carport" class="form-control r-0 light s-12 " type="text" id="properties_garasi" value="<?= set_value('properties_garasi'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Dapur</label>
                                    <input name="properties_dapur" placeholder="Jumlah Dapur" class="form-control r-0 light s-12 " type="text" id="properties_dapur" value="<?= set_value('properties_dapur'); ?>">
                                </div>
                                
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Listrik</label>
                                    <input name="properties_listrik" placeholder="Listrik" class="form-control r-0 light s-12 " type="text" id="properties_listrik" value="<?= set_value('properties_listrik'); ?>">
                                </div>
                            </div>

                            <hr>
                            <div class="form-row">
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Kondisi Bangunan</label>
                                    <select class="form-control" name="properties_kondisi_bangunan" required="">
                                        <option value=""> -- Select --</option>
                                        <option value="Baru">Baru</option>
                                        <option value="Lama">Lama</option>
                                    </select>
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Tipe Market</label>
                                    <select class="form-control" name="properties_tipe_market" required="">
                                        <option value=""> -- Select --</option>
                                        <option value="Primary">Primary</option>
                                        <option value="Secondary">Secondary</option>
                                        <option value="Apapun">Apapun</option>
                                    </select>
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12">Sertifikat</label>
                                    <select class="form-control" name="properties_sertifikat" required="">
                                        <option value=""> -- Select --</option>
                                        <option value="SHM">SHM</option>
                                        <option value="SHGB">SHGB  </option>
                                        <option value="SGHU">SHGU</option>
                                        <option value="AJB">AJB</option>
                                        <option value="GIRIK">GIRIK</option>
                                        <option value="LAINNYA">LAINNYA</option>
                                    </select>
                                </div>
                            </div>

                            <hr> 
                            <div class="form-row">
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Jumlah Lantai</b></label>
                                    <input name="properties_jumlah_lantai" placeholder="Jumlah Lantai" class="form-control r-0 light s-12 " type="text" id="properties_jumlah_lantai" value="<?= set_value('properties_jumlah_lantai'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Sumber Air</b></label>
                                    <input name="properties_sumber_air" placeholder="Sumber Air" class="form-control r-0 light s-12 " type="text" id="properties_sumber_air" value="<?= set_value('properties_sumber_air'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Apakah Masuk Mobil ?</b></label>
                                    <input name="properties_masuk_mobil" placeholder="Apakah Masuk Mobil ?" class="form-control r-0 light s-12 " type="text" value="<?= set_value('properties_masuk_mobil'); ?>">
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Bebas Banjir ?</b></label>
                                    <input name="properties_bebas_banjir" placeholder="Bebas Banjir" class="form-control r-0 light s-12 " type="text" id="properties_bebas_banjir" value="<?= set_value('properties_bebas_banjir'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Internet</b></label>
                                    <input name="properties_internet" placeholder="Internet" class="form-control r-0 light s-12 " type="text" id="properties_internet" value="<?= set_value('properties_internet'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Pendingin Ruangan (AC)</b></label>
                                    <input name="properties_ac" placeholder="AC" class="form-control r-0 light s-12 " type="text" id="properties_ac" value="<?= set_value('properties_ac'); ?>">
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Line Telpon</b></label>
                                    <input name="properties_line_telpon" placeholder="Line Telpon" class="form-control r-0 light s-12 " type="text" id="properties_line_telpon" value="<?= set_value('properties_line_telpon'); ?>">
                                </div>
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Genset</b></label>
                                    <input name="properties_genset" placeholder="Genset" class="form-control r-0 light s-12 " type="text" id="properties_genset" value="<?= set_value('properties_genset'); ?>">
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4 m-0">
                                    <label class="col-form-label s-12"><b>Harga</b></label>
                                    <input name="properties_harga" placeholder="Harga" class="form-control r-0 light s-12 " type="text" id="properties_harga" value="<?= set_value('properties_harga'); ?>">
                                        
                                        
                                </div>   
                                <div class="col-md-2">
                                    <label class="col-form-label s-12"><b>.</b></label>
                                    <label class="btn">
                                            <input type="checkbox" name="properties_nego"  value="1" > Nego
                                        </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img style="width:150px;height:auto;" src="<?= base_url('www/uploads/properties/'.$data['properties_cover']) ?>" alt="">

                            <fieldset class="form-group">
                                <label class="form-label"><b>Photo</b></label>
                                <input type="file" name="userfile" id="file" class="inputfile inputfile-1 bg-primary" /><br>
                                <small class="text-danger">
                                    <em>Allowed file is PNG, JPG, JPEG &amp; GIF / Max File 1 mb</em>
                                </small>
                            </fieldset>
                            <div id="imagePreview"> 
                                <small class="text-danger"> Ukuran 760 x 389 </small> 
                            </div> 
                            <hr>
                            <h5 class="with-border m-t-lg">Detail Photo</h5>
                            <input type="file" class="btn btn-default btn-file" name="userfile2[]"  multiple="multiple" required="">
                            <div class="form-row">
                                <div class="form-group col-9 m-0">
                                <table class="table" id="dynamic_field">
                                    <tbody>
                                      <tr id="row" name="id">
                                       <!--  <td><input name="photo_cover[]" type="text" class="form-control r-0 light s-12" placeholder="cover"></td>
                                       <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah</button></td> -->
                                      </tr>
                                    </tbody> 
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-9 m-0">
                            <label class="col-form-label s-12"><b>Deskripsi / Detail</b> </label>
                            <div class="summernote-theme-3">
                                <textarea class="summernote form-control" name="properties_deskripsi"><?= set_value('properties_deskripsi'); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="form-group col-9">
                            <label class="col-form-label s-12">Kondisi</label>
                            <select class="select2" multiple="multiple" name="properties_kondisi[]">
                                <?php foreach ($kondisi as $dataKondisi) { ?>
                                    <option value="<?php echo $dataKondisi['kondisi'] ?>"><?php echo $dataKondisi['kondisi'] ?></option>
                                <?php } ?>
                            </select>
                            <a href="#" class="btn btn-primary bg-primary btn-sm mt-2">Add New Kondisi</a>
                        </div>
                    </div> -->
                </div> 

                <hr>

                <div class="form-row">
                    
                    <div class="col-md-6">
                        <h5 class="with-border m-t-lg"><b>Tipe Properti</b></h5>
                        <div class="row m-t-lg">

                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Rumah" type="radio" name="properties_tipe"  id="tipe-1" checked>
                                    <label for="tipe-1">Rumah</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Apartment" type="radio" name="properties_tipe"  id="tipe-2" >
                                    <label for="tipe-2">Apartment</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Tanah" type="radio" name="properties_tipe"  id="tipe-3">
                                    <label for="tipe-3">Tanah</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Gudang" type="radio" name="properties_tipe"  id="tipe-4">
                                    <label for="tipe-4">Gudang</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Rukan" type="radio" name="properties_tipe"  id="tipe-5">
                                    <label for="tipe-5">Rukan</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Gedung" type="radio" name="properties_tipe"  id="tipe-6">
                                    <label for="tipe-6">Gedung</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Kostan" type="radio" name="properties_tipe"  id="tipe-7">
                                    <label for="tipe-7">Kostan</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Villa" type="radio" name="properties_tipe"  id="tipe-8">
                                    <label for="tipe-8">Villa</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Condomonium" type="radio" name="properties_tipe"  id="tipe-9">
                                    <label for="tipe-9">Condomonium</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Kontrakan" type="radio" name="properties_tipe"  id="tipe-10">
                                    <label for="tipe-10">Kontrakan</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Ruko" type="radio" name="properties_tipe"  id="tipe-11">
                                    <label for="tipe-11">Ruko</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Condotel" type="radio" name="properties_tipe"  id="tipe-12">
                                    <label for="tipe-12">Condotel</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Pabrik" type="radio" name="properties_tipe"  id="tipe-13">
                                    <label for="tipe-13">Pabrik</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="Lainnya" type="radio" name="properties_tipe"  id="tipe-14">
                                    <label for="tipe-14">Lainnya</label>
                                </div>
                            </div>

                        </div>
                        
                    </div>                       
                    <div class="col-md-6">
                        <h5 class="with-border m-t-lg"><b>Aksebilitas</b></h5>
                        <div class="row m-t-lg">

                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="1" name="properties_aksebilitas[]" type="checkbox" id="check-bird-1" checked>
                                    <label for="check-bird-1">Jalan Tol</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="2" name="properties_aksebilitas[]" type="checkbox" id="check-bird-2">
                                    <label for="check-bird-2">Stasiun KRL</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="3" name="properties_aksebilitas[]" type="checkbox" id="check-bird-3">
                                    <label for="check-bird-3">Stasiun MRT</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="4" name="properties_aksebilitas[]" type="checkbox" id="check-bird-4">
                                    <label for="check-bird-4">Halte Busway</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-bird">
                                    <input value="5" name="properties_aksebilitas[]" type="checkbox" id="check-bird-5">
                                    <label for="check-bird-5">Angkutan Umum</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!-- <div class="col-md-7">
                        <h5 class="with-border m-t-lg"><b>Fasilitas</b></h5>
                        <div class="row m-t-lg">
                            <?php foreach ($datafasilitas as $dataFasilitas) { ?>
                                

                                <div class="col-md-3 col-sm-6">
                                    <div class="checkbox-toggle">
                                        <input value="<?php echo $dataFasilitas->id; ?>" type="checkbox" name="properties_fasilitas[]" id="check-toggle-<?php echo $dataFasilitas->id; ?>" checked="">
                                        <label for="check-toggle-<?php echo $dataFasilitas->id; ?>"><?php echo $dataFasilitas->nama_fasilitas; ?></label>
                                    </div>
                                </div>

                            <?php } ?>

                            

                        </div>
                    </div> -->
                </div> 
                                        
                </div>
                        
                <hr>

                <div class="card-body">
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
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-12 m-0">
                            <label class="with-border m-t-lg">Alamat Lengkap </label>
                            <textarea name="properties_alamat" class="form-control" cols="30" rows="4" id="properties_alamat"><?= set_value('properties_alamat'); ?></textarea>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-12 m-0">
                            <label class="with-border m-t-lg">Video Embed </label>
                            <input name="properties_video" placeholder="Vide URL " class="form-control " type="text" id="properties_video" >
                        </div>
                    </div>
                    
                </div>  


                <hr>


                <div class="card-body">
                    <div class="form-row">                
                        
                        <div class="col-3">
                            <h5 class="with-border m-t-lg">Tipe Jual</h5>
                            <div class="checkbox-detailed">
                                <input value="Dijual" type="radio" name="properties_tipe_jual" id="check-det-1" checked/>
                                <label for="check-det-1">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title"> Dijual</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                            <div class="checkbox-detailed">
                                <input value="Disewa" type="radio" name="properties_tipe_jual" id="check-det-2"/>
                                <label for="check-det-2">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title"> Disewa</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <h5 class="card-title">Status Release</h5>
                            <div class="checkbox-detailed">
                                <input value="1" type="radio" name="properties_active" id="check-det-1" checked/>
                                <label for="check-det-1">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Publish</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                            <div class="checkbox-detailed">
                                <input value="0" type="radio" name="properties_active" id="check-det-2"/>
                                <label for="check-det-2">
                                <span class="checkbox-detailed-tbl">
                                    <span class="checkbox-detailed-cell">
                                        <span class="checkbox-detailed-title">Draft</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                </div>
            </div>
        <?php echo form_close(); ?> 
      

    </div>

   
</div>


<script type="text/javascript">
    window.base_url = '<?php echo base_url() ?>';
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<?php echo $this->load->assetsadmin('properti', 'tambah', 'js');  ?>