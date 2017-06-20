<?php
   require('../vendor/autoload.php'); //including autoload file
   require('chat.class.php');

   use Ratchet\Server\IoServer;
   use Ratchet\Http\HttpServer;
   use Ratchet\WebSocket\WsServer;


   $server = IoServer::factory(
      new HttpServer(
         new WsServer(
            new Chat()
         )
      ),
      8080
   );

   $server->run();