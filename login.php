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
                  Login is done through an ajax call to the the login script in the libs dir(login.php)
                  Ajax call is made in the main.js
                  After login a user session is created from the username
                -->
                <h1>CIRTA</h1>
                <div style="float:right;font-weight:bold;"><a href="index.php">Sign up</a></div>
                </br>
               
               <!-- Form is submitted through an ajax call in main.js -->
               <form class="form-horizontal chat_form login" role="form" name='login'>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter in a username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <div class="form-group send_btn">
                     <button type="submit" class="btn btn-primary">Log in</button>
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