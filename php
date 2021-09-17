<?php

	$connect = mysqli_connect("localhost","root","");
	$database = mysqli_select_db($connect,"mobileapp");
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];  

	$userEmailCheck = "select email from user_registration where email = '$email' ";
	
	$emailResult = mysqli_query($connect,$userEmailCheck);
	
	$row = mysqli_fetch_assoc($emailResult);
	
	if($emailResult==isset($row['email'])){
		
		$Message = 'email already taken';
		
	}else{
	
		$userRegistrationQuery = "insert into user_registration(username,email,password) values('$username','$email','$password')";
		
		$result = mysqli_query($connect,$userRegistrationQuery);		
		
		if($result){
			
			$Message = "User registered successfully";
						
		}else{
			
			$Message = "Error try again latter";
			
		}
	}
	
	$Response[] = array("Message" => $Message);
	
	echo json_encode($Response);

?>
