<?php
session_start();
require 'classes/mysql.php';

class User{

	function validateUser($un, $pwd){
		$mysql = New Mysql();
		$ensure_credentials = $mysql->verify_Username_and_Pass($un, md5($pwd));

		if($ensure_credentials){
			$_SESSION['status'] = 'authorized';
			header('location: index.php');
		}else return "Failed login, please try again"; 
	}

	function log_User_Out(){
		if(isset($_SESSION['status'])){
			unset($_SESSION['status']);

			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(), '', time() - 10000);
				session_destroy();
			}
		}
	}

	function confirm_User(){
		if($_SESSION['status'] != 'authorized'){
			header('location: login.php');
		}
	}

	function register_User($un, $pwd, $rpwd){
		$mysql = New Mysql();
		$username_existance = $mysql->check_Username_Existance($un);
		if($username_existance){
			return "Username taken, please try again";
		}else
			{	
				//Check for existance
				if($un&&$pwd&&$rpwd)
				{
					//Check to see if passwords match
					if($pwd==$rpwd)
					{
						//Check string lengths
						if(strlen($pwd)>25||strlen($pwd)<6)
						{
							return "Your password must be between 6 and 25 characters long";
						}else
						{
							//Encrypt password
							$pwd = md5($pwd);
							//Register User
							$mysql = New Mysql();
							$registerResponse = $mysql->register_User($un, $pwd);
							if($registerResponse){
								return "Successfully Registered!";
							}else
								return "Successfully Registered!<br /><a href='login.php'>Login</a>";
								
						}
					}	
					else
					{
						return "Your passwords do not match";
					}
				}
				else
				{
					return "Please fill in <b>ALL</b> fields";
				}
			}
	}
}

?>