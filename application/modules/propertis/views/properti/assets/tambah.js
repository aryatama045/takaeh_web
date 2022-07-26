$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});

// alert('tes');

$(document).ready(function() {
    $('#provinsi_id').change(function(){
        $('#kota').prop('selectedIndex',0);
        $('#kabupaten').prop('selectedIndex',0);
        $('#kecamatan').prop('selectedIndex',0);
    });
    $('#kota').change(function(){
        $('#kabupaten').prop('selectedIndex',0);
        $('#kecamatan').prop('selectedIndex',0);
    });
    $('#kabupaten').change(function(){
        $('#kecamatan').prop('selectedIndex',0);
    });

});

$(function(){

    $.ajaxSetup({
        type:"POST",
        url: base_url + 'propertis/properti/kode_area',
        cache: false,
    });

    $("#provinsi_id").change(function(){
        var value=$(this).val();
        if(value>0){
            $.ajax({
                data:{modul:'kota',id:value},
                success: function(respond){
                $("#kota").html(respond);
            }
            })
        }
    });

    $("#kota").change(function(){
        var value=$(this).val();
        if(value>0){
            $.ajax({
                data:{modul:'kabupaten',id:value},
                success: function(respond){
                $("#kabupaten").html(respond);
            }
            })
        }
    });

    $("#kabupaten").change(function(){
        var value=$(this).val();
        if(value>0){
            $.ajax({
                data:{modul:'kecamatan',id:value},
                success: function(respond){
                $("#kecamatan").html(respond);
            }
            })
        }
    });

});