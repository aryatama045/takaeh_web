

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
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th><p class="text-muted text-small">Tempat Tanggal Lahir</p></th>
                                                            <td></td>
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

