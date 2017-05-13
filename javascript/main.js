var bool_active = true;
$(document).ready(function(){
	$("#account-expand-panel").hide();
    $("#form-add").hide();
    $("#account-panel").click(function(){
        $("#account-expand-panel").slideToggle(200);
    });
    $("#tambah-button").click(function(){
        $("#form-add").slideToggle(200);
    });
    $("#tutup-form").click(function(){
        $("#form-add").slideToggle(200);
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#gambar_profil').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}