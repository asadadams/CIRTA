<?php
	session_start(); // starting session
	require_once('../users.class.php');
	$user = new Users();
	header('Content-Type: application/json');
	$response = array();
	if(isset($_POST['data'])){
		$data = $_POST['data'];
		if(!empty($data['username']) && !empty($data['password'])){
			$username = trim(strip_tags($data['username']));
			$password = trim(strip_tags($data['password']));

			if($user->getUserLogin($username) != 0){ // getting password stored in the database to compare with what user provided
				foreach ($user->getUserLogin($username) as $key ) {
					$db_password = $key['password'];
				}
				if(password_verify($password, $db_password)) {
					$_SESSION['user_login'] = $username; // creating user session here
				   $response['success'] = true;
				}else{
				    $response['error'] = "Wrong password entered";
				}
			}else{
				$response['error'] = "The username entered is not registered";
			}
		}else{
			$response['error'] = "All fields are required";
		}
	}else{
		$response['error'] = "An error occured, please try again!!";
	}
	echo json_encode($response);
?>