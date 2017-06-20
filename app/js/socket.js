$(document).ready(function(){
   var webSocket_connector = new WebSocket('ws://localhost:8080'); //webSocket to connect to server

   $('.chat_form').submit(function(e){
      e.preventDefault();  //preventing page from submitting
      var data = {
         msg : $('#message_text').val(),
         sender : $('#user_session').val()
      } 
      webSocket_connector.send(JSON.stringify(data));
      $('.conversations').prepend('<li class="label label-success">'+ $('#message_text').val() +'</li></br>');
      $('#message_text').val(' ');
   });

   webSocket_connector.onopen = function(e){ 
      console.log('connection established successfully');   
      //Getting chat history when connection is established
      //an ajax call[GET] to make request
      $.ajax({
            url:"app/libs/getMessages.php",//script to do signup
            type:"GET",
            dataType:'json',
            success:function(response){
              if(response != ''){
                  $.each(response,function(index,data){
                     if(data.username==$('#user_session').val())//getting messages posted by users
                        $('.conversations').prepend('<li class="label label-success">'+ data.message +'</li></br>');
                     else
                        $('.conversations').prepend('<li>'+ data.message +' <span class="label label-primary">'+ data.username +'</span> </li>');
                  })
              }else
                $('.conversations').prepend('<li class="label label-info">No conversation at the moment</li></br>');
              
            },
            error:function(ex){
               console.log(ex.responseText);
            }
      });
   }

   webSocket_connector.onmessage = function(e){
      $('.conversations').prepend('<li>'+ e.data +'</li>');
   }

});