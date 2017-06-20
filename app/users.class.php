<?php
   
	require_once('dbConnection.php');
	class Users{
		public $link;
		
		public function __construct(){
			$dbConnection = new dbConnection();
			$this->link = $dbConnection->connect();	
			return $this->link;
		}

		/*Registering users with email*/
      public function registerUser($username,$password){
         try {
            $query = $this->link->prepare("INSERT INTO user(username,password) VALUES(?,?)");
            $values = array($username,$password);
            $query->execute($values);
         } catch(Exception $ex) {
            return $ex->getMessage();
         }
      }

      public function getUserLogin($username){
         try {
            $query = $this->link->query("SELECT password FROM user WHERE username = '$username'");
            $row = $query->rowCount();
            if($row){
               return $query->fetchAll(PDO::FETCH_ASSOC);
            }else{
               return 0;
            }
         } catch(Exception $ex) {
            return $ex->getMessage();
         }  
      }

      /*Checking if username has alreay been registered*/
      public function checkDuplicateUsername($username){   
         try { 
            $query = $this->link->query("SELECT * FROM user WHERE username = '$username'");
            $row =  $query->rowCount();
            if($row == 0){
               return false;
            }else{
               return true;
            }
         }catch(Exception $ex) {
            return $ex->getMessage();
         }
      }
	
	}	
?>