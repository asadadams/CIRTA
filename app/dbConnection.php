<?php
	class dbConnection{
		//protected $db_conn;
		private $db_host = "localhost";
		private $db_username = "root";
		private $db_password = "";
		private $db_name = "chat_db";

		public function connect(){ //connect function to connect to database
			try {
				$db_conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name","$this->db_username","$this->db_password");
				
				$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $db_conn;
			}catch(PDOException $ex) {
				echo $ex->getMessage();
			}
		}
	}
?>