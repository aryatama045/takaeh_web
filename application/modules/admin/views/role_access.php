<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message'); ?>

            <h5>Roles : <?= $role['role']; ?></h5>

            <table class="table table-hover table-responsive">
                    <?= $menuss; ?>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>

