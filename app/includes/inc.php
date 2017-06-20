<?php
   session_start();
   function login_user(){
       if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])){
            global $user_login;
            $user_login = $_SESSION['user_login'];
            return true;
       }else{
            return false;
        } 
      }