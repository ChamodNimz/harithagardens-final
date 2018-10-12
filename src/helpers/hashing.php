<?php 

	/*
	*
	* function to make the password hash
	*/

	function hashPassword($userInput){

		return password_hash($userInput,PASSWORD_DEFAULT);
	}

	function verify($password,$dbPassword){

		return password_verify($password,$dbPassword);
	}


?>