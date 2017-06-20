<?php
	require_once('../users.class.php'); 
	
	$user = new Users();

	header('Content-Type: application/json');
	$response = array();
	if(isset($_POST['data'])){
		$data = $_POST['data'];
		if(!empty($data['username']) && !empty($data['password']) && !empty($data['retype_password'])){
			$username =  trim(strip_tags($data['username']));

			if($user->checkDuplicateUsername($username)){
				$response['error'] = "This Username has already been registered";
			}else{
				$password = trim(strip_tags( $data['password']));
				$retype_password = trim(strip_tags($data['retype_password']));
				if(!strlen($username)<3 || !strlen($username)>15){
					if(preg_match('/^[a-zA-Z_0-9]*$/',$username)){
							if(!strlen($password)<4 || !strlen($password)>20){
								if(preg_match('/^[a-zA-Z0-9-_ ]+$/', $password)){
									if($password === $retype_password){
										$encrypt_pswd = password_hash($password, PASSWORD_BCRYPT);
										$user->registerUser($username,$encrypt_pswd); // Registering user
										
										$response['success'] = true;
									}else{
										$response['error'] = "The passwords you entered do not match";
									}
								}else{
									$response['error'] = "Your password contain some invalid characters";
								}
							}else{
								$response['error'] = "Your password must be between 3 and 20 characters";
							}
					}else{
						$response['error'] = "The username you entered contain some invalid characters";
					}
				}else{
					$response['error'] = "Your username must be between 3 and 15 characters";
				}
			}
		}else{
			$response['error'] = "All fields are required";
		}
	}else{
		$response['error'] = "An error occured, please try again";
	}
	echo json_encode($response);
?>