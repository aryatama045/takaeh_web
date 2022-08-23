

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h1> <?= $title?> </h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Library</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $title?></li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 progress-banner">
                <div class="card-body justify-content-between d-flex flex-row align-items-center">
                    <div>
                        <i class="iconsminds-clock mr-2 text-white align-text-bottom d-inline-block"></i>
                        <div>
                            <p class="lead text-white"><?= $jml_pending ?> Posts</p>
                            <p class="text-small text-white">Pending for publish</p>
                        </div>
                    </div>

                    <div>
                        <div role="progressbar"
                            class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                            data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="<?= $jml_posting ?>" aria-valuemax="<?= $jml_properti ?>"
                            data-show-percent="false">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4 progress-banner">
                <div class="card-body justify-content-between d-flex flex-row align-items-center">
                    <div>
                        <i class="iconsminds-male mr-2 text-white align-text-bottom d-inline-block"></i>
                        <div>
                            <p class="lead text-white">4 Users</p>
                            <p class="text-small text-white">On approval process</p>
                        </div>
                    </div>
                    <div>
                        <div role="progressbar"
                            class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                            data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="4" aria-valuemax="6"
                            data-show-percent="false">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4 progress-banner">
                <a href="#" class="card-body justify-content-between d-flex flex-row align-items-center">
                    <div>
                        <i class="iconsminds-bell mr-2 text-white align-text-bottom d-inline-block"></i>
                        <div>
                            <p class="lead text-white">8 Alerts</p>
                            <p class="text-small text-white">Waiting for notice</p>
                        </div>
                    </div>
                    <div>
                        <div role="progressbar"
                            class="progress-bar-circle progress-bar-banner position-relative" data-color="white"
                            data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="8" aria-valuemax="10"
                            data-show-percent="false">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="icon-cards-row">
                <div class="glide dashboard-numbers">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-clock"></i>
                                        <p class="card-text mb-0">Pending Posts</p>
                                        <p class="lead text-center">16</p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-basket-coins"></i>
                                        <p class="card-text mb-0">Completed Posts</p>
                                        <p class="lead text-center">32</p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-arrow-refresh"></i>
                                        <p class="card-text mb-0">Categories</p>
                                        <p class="lead text-center">2</p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-mail-read"></i>
                                        <p class="card-text mb-0">New Comments</p>
                                        <p class="lead text-center">25</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Top Viewed Posts</h5>
                    <table class="data-table data-table-standard responsive nowrap"
                        data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data_view as $v) {
                                if($v['properties_view'] != Null) { ?>
                            <tr>
                                <td>
                                    <p class="list-item-heading" title="<?= $v['properties_title']?>"><?= character_limiter($v['properties_title'], '25') ?></p>
                                </td>
                                <td>
                                    <p class="text-muted"><?= $v['properties_view'] ?></p>
                                </td>
                            </tr>
                            <?php } } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4 border-bottom"><i class="simple-icon-grid"></i> Application</h5>

                        <div class="simple-line-icons">
                            <div class="glyph">
                                <div class="glyph-icon iconsminds-pie-chart-3"></div>
                                <div class="class-name">Budgeting</div>
                            </div>
                        </div>
                        <div class="simple-line-icons">
                            <a href="">
                            <div class="glyph">
                                <div class="glyph-icon iconsminds-envelope"></div>
                                <div class="class-name">E-Mail</div>
                            </div>
                            </a>
                        </div>
                        <div class="simple-line-icons">
                            <div class="glyph">
                                <div class="glyph-icon iconsminds-checkout"></div>
                                <div class="class-name">Puchashing</div>
                            </div>
                        </div>

                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tickets</h5>
                    <div class="scroll dashboard-list-with-user">
                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="https://placehold.co/300" alt="Mayra Sibley"
                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                            </a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-0 ">Mayra Sibley</p>
                                    <p class="text-muted mb-0 text-small">09.08.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="https://placehold.co/300" alt="Mimi Carreira"
                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                            </a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-0 ">Mimi Carreira</p>
                                    <p class="text-muted mb-0 text-small">05.08.2018 - 10:20</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="https://placehold.co/300" alt="Philip Nelms"
                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                            </a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-0 ">Philip Nelms</p>
                                    <p class="text-muted mb-0 text-small">05.08.2018 - 09:12</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="https://placehold.co/300" alt="Terese Threadgill"
                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                            </a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-0 ">Terese Threadgill</p>
                                    <p class="text-muted mb-0 text-small">01.08.2018 - 18:20</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="https://placehold.co/300" alt="Kathryn Mengel"
                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                            </a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-0 ">Kathryn Mengel</p>
                                    <p class="text-muted mb-0 text-small">27.07.2018 - 11:45</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="https://placehold.co/300" alt="Esperanza Lodge"
                                    class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                            </a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-0 ">Esperanza Lodge</p>
                                    <p class="text-muted mb-0 text-small">24.07.2018 - 15:00</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>