

<style>
    table.dataTable thead tr {
        background-color: #3c8dbc;
    }
    th, td { white-space: nowrap; }

    tr { height: 30px; }

    [style*="--aspect-ratio"] > :first-child {
        background-color: white;
        width: 100%;
    }
    [style*="--aspect-ratio"] > img {
        height: auto;
    }
    @supports (--custom:property) {
        [style*="--aspect-ratio"] {
            position: relative;
        }
        [style*="--aspect-ratio"]::before {
            content: "";
            display: block;
            padding-bottom: calc(100% / (var(--aspect-ratio)));
        }
        [style*="--aspect-ratio"] > :first-child {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
        }
    }

    /* Center the loader */
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 80px;
        height: 80px;
        border: 14px solid #93c6ef;
        border-radius: 50%;
        border-top: 14px solid #3498db;
        -webkit-animation: spin 1.5s linear infinite;
        animation: spin 1.5s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .imageThumb {
        max-width: 100px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }
    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }
    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }
    .remove:hover {
        background: white;
        color: black;
    }


    /* Important part */
    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body{
        height: 80vh;
        overflow-y: auto;
    }


</style>
<!-- Begin Page Content -->
<div class="container-fluid">
<div id="loader" style="display: none"></div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
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
        </div>
    </div>

    <!-- DataTales Example -->
 <div class="row">
    <div class="col-md-3">


    </div>
    <div class="col-md-9">

            <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <a href="#" class="btn btn-app" data-toggle="modal" data-target="#TipeTambah">
                        <i class="fa fa-envelope"></i> New
                    </a>
                    <a href="#" disabled="" id="btnreply" class="btn btn-app">
                        <i class="fa fa-mail-reply"></i> Reply
                    </a>
                    <a href="#" disabled="" class="btn btn-app" id="btnforward">
                        <i class="fa fa-mail-forward"></i> Forward
                    </a>
                    <a class="btn btn-app">
                        <i class="fa fa-trash"></i> Delete
                    </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="3%" class="mailbox-star text-center"><i class="fa fa-star text-yellow"></i></th>
                                <th width="50%">Subject</th>
                                <th width="15%">From</th>
                                <th width="15%">Date</th>
                                <th width="10%">Size</th>
                                <th width="7%" class="text-center">Attach</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($records))
                        {
                            foreach($records as $record)
                            {
                                $style = "font-weight:normal";
                                $star = " fa-star-o";
                                if (intval($record['seen']) == 0)
                                {
                                    $style = "font-weight:bold";
                                    $star = " fa-star";
                                }
                                ?>
                                <tr class="tr_" id="tr_<?php echo $record['uid'] ?>" style="<?php echo $style; ?>">
                                    <td class="mailbox-star text-center"><a href="javascript:mail_view(<?php echo $record['uid'] ?>);"><i id="tr_star_<?php echo $record['uid'] ?>" class="fa <?php echo $star; ?> text-yellow"></i></a></td>
                                    <td onclick="mail_view(<?php echo $record['uid'] ?>)" style="cursor: pointer"><?php echo $record['subject'] ?></td>
                                    <td><?php echo $record['from'] ?></td>
                                    <td><?php echo $record['date'] ?></td>
                                    <td><?php echo $record['size'] ?></td>
                                    <td class="text-center">
                                        <?php if ($record['attachment'] == 1){ ?>
                                            <i class="fa fa-paperclip"></i>
                                        <?php }?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

    <div id="preview" style="display: none;background-color: white" class="card shadow mb-4">
    <div  class="card-body" >
        <div class="box box-primary"  >
            <div id="loader" style="display: none"></div>
            <div class = "row">
                <div class = "col-md-12">
                        <div class="card-body">
                            <span class="product-description text-bold" id="subject">Mentions</span><br>
                            <span class="col-md-1" style="min-width: 100px;">From: </span><span class="product-description col-md-9 text-left text-bold" id="from"></span><br>
                            <span class="col-md-1" style="min-width: 100px;">To: </span><span class="product-description col-md-9 text-left text-bold" id="to"></span><br>
                            <span class="col-md-1" style="min-width: 100px;">Date: </span><span class="product-description col-md-9 text-left text-bold" id="date"></span><br>
                        </div>
                </div>
            </div>
            <hr>
            <div class = "row mt-5">
                <div class = "col-md-8">
                    <div style="--aspect-ratio: 1/1; margin-top: -13px;" id="view_container">
                        <iframe
                                id = "mail_view"
                                src="<?php echo base_url();?>feature/email/getContent?mail_id=0&mailbox=INBOX"
                                width="1600"
                                height="900"
                                frameborder="0"
                        >
                        </iframe>
                    </div>
                </div>
                <div class = "col-md-4">
                    <div class="info-box bg-gray-light" id="attach_container" style="border-width: 0px;">
                        <div class="info-box-content" id="attach_panel" style="margin-left: 0px; margin-top: -13px;">

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


    <!-- Modal-->
    <div class="modal fade bd-example-modal-lg" id="TipeTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div id="loader" style="display: none"></div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> New Message</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="to" class="col-sm-2 control-label">To:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="to" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="col-sm-2 control-label">Subject:</label>

                            <div class="col-sm-10">
                                <input class="form-control" id="subject" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <div class="summernote col-sm-12">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <div class="field" align="left" id = "filefield">
                                    <div class="file btn btn-file btn-default" id = "fileBt" style="position: relative;  overflow: hidden;">
                                        <i class="fa fa-paperclip"></i> Attachment
                                        <input type="file" id="files" style="position: absolute; opacity: 0;  right: 0;  top: 0;" name="mediafile[]" multiple accept=".*"/>
                                        <input type="hidden" id = 'uploadfilename' value = ''>
                                    </div>
                                    <div class="file-field" id="fileViewDiv">
                                        <input style="display: none" id="disp_temp">
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btnSend" class="btn btn-primary" onclick="sendMail()"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
            <form action="<?= base_url('master/tipe/edit_action') ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <input name="id_tipe" class="form-control" type="text" hidden>
					<input name="nama" class="form-control" type="text" >
				</div>
				<div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" type="submit" > Update</button>
				</div>
			</div>
            </form>
		</div>
	</div>

    <div class="modal fade" id="Remove" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
            <form action="<?= base_url('master/tipe/remove_action') ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <input name="id_tipe" class="form-control" type="text" hidden>
					<input name="nama" class="form-control" type="text" disabled>
                    <br>
                    <p> Yakin menghapus data !!</p>
				</div>
				<div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit" > Remove</button>
				</div>
			</div>
            </form>
		</div>
	</div>

<script type="text/javascript">
    window.base_url = '<?php echo base_url() ?>';
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php echo $this->load->assetsadmin('email', 'index', 'js');  ?>
