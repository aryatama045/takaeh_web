

<div class="row">
    <div class="col-12">
        <h1> Detail Karyawan</h1>
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
                        <div class="card mb-4" style=" position: -webkit-sticky;position: sticky;top: 6rem;">
                            <div class="card-body">
                                <div class="d-flex flex-row mb-3">
                                    <a class="d-block position-relative" href="#">
                                        <?php
                                            $filejpg = FCPATH.'upload/poto_karyawan/'.$biodata['nip'].'.jpg';
                                            $filepng = FCPATH.'upload/poto_karyawan/'.$biodata['nip'].'.png';


                                            if(is_file($filejpg) )  { ?>
                                            <img src="<?= base_url('upload/poto_karyawan/'.$biodata['nip'].'.jpg') ?>" class="img-thumbnail border-0  mb-4 list-thumbnail mx-auto">

                                        <?php } elseif(is_file($filepng) ) { ?>
                                            <img src="<?= base_url('upload/poto_karyawan/'.$biodata['nip'].'.png') ?>" class="img-thumbnail border-0  mb-4 list-thumbnail mx-auto">

                                        <?php } else { ?>
                                            <img src="https://place-hold.it/100x100/666/fff.png?text=Not%20Found" class="img-thumbnail border-0  mb-4 list-thumbnail mx-auto">


                                        <?php } ?>
                                    </a>
                                    <div class="pl-3 pt-2 pr-2 pb-2">
                                        <p class="list-item-heading font-weight-bold">
                                            <?= $biodata['nip'] ?> <br> <?= $biodata['nama_lengkap'] ?>
                                        </p>
                                    </div>
                                </div>
                                <p class="text-muted mb-1"> Dept</p>
                                <p class="mb-1"> <?= $biodata['nama_dept'] ?></p>

                                <p class="text-muted mb-1"> Divisi</p>
                                <p class="mb-3"> <?= $biodata['kode_divisi'] ?></p>

                                <p class="text-muted mb-1"> Store</p>
                                <p class="mb-3"> <?= $biodata['kd_store'] ?></p>

                                <table hidden class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Bagian</th>
                                            <th scope="col">Lama Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- <?php $no=1;?>
                                            <?php if(empty($dataot) || $dataot == NULL || $dataot == ""){?>
                                                <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                                            <?php } else {   foreach($dataot as $dk) {?>
                                                <tr>
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $dk['bagian'] ?></td>
                                                    <td><?= $dk['lama_krj_thn'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?> -->

                                    </tbody>
                                </table>


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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-8 col-right">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs " role="tablist">

                                    <!-- Detail -->
                                    <li class="nav-item font-weight-bold">
                                        <a class="nav-link active" id="firsts-tab" data-toggle="tab" href="#firsts" role="tab"
                                            aria-controls="firsts" aria-selected="true">Details</a>
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
                                                <h4 class="font-weight-bold">Biodata</h4>
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Nama Lengkap</p></th>
                                                            <td><p class="font-weight-bold text-small"> Test</p></td>
                                                        </tr>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Tempat Tanggal Lahir</p></th>
                                                            <td><?= $biodata['tempat_lahir'] ?> , <?= date('d-m-Y', strtotime($biodata['tgl_lahir'])) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Status</p></th>
                                                            <td><?= $biodata['status_menikah'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Gender</p></th>
                                                            <td><?= $biodata['gender'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Etnis</p></th>
                                                            <td><?= $biodata['etnis'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Alamat</p></th>
                                                            <td><?= $biodata['alamat_npwp'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Email</p></th>
                                                            <td><?= $biodata['email'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Kontak</p></th>
                                                            <td><ul class="list-unstyled">
                                                                    <li>HP : <?= $biodata['no_hp'] ?></li>
                                                                    <li>TELP : <?= $biodata['telp'] ?></li>
                                                                </ul></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div> <hr>

                                        <!-- Data Pendidikan -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="font-weight-bold">Data Pendidikan</h4>
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Lembaga</th>
                                                            <th scope="col">Jurusan</th>
                                                            <th scope="col">Tahun Lulus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- <?php $no=1;?>
                                                            <?php if(empty($pendidikan) || $pendidikan == NULL || $pendidikan == ""){?>
                                                                <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
                                                            <?php } else {   foreach($pendidikan as $dk) {?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $dk['lembaga'] ?></td>
                                                                    <td><?= $dk['jurusan'] ?></td>
                                                                    <td><?= $dk['tahun_lulus'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?> -->

                                                    </tbody>
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

                                    <!-- Dokumen -->
                                    <div class="tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab">
                                        <div class="mb-4">
                                            <h4 class="font-weight-bold">Data Dokumen</h4>
                                            <table class="table table-borderless ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Kode</th>
                                                        <th scope="col">No. Dok</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no=1;?>
                                                        <?php if(empty($dokumen) || $dokumen == NULL || $dokumen == ""){?>
                                                            <tr><td colspan="6" class="text-center">Tidak ada data</td></tr>
                                                        <?php } else {   foreach($dokumen as $dk) {?>
                                                            <tr>
                                                                <td scope="row"><?= $no++; ?></td>
                                                                <td><?= $dk['kode_dok'] ?></td>
                                                                <td><?= $dk['no_dok'] ?></td>
                                                                <td><?= $dk['tgl_dok'] ?></td>
                                                                <td><?= $dk['status_dok'] ?></td>
                                                                <td><?= $dk['keterangan'] ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                            <hr>
                                        </div>

                                        <div class="mb-4">
                                            <h4 class="font-weight-bold">Surat</h4>
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">No Surat</th>
                                                        <th scope="col">Kode</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no=1;?>
                                                        <?php if(empty($surat) || $surat == NULL || $surat == ""){?>
                                                            <tr><td colspan="5" class="text-center">Tidak ada data</td></tr>
                                                        <?php } else {   foreach($surat as $dk) {?>
                                                        <tr>
                                                            <td scope="row"><?= $no++; ?></td>
                                                            <td><?= $dk['no_surat'] ?></td>
                                                            <td><?= $dk['kode_jenis_surat'] ?></td>
                                                            <td><?= $dk['tgl_surat'] ?></td>
                                                            <td><?= $dk['isi_surat'] ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                            <hr>
                                        </div>

                                    </div>

                                    <!-- Penilaian -->
                                    <div class="tab-pane fade" id="penilaian" role="tabpanel" aria-labelledby="penilaian-tab">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Bagian</th>
                                                    <th scope="col">Lama Kerja</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $no=1;?>
                                                    <?php if(empty($penilaian) || $penilaian == NULL || $penilaian == ""){?>
                                                        <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                                                    <?php } else {   foreach($penilaian as $dk) {?>
                                                        <tr>
                                                            <th scope="row"><?= $no++; ?></th>
                                                            <td><?= $dk['bagian'] ?></td>
                                                            <td><?= $dk['lama_krj_thn'] ?></td>
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

