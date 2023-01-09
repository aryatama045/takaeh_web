

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
    var base_url = '<?php echo base_url() ?>';



    jQuery(document).ready(function(){
        var datatable = $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false,
            "rowHeight": 'auto'
        });
        datatable.column( '3:visible' )
            .order( 'desc' )
            .draw();
    });

    function mail_view(mail_id){
        $('#btnreply').attr('href', base_url +'feature/email/reply?mail_id='+mail_id+'&boxname=INBOX');
        $('#btnreply').removeAttr('disabled');
        $('#btnforward').attr('href', base_url +'feature/email/forward?mail_id='+mail_id+'&boxname=INBOX');
        $('#btnforward').removeAttr('disabled');
        $('.tr_').css('background-color', 'white');
        $('#tr_'+mail_id).css('background-color', '#93c6ef');
        $('#tr_'+mail_id).css('font-weight', 'normal');
        $('#tr_star_'+mail_id).attr('class', 'fa fa-star-o text-yellow');
        $('#loader').fadeIn(1000);
        $("#mail_view").attr("src", base_url +"feature/email/getContent?mail_id="+mail_id+"&mail_box=INBOX");
        $.ajax({
            type: "get",
            url: base_url +"feature/email/getHeader",
            data: {
                mail_id: mail_id,
                mail_box: "INBOX"
            },
            success: function(response) {
                var data = JSON.parse(response);
                var from = data.fromAddress;
                var subject = data.subject;
                var date = data.date;
                var to = data.toString;
                $('#from').html(from);
                $('#subject').html(subject);
                $('#to').html(to);
                $('#date').html(date);
            }
        });
        $('#preview').css('display', 'block');
        $('#attach_container').height($('#view_container').height());
        $.ajax({
            type: "get",
            url: base_url +"feature/email/getAttachment",
            data: {
                mail_id: mail_id,
                mail_box: "INBOX"
            },
            success: function(response) {
                if (response == "No")
                {
                    $('#loader').fadeOut(1000);
                    return;
                }
                var data = JSON.parse(response);
                var html = '';
                for (var one in data)
                {
                    console.log(data[one]);
                    html += "<br><span class='info-box-text'><a href='" + base_url+ "'feature/email/download?filename='" + data[one].filePath + "'><i class='fa fa-download'></i>&nbsp;&nbsp;" + data[one].name + "</a></span>";
                }
                $('#attach_panel').html(html);
                $('#loader').fadeOut(1000);
            }
        });

    }


    var fileObject = {};

    jQuery(document).ready(function(){
        // CKEDITOR.replace('editor1')
        $('.summernote').summernote({
            height: 230,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                var files = e.target.files;
                var filesLength = files.length;
                var oversizefile = null;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var arrayName = f.name;
                    arrayName = arrayName.replace(".", "_");

                    if(f.size/1024/1024 > 5)
                    {
                        if(oversizefile) oversizefile = oversizefile + ', ' + f.name;
                        else oversizefile = f.name;
                        continue;
                    }

                    else if(Object.keys(fileObject).length < 10) {
                        var keyflag = true;
                        $.each( fileObject, function( key, value) {
                            if(key == arrayName)keyflag = false;
                        });

                        if(keyflag) {
                            fileObject[arrayName] = f;
                            var fileReader = new FileReader();
                            fileReader.file_name = f.name;
                            fileReader.arrayName = arrayName;
                            fileReader.onload = (function (e) {
                                var file = e.target;
                                var file_name = file.file_name;
                                var src = '/assets/images/download.png';
                                if(file_name.search('.gif') > 0 || file_name.search('.jpg') > 0 ||
                                    file_name.search('.jpeg') > 0 || file_name.search('.png') > 0) src = e.target.result;
                                var mediaName = file.mediaName;

                                if(file_name.length > 15)
                                {
                                    file_name = file_name.substring(0,12) + '...';
                                }
                                $("<span id='" + mediaName + "' class=\"pip\">" +
                                    "<img class=\"imageThumb\" src=\"" + src + "\" width=\"100px\" height=\"100px\" title=\"" + file.arrayName + "\"/>" +
                                    "<br/><span class=\"remove\">Remove</span>" +
                                    "<span class=\"text\"><center>" + file_name + "</center></span>" +
                                    "</span>").insertAfter("#disp_temp");
                                $(".remove").click(function () {
                                    var pId = this.parentNode.id;
                                    var keytemp = ($("#" + pId).find("img")).attr('title');
                                    delete fileObject[keytemp];
                                    $(this).parent(".pip").remove();
                                });
                            });
                            fileReader.readAsDataURL(f);
                        }
                    }
                    else {
                        break;
                    }
                }
                if(oversizefile)
                {
                    alert('File size exceeded(more 5Mbyte). \nFileName: ' + oversizefile);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });

    function sendMail(){
        $('#loader').fadeIn(1000);
        $('#btnSend').attr('disabled', true);
        $('#to').attr('disabled', true);
        $('#subject').attr('disabled', true);
        $('.summernote').attr('disabled', true);
        $('.filefield').attr('disabled', true);
        $('.summernote').summernote('disable');

        var subject = $('#subject').val();
        var to = $('#to').val();
        var markupStr = $('.summernote').summernote('code');
        let data = new FormData();
        if(Object.keys(fileObject).length > 0) {
            var num = 0;
            $.each(fileObject, function (key, value) {
                data.append(value.name, value);
                num++;
            });
        }
        data.append('to', to);
        data.append('subject', subject);
        data.append('message', markupStr);
        data.append('exist_ids', '');
        data.append('exist_names', '');
        $.ajax({
            url: base_url + 'feature/email/sendmail',
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                $('#loader').fadeOut(1000);
                $('#btnSend').removeAttr('disabled');
                $('#to').removeAttr('disabled');
                $('#subject').removeAttr('disabled');
                $('.summernote').removeAttr('disabled');
                $('#filefield').removeAttr('disabled');
                $('.summernote').summernote('enable');
                if (response == "yes")
                    location.reload(true);
                else
                    alert(response);
            }
        });
    }

</script>


