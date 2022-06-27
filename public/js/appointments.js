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
      showAppointment();
    },
    error:function(result){

    }
  });
}

function search(id){
  var data = {};
  var idNum;
  if(id)
    idNum=id;
  else  
    idNum = $('#idNum').val();
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
      if(result.data){
        var date = result.data.birth;
        var test = date.split(" ");
        var birthday = test[0];
        $('input#idNum').val(result.data.IdNum);
        $('input#patName').val(result.data.patName);
        $('input#birth').val(birthday);
        $('input#city').val(result.data.city);
        $('input#mobile').val(result.data.mobile);
      }
      else{
        // var dat = result;
        $('tbody#tbody').html(result.row);
        $('#exampleModalCenter').modal('toggle');
      }
    },
    error:function(result){

    }
  }); 
}

function popUpSearch() {
  var data = {};
  var idNum = $('#fileID').val();
  var patName = $('#patientName').val();
  var countryId = $('#country-selector').val();
  var cityId = $('#city-selector').val();
  var tools = $('#com').val();
  data.idNum = idNum;
  data.patName = patName;
  if(countryId)
    data.countryId = countryId;
  if(cityId)  
    data.cityId = cityId;
  data.tools = tools;
  $.ajax({
      type: "GET",
      url: "/searchAppointmentPopUp",
      data: data,
      dataType: "json",
      encode: true,
      success: function(result){
        $('tbody#tbody').html(result.row);
      },
      error:function(result){
          
      }
    });
}

function selectRow(e){
  
  e = e || window.event;
  var target = e.target.closest('tr');
  var appID = target.getAttribute('id');

  $('#tbody tr').each(function(i, obj) {
    $(obj).removeClass("active");
  });
  $("tr#"+appID).addClass("active");
}

function selectAppointment(){
  var idApp = $("tr.active").attr('id');
  search(idApp);
  $('#exampleModalCenter').modal('toggle');
}

function showDoctorAppointments(){
  var data = {};
  var doctor = $('#doctor-selector').val();
  var timeDate = $('#stTime').val();
  var startingTime =timeDate.split("T");
  var date = startingTime[0];
  data.doctorId = doctor;
  data.date = date;
  $.ajax({
    type: "GET",
    url: "/showDoctorAppointments",
    data: data,
    dataType: "json",
    encode: true,
    success: function(result){
      $('tbody#tt').html(result.appointment);
    },
    error:function(result){
        
    }
  });
}

function showAppointment() {
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

function checkStatus(e){
  var data ={};
  e = e || window.event;
  var target = e.target.closest('div');
  var appID = target.getAttribute('idd');
  data.Id = appID;
  $.ajax({
    type: "GET",
    url: "/checkStatus",
    data: data,
    dataType: "json",
    encode: true,
    success: function(result){
        $('[name="appointment'+appID+ '"] .statusColor').addClass('bg-success');
          

    },
    error:function(result){
    }    
});   
}

function cancelStatus(e){
  var data ={};
  e = e || window.event;
  var target = e.target.closest('div');
  var appID = target.getAttribute('idd');
  data.Id = appID;
  $.ajax({
    type: "GET",
    url: "/cancelStatus",
    data: data,
    dataType: "json",
    encode: true,
    success: function(result){
      $('[name="appointment'+appID+ '"] .statusColor').addClass('bg-danger'); 

    },
    error:function(result){
      
    }
});  
}

function getCitys(){
  var data ={};
  var countryID = $('#country-selector').val();
  data.countryID = countryID;
  $.ajax({
    type: "GET",
    url: "/getCitys",
    data: data,
    dataType: "json",
    encode: true,
    success: function(result){
      $('[name="appointment'+appID+ '"] .statusColor').addClass('bg-danger'); 

    },
    error:function(result){
      
    }
});  
}


$(document).on('keypress', '#fileID', function(e){
  if (e.which == 13) {
    popUpSearch();
  }
});

$(document).on('keypress', '#com', function(e){
  if (e.which == 13) {
    popUpSearch();
  }
});

$(document).on('keypress', '#patientName', function(e){
  if (e.which == 13) {
    popUpSearch();
  }
});

$(document).on('keypress', '#idNum', function(e){
  if (e.which == 13) {
    search();
  }
});

$(document).on('keypress', '#patName', function(e){
  if (e.which == 13) {
    search();
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
      $('#save').addClass('btn-secondary');
    } 
    else 
    { 
      $('#stSpan').html("");
      $('#etSpan').html("");
      $('#save').prop('disabled', false);
      $('#save').removeClass('btn-secondary');
    }
  } else {
      $('#save').prop('disabled', true);
      $('#save').addClass('btn-secondary');
  } 
  showDoctorAppointments();
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
      $('#save').addClass('btn-secondary');
    } 
    else
    {
      $('#etSpan').html("");
      $('#stSpan').html("");
      $('#save').prop('disabled', false);
      $('#save').removeClass('btn-secondary');
  }
  } else {
      $('#save').prop('disabled', true);
      $('#save').addClass('btn-secondary');
  }
});

$(document).on('change','#doctor-selector',function(){
  showDoctorAppointments();
});

$(document).on('change','#country-selector',function(){
  getCitys();
  popUpSearch();
});

$(document).on('change','#city-selector',function(){
  popUpSearch();
});