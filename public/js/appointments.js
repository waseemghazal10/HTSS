function openTab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  if (evt.currentTarget) {
    evt.currentTarget.className += " active";
  }
  else if (evt.target) {
    evt.target.className += " active";
  }
}

function addAppointmentsButton() {
  $.ajax({
      type: "GET",
      url: "/addAppointments",
      success: function(result){
          $('div#main-container').html(result.page);
      },
      error:function(result){
          $('div#main-container').html(result.page);
      }
    });
}
function addAppointment(){
  var data = {};
  var idNum = $('#idNum').val();
  var doctorID = $('#doctor-selector').val();
  var statusID = $('#Status-selector').val();
  var subject = $('#subject').val();
  var stTime = $('#stTime').val();
  var startingTime =stTime.split("T");
  var sDate = startingTime[0];
  var sTime = startingTime[1];
  var eTime = $('#eTime').val();
  var endingTime =eTime.split("T");
  var endTime0 = endingTime[0];
  var endTime = endTime0.concat(" ", endingTime[1]);
  var details = $('#details').val();

  data.idNum = idNum;
  data.doctorID = doctorID;
  data.statusID = statusID;
  data.subject = subject;
  data.sDate = sDate;
  data.sTime = sTime;
  data.eTime = endTime;
  data.details = details;

  $.ajax({
    type: "POST",
    url: "/addAppointment",
    data: data,
    dataType: "json",
    encode: true,
    success: function(result){
        
    },
    error:function(result){

    }
  });
}

function serachIdNum(){
  var data = {};
  var idNum = $('#idNum').val();
  var patName = $('#patName').val();
  data.idNum = idNum;
  data.patName = patName;
  $.ajax({
    type: "GET",
    url: "/searchAppointment",
    data: data,
    dataType: "json",
    encode: true,
    success: function(result){
        var date = result.data.birth;
        var test = date.split(" ");
        var birthday = test[0];
        document.getElementById("idNum").value = result.data.IdNum;
        document.getElementById("patName").value = result.data.patName;
        document.getElementById("birth").value = test[0];
        // document.getElementById("patName").value = result.data.patName;
        document.getElementById("mobile").value = result.data.mobile;
    },
    error:function(result){
        // $('div#main-container').html(result.page);
    }
  });
  
}

$(document).on('keypress', '#idNum', function(e){
  if (e.which == 13) {
    serachIdNum();
  }
});
$(document).on('keypress', '#patName', function(e){
  if (e.which == 13) {
    serachIdNum();
  }
});

$(document).on('change','#stTime',function(){
  var etime = $('#eTime').val();
  if(etime){
    var endingTime =etime.split("T");
    var eDate = endingTime[0];
    var eeTime = endingTime[1];

    var stTime = $('#stTime').val();
    var startingTime =stTime.split("T");
    var sDate = startingTime[0];
    var sTime = startingTime[1];

    if(eDate != sDate || (Date.parse(etime) <= Date.parse(stTime))){
      $('#stSpan').html("Invalid Time!");
      $('#save').prop('disabled', true);
    } 
    else 
    { 
      $('#stSpan').html("");
      $('#etSpan').html("");
      $('#save').prop('disabled', false);
    }
  }
});

$(document).on('change','#eTime',function(){
  var stTime = $('#stTime').val();
  if(stTime){
    var startingTime =stTime.split("T");
    var sDate = startingTime[0];
    var sTime = startingTime[1];

    var etime = $('#eTime').val();
    var endingTime =etime.split("T");
    var eDate = endingTime[0];
    var eeTime = endingTime[1];

    if(eDate != sDate || (Date.parse(etime) <= Date.parse(stTime))){
      $('#etSpan').html("Invalid Time!");
      $('#save').prop('disabled', true);
    } 
    else
    {
      $('#etSpan').html("");
      $('#stSpan').html("");
      $('#save').prop('disabled', false);
  }
  }
});
