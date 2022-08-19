
            $(".dropzone").dropzone({
                autoProcessQueue: false,
                paramName:'userfiles',
                parallelUploads: 10,
                uploadMultiple: true,
                maxFilesize:1,
                maxFiles: 5,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                url: "https://httpbin.org/post",
                accept: function(file, done) {
                    console.log("uploaded");
                    done();
                },
                init: function() {


                    this.on("maxfilesexceeded", function(file){
                        this.removeFile(file);
                        alert("You are not allowed more than 1 file!");
                    });

                    this.on("error", function(file, message) {
                        alert(message);
                        this.removeFile(file);
                    });

                    this.on("success", function(file, responseText) {
                        console.log(responseText);
                    });


                },
                thumbnailWidth: 160,
                previewTemplate: '<div class="dz-preview dz-file-preview mb-3">' +
                    '<div class="d-flex flex-row ">'+
                    '<div class="p-0 w-30 position-relative">'+
                        '<div class="dz-error-mark"><span><i></i></span> </div>'+
                        '<div class="dz-success-mark"><span><i></i></span></div>'+
                        '<div class="preview-container">'+
                            '<img data-dz-thumbnail class="img-thumbnail border-0" /><i class="simple-icon-doc preview-icon" ></i></div>'+
                    '</div>'+
                    '<div class="pl-3 pt-2 pr-2 pb-1 w-70 dz-details position-relative">'+
                        '<div><span data-dz-name></span></div>'+
                        '<div class="text-primary text-extra-small" data-dz-size />'+
                        '<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>'+
                        '<div class="dz-error-mark"><span data-dz-errormessage></span> Error</div>'+
                    '</div></div>'+
                        '<a href="#/" class="remove" data-dz-remove><i class="glyph-icon simple-icon-trash"></i></a>'+
                '</div>',
            });
