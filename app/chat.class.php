<?php
   require_once('message.class.php');
   
   use Ratchet\MessageComponentInterface;
   use Ratchet\ConnectionInterface;

   class Chat implements MessageComponentInterface {
       protected $clients; 
       protected $message_object;

       public function __construct() {
           $this->clients = new \SplObjectStorage;
           $this->message_object = new Message();
       }

       public function onOpen(ConnectionInterface $conn) {
           $this->clients->attach($conn);
           echo "connection successfully established ({$conn->resourceId})\n";
       }

       public function onMessage(ConnectionInterface $from, $data) {
          $data =  json_decode($data);

          foreach ($this->clients as $client) {
               if ($from != $client) {
                   $client->send($data->msg);
               }
          }

          $this->message_object->saveMessage($data->sender,$data->msg,date('d M Y'));
       }

       public function onClose(ConnectionInterface $conn) {
         $this->clients->detach($conn);
         echo "connection closed ({$conn->resourceId})\n";
       }

       public function onError(ConnectionInterface $conn, \Exception $e) {
         echo "Error: {$e->getMessage()}\n";
         $conn->close();
       }
   }