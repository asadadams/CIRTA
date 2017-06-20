<?php
   require_once('vendor/autoload.php'); // requiring autoload to use inc.php which has been autoloaded with composer
   
  if(login_user())
    header('location:chat.php'); // redirecting to the app
?>
<?php require_once('app/includes/header.php');?> <!-- Including header -->

   <div class="container">
      <div class="row">
         <div class="col-md-5 col-sm-8 col-md-push-3">
            
            <div class="main">
               <!-- 
                  Signup is done through an ajax call to the the signup script in the libs dir(signup.php)
                  Ajax call is made in the main.js
                -->
                
                <h1>CIRTA</h1>
                <div style="float:right;font-weight:bold;"><a href="login.php">Log in</a></div>
                </br>
                <div class="panel panel-default">
                  <div class="panel-body">
                    CIRTA (Chat In Real Time Application) is an open source chat application. This application uses Websockets over a TCP protocol. Is implemented using PHP WebSocket library Ratchet. I hope to add more features in the future and might,host it.
                    <h3>Current features</h3>
                    <ul>
                      <li>SignUp</li>
                      <li>Login</li>
                      <li>Chat with multiple users</li>
                      <li>Retreive chat history (last 25 messages)</li>
                    </ul>
                  </div>
                </div>



               <!-- Form is submitted through an ajax call in main.js -->
               <form class="form-horizontal chat_form signup" role="form" name='signup'>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter in a username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="retype-password">Retype Password</label>
                    <input type="password" class="form-control" id="retype-password" placeholder="Retype Password">
                  </div>
                  <div class="form-group send_btn">
                     <button type="submit" class="btn btn-primary">Sign up</button>
                  </div>
               </form>
               
               <br/><br/><br/>
               <!-- for displaying success an error from ajax calls in the main.js  -->
               <div class="alert alert-success" id='success' role="alert"></div>
               <div class="alert alert-danger" id='error' role="alert"></div> 

            </div>

         </div>
      </div>
   </div>

<?php require_once('app/includes/footer.php'); ?>