function showAppointments() {
    var data = {};
    var doctorID = $('#doctors-selector').val();
    if (doctorID) {
        data.doctorId = doctorID;
    }
    $.ajax({
        type: "GET",
        url: "/getAppointments",
        data: data,
        dataType: "json",
        encode: true,
        success: function(result){
            $('div#main-container').html(result.page);
            
            $('#appointments-tab-button').click()
        },
        error:function(result){
            $('div#main-container').html(result.page);
        }
      });
      
}

$( document ).ready(function() {
    showAppointments();
    
});
// $('#doctors-selector').change(function () {
//     console.log("hi");
//     showAppointments();
// });

$(document).on('change','#doctors-selector',function(){
    showAppointments();
});

$(document).on('click', '#calendar-tab-button', function(){
    const d = new Date();
    document.querySelector(".dayview-now-marker").style.top = (document.querySelector(".dayview-gridcell-container").getBoundingClientRect().height / 24) * (d.getHours() + d.getMinutes() / 60) + "px";
});

