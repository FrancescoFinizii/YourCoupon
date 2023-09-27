$(window).on("load", function(){
    search();
    getCoupon();
});

function getCoupon() {
    $('.results-item').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $("#form").data("route"),
            type:"POST",
            data:{"id" : $(this).data("id")},
            success:function(data){
                if ($('#coupon-div').length) {
                    $('#coupon-div').hide();
                }
                $('#coupon-div').show("slow");
                $("#coupon").html("Coupon posseduti: " + data);
            },
            error:function(data){
                alert(data.responseText);
            }
        });
    });
}

function search() {
    $('#oggetto').on("keyup", function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $("#oggetto").data("route"),
            type:"POST",
            data:{"oggetto" : $("#oggetto").val()},
            success:function(data){
                $('#results').html(data);
                getCoupon();
            },
            error:function(data){
                alert(data.responseText);
            }
        });
    });
}
