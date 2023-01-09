

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
                var f = files[i];
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
