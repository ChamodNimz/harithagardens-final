<?php 


	

	function showErrors($errors){

		//$errorBag = new Array();

		echo "<div class='alert alert-danger'><h3>Oops! Following errors occured</h3> <hr>";
		for ($i=0; $i < sizeof($errors); $i++) { 
		
		echo "
				<ul>
					<li>$errors[$i]</li>
				</ul>

			";
	}
	echo "</div>";
	
	}
	

 ?>