<?php 

define('BASEURL','haritha-gardens' );

$connection=mysqli_connect("localhost","demon","chamod123","haritha-gardens");


		if(mysqli_connect_error()){
			echo"connection failed to esatablish : Error Code - ".mysqli_connect_error()."";
		}

session_start();

function isLoggedIn(){

	if(isset($_SESSION['userID'])){

		return true;
	}
	else{
		
		return false;
	}

}
		
?>