<?php 

// data manipulation methods
 

   /**
	* insert data method
	* $table - takes in the table name
	* $tblHeaders - takes in the table's colomn names where the values need to insert
	* $values - takes in the array of values that need to insert to the database
	* $finalArg - to make the parameter assigments to the  prepare string like 'values (?,?,?)' 
	*/
	function insert($table,$tblHeaders,$values,$connection){	
		
		//make the parameters
		
		$finalArg='?';
		$finalParam='s';
		for($i=1; $i < sizeof($values) ; $i++) { 

			$finalArg=$finalArg.',?';
			$finalParam=$finalParam.'s';

		} 
		

		//merge  finalParams and values from controller to make an array
		$bindParamArray=array_merge(array($finalParam),$values);

		//to make sure that the array accessed by the refference
		foreach ($bindParamArray as &$val ) {
	
		}
		
		//prepare the statement mysqli
		$statement=$connection->prepare("insert into ".$table." ($tblHeaders) values (".$finalArg.")");

		if($statement){
		var_dump($statement);
			//bind the $bindParamArray with the statmemt
			call_user_func_array(array($statement,'bind_param'),$bindParamArray);

			//execute
			if($statement->execute()){

				$statement->close();
				return true;
			}
			else{

				return false;
			}
			
		}
		else{

			 die('Error creating the statement');
		}

	}
 ?>