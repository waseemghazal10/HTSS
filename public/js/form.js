$(document).ready(function () {
    var form=  $("form.dd");
  
     form.submit(function (event) {
       
        event.preventDefault();
        $.ajax({
          type: "POST",
          url: "/authenticate",
          data: form.serialize(),
          dataType: "json",
          encode: true,
          success: function(result){
            window.location= "/succesLogin";
            console.log(result);
          },
          error:function(result){
            // $(".error").html("Invalid Password");
            console.log(result);
            $(".error").html(result.responseJSON.msg);
          }
        }) 
      });
    });