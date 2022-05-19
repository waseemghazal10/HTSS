function showAppointments() {
    $.ajax({
        type: "GET",
        url: "/getAppointments",
        data: {},
        dataType: "json",
        encode: true,
        success: function(result){
            $('div#main-container').html(result.responseText);
        },
        error:function(result){
            $('div#main-container').html(result.responseText);
        }
      }) 
}

$( document ).ready(function() {
    showAppointments();
});