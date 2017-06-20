<?php
   require_once('dbConnection.php');

   class Message{
      public $link;
      
   public function __construct(){
      $dbConnection = new dbConnection();
      $this->link = $dbConnection->connect();   
      return $this->link;
   }

   public function saveMessage($username,$message,$date){
         try {
            $query = $this->link->prepare("INSERT INTO message(username,message,date) VALUES(?,?,?)");
            $values = array($username,$message,$date);
            $query->execute($values);  
         }catch (Exception $e) {
             return $ex->getMessage();
         }
    }

    public function getMessages(){
         try {
            $query = $this->link->query("SELECT * FROM message ORDER BY id DESC LIMIT 25");
            if($query->rowCount()!=0){
              return $query->fetchAll(PDO::FETCH_ASSOC);
            }else
              return 0;
         }catch (Exception $e) {
             return $ex->getMessage();
         }
     }

   }
?>