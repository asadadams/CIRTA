<?php
  require_once('vendor/autoload.php'); // requiring autoload to use inc.php which has been autoloaded with composer

  if(login_user() == false)
     die("<script>location.href = 'index.php'</script>"); // redirecting to the the index
?>
<!DOCTYPE html>
<html>
<head>
   <title>Chat</title>
   <link rel="stylesheet" type="text/css" href="app/css/bootstrap.min.css"> <!---  bootstrap css file -->
   <link rel="stylesheet" type="text/css" href="app/css/main.css">
</head>
<body>  

   <div class="container">
      <div class="row">
         <div class="col-md-7 col-md-push-2">
            
            <h1>CIRTA</h1>
            <div class="main">
               <h4>You are currently logged in as <span class="label label-success"><?php echo $_SESSION['user_login']?></span> <div style="float:right;"><a href='logout.php'>Logout</a></div></h4>
               
               <h3>Conversations</h3>
               <ul class='conversations'>
                 
               </ul>
          
               <form class="form-horizontal chat_form" role="form" name='chat_form'>
                  <div class="form-group">
                    <input type="hidden" id="user_session" value="<?php echo $_SESSION['user_login'];?>">
                     <textarea id='message_text' placeholder="Enter in message" class="form-control" rows="1"></textarea>
                  </div>
                  <div class="form-group send_btn">
                     <button type="submit" class="btn btn-success">Send</button>
                  </div>
               </form>
            </div>

         </div>
      </div>
   </div>
  
<?php require_once('app/includes/footer.php'); ?>
<script type="text/javascript" src="app/js/socket.js"></script><!-- Websocket file to connect to server -->