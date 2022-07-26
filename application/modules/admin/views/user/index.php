
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fa fa-plus fa-sm text-white-50"></i> Tambah User</a> -->
    </div>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                <div class="form-group" >
                    <a href="#" class="btn btn-sm btn-primary shadow-sm">
                            <i class="fa fa-plus fa-sm text-white-50"></i> Agent</a>
                    <a href="#" class="btn btn-sm btn-primary shadow-sm">
                            <i class="fa fa-plus fa-sm text-white-50"></i> Developer</a>
                </div>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fa fa-plus fa-sm text-white-50"></i> Tambah User</a>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="manageTable" class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Option</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript">
    window.base_url = '<?php echo base_url() ?>';
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<?php echo $this->load->assetsadmin('user', 'index', 'js');  ?>