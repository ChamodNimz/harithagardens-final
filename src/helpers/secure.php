<?php  

	/**
	*
	* sanitize userinput 
	* secure functions
	*
	*/
	function sanitizeInput($dirtyString){

		return htmlentities($dirtyString,ENT_QUOTES,"UTF-8");

	}

?>