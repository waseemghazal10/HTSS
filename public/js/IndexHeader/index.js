function showAppointments() {
    var data = {};
    var doctorID = $('#doctors-selector').val();
    var Date = $('#start').val();
    if (doctorID) {
        data.doctorId = doctorID;
    }
    if(Date) {
        data.Date = Date;
    }
    $.ajax({
        type: "GET",
        url: "/getAppointments",
        data: data,
        dataType: "json",
        encode: true,
        success: function(result){
            $('div#main-container').html(result.page);
            
            $('#appointments-tab-button').click();

        },
        error:function(result){
            $('div#main-container').html(result.page);
        }
      });
      
}
function getDate(){
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    if(day<10) {
        day = '0'+day;
    } 
  
    if(month<10) {
        month = '0'+month;
    }
    document.getElementById("start").value = year + "-" + month + "-" + day;
    }

function doneStatus(e){
    var patData = {};
    e = e || window.event;
    var target = e.target || e.srcElement;
    var appID = target.getAttribute('appID');
    if(appID) {
        patData.appID = appID;
    }
    $.ajax({
        type: "GET",
        url: "/done",
        data: patData,
        dataType: "json",
        encode: true,
        success: function(result){
            console.log("status = 4");
        },
        error:function(result){
        }
      });
}

function cancelStatus(e){
    var patData = {};
    e = e || window.event;
    var target = e.target || e.srcElement;
    var appID = target.getAttribute('appID');
    console.log(appID);
    if(appID) {
        patData.appID = appID;
    }
    $.ajax({
        type: "GET",
        url: "/cancel",
        data: patData,
        dataType: "json",
        encode: true,
        success: function(result){
            console.log("status = 2");
        },
        error:function(result){
        }
      });
}

$( document ).ready(function() {
    showAppointments();
});

$(document).on('change','#doctors-selector',function(){
    showAppointments();
});


$(document).on('click', '#calendar-tab-button', function(){
    const d = new Date();
    document.querySelector(".dayview-now-marker").style.top = (document.querySelector(".dayview-gridcell-container").getBoundingClientRect().height / 14) * ((d.getHours() - 8) + d.getMinutes() / 60) + "px";
});


$(document).on('click', '#show', function(){

});
