<?php 

// validation name,Item name, some cases like that
function validateName($string){

	if(preg_match("/^[a-zA-Z\s]{5,30}$/", $string)){

		return true;
	}
	else{

		return false;
	}


}

//item price qnty like validation

function validateNumeric($string){

	if(preg_match("/^[0-9]{1,6}$/",$string)){

			return true;
	}
	else{

		return false;
	}

}

// validate description
function validateDescription($string){

	 return htmlentities($string,ENT_QUOTES,"UTF-8");
}

 ?>