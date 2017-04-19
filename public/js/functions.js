
/*  form notification posission */
var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};


/* positive integral numberr
$(document).ready(function() {
    $('.number').keyup(function() {
        var error ='Please enter a valid number.';
        var value = $(this).val();
        if(value.indexOf('.') >= 0 || value.indexOf('-') >= 0)
            $(this).val(value.slice(0, -1));
    });
});
 /*

/* positive integral numberr
$(document).ready(function() {
    $('.text').keyup(function() {
        var error ='Please enter a valid text.';
        var value = $(this).val();
        if(value.indexOf('=') >= 0 || value.indexOf('>') >= 0 || value.indexOf('<') >= 0 )
            $(this).val(value.slice(0, -1));
    });
});


/* show image thumbnail before upload with jQuery
$(function() {
    $("#uploadFile").on("change", function(){
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
    $("#deletefile").on("click", function(){
        $("#imagePreview").css("background-image", "none");
    });
});

*/