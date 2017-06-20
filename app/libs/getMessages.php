<?php
   require_once('../message.class.php'); 

   $message = new Message();
   echo json_encode($message->getMessages(),JSON_PRETTY_PRINT);