$(document).ready(function(){

    // image preview
    $("#foto").change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $("#profile-image").attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    })

    $("#imageForm").submit(function(e){
        console.log("run");
        e.preventDefault();

        var formData = new FormData(this);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#btn-submit-img").attr("disabled", true);
        $.ajax({
            type:"POST",
            url: this.action,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (response) => {
                let msg = '<div class="alert alert-success">'+response+'</div>';
                $("#res").html(msg);
                $("#btn-submit-img").attr("disabled", false);
            }
        })
    })
})
