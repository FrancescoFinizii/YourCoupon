$(window).on("load", function(){
    add();
    search();
});

function add() {
    $('.results-item').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $("#results").data("route"),
            type:"POST",
            data:{"AziendaID" : $(this).data("id")},
            success:function(data){
                $('#data').hide(1000);
                $("#white-line").animate({width: '100%'}, {duration: 1000, complete: function() {
                        $("#step-two" ).removeClass( "step-next").addClass("step-prev");
                        $("#step-two" ).find('.step-name').addClass("step-name-green");
                        $('#data').html(data).show("slow");
                        $("#back").click(function() {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: $("#back").data("route"),
                                type:"POST",
                                success:function(data){
                                    $('#data').hide(1000);
                                    $("#step-two" ).fadeOut(500, function(){
                                        $(this).removeClass( "step-prev").addClass("step-next");
                                        $(this).find('.step-name').removeClass("step-name-green");
                                    });
                                    $("#white-line").animate({width: '50%'}, {duration: 2000});
                                    $('#data').html(data).show("slow");
                                    add();
                                    search();
                                },
                                error:function(data){
                                    alert(data.responseText);
                                }
                            });
                        });
                    }
                });
            },
            error:function(data){
                alert(data.responseText);
            }
        });
    });
}

function search() {
    $('#ragioneSociale').on("keyup", function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $("#ragioneSociale").data("route"),
            type:"POST",
            data:{"ragioneSociale" : $("#ragioneSociale").val()},
            success:function(data){
                $('#results').html(data);
                add();
            },
            error:function(data){
                alert(data.responseText);
            }
        });
    });
}
