<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$email = validate($_POST['email']);

	$user_data = 'username='. $uname. '&email='. $email;


	if (empty($uname)) {
		header("Location: register.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($email)){
        header("Location: register.php?error=Email is required&$user_data");
	    exit();
	}
	else if(empty($pass)){
        header("Location: register.php?error=Password is required&$user_data");
	    exit();
	}

	else if(empty($re_pass)){
        header("Location: register.php?error=Confirmation password is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: register.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE username='$uname' ";
		$result = mysqli_query($db, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=This username is taken &$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(username, email, password) VALUES('$uname', '$email', '$pass')";
           $result2 = mysqli_query($db, $sql2);
           if ($result2) {
           	 header("Location: register.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: register.php");
	exit();
}