$('documnet').ready(function(){

   //When signup is called an ajax call is made(form with class signup)
   $('.signup').submit(function(){
      //Signup credentials in an object
      var data = {username:$('#username').val(),password:$('#password').val(),retype_password:$('#retype-password').val()};
      $.ajax({
            url:"app/libs/signup.php",//script to do signup
            type:"POST",
            data:{data:data},
            success:function(response){
              if(response.success){
                  $('#error').css('display','none');
                  $('#username').val('');
                  $('#password').val('');
                  $('#retype-password').val('');
                  $('#success').css('display','block').html("You've been successfully registered, login <a href='login.php'>Login</a>");
              }else{
                 $('#success').css('display','none');
                 $('#error').css('display','block').html(response.error);
              }
            },
            error:function(ex){
               console.log(ex.responseText);
               //$('#error').css('display','block').html("An error occured, please try again");
            }
      });
      return false;
   });

   $('.login').submit(function(){
      var data = {username:$('#username').val(),password:$('#password').val()};
      $.ajax({
            url:"app/libs/login.php",
            type:"POST",
            data:{data:data},
            success:function(response){
               if(response.success){
                   $('#error').css('display','none');
                   $('#success').css('display','block').html("Logging you in");
                   setTimeout('window.location.href = "chat.php";',4000);
               }else{
                  $('#success').css('display','none');
                  $('#error').css('display','block').html(response.error);
               }

            },
            error:function($ex){
               console.log($ex.responseText);
               //$('#error').css('display','block').html("An error occured, please try again");
            }
      });
      return false;
   });


});