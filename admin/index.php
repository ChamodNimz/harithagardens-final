<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/haritha-gardens/core/init.php';
	require_once '../src/helpers/errors.php';
	if(!isLoggedIn()){

			header("Location:../public/login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<?php include '../src/includes/links.php'; ?>
</head>
<body>
	<?php include '../src/includes/navigation-admin.php'; ?>
	<br><br><br>

	<div class="container">
				<div class=" p-5 p-bottom">
					<?php

						if(isset($_POST['txtItemName'])){

						//sanitizing the inputs and assigning
							require_once '../src/helpers/secure.php';
							$product= $_POST['txtItemName'];
							$admin=$_SESSION['userID'];
							$price=$_POST['txtItemPrice'];
							$description=$_POST['description'];
							$category=$_POST['category'];
							$allowedCatItems= array('Plant','Flower pot','Flower');//allowed category items to validate
							$qnty=$_POST['txtQnty'];

							// empty error arrayBag
							$errors = array();

							if(!empty($_FILES)){

								// validations image upload
								
								$file=$_FILES['imgFile'];
								$fileTypeString=$file['type'];
								$fileExploded=explode('/',$fileTypeString);
								
								$fileType=$fileExploded[0];
								$fileExten=$fileExploded[1];
								$fileSize=$file['size'];
								$tempPath=$file['tmp_name'];
								$uploadPath=BASEURL.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."dbImages";
								$uploadFileName=md5(microtime()).".".$fileExten;
								$dbImagePath=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."haritha-gardens".DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."dbImages".DIRECTORY_SEPARATOR.$uploadFileName;
								$finalfilePathDB="src".DIRECTORY_SEPARATOR."dbImages".DIRECTORY_SEPARATOR.$uploadFileName;

								$allowedImages = array('png','jpeg','gif','jpg');

								if($fileType!='image'){

									 $errors[]='The uploaded file is not an image. Please upload an image';
								}

								if(!in_array($fileExten,$allowedImages) ){

									 $errors[]='The file you uploaded needs to be a jpeg or png file type ';
								}
								
								if ($fileSize>10485760) {
									
									$errors[]=' The image is too large to be uploaded. Please select an image size less than 10mb';
								}
								

							}
							else
							{
								$errors[]='Choose an image as a product avatar';
							}

							if(empty($errors)){

								move_uploaded_file($tempPath,$dbImagePath);
							}

							//import validation file
							require_once '../src/helpers/validation.php';

							//validation Itemname
							if(!validateName($product)){

								$errors[]="Item name is not valid, please provide the name at  least 5-30 characters, non numeric values, no special characters";
								
							}
							if(!(validateNumeric($price))){

								$errors[]="Item price cannot be a string, special character, or an empty field ";
							}
							if(!validateNumeric($qnty)){

								$errors[]="Item quantity should not be a string value or a special character or a minus value ";
							}

							if(!in_array($category,$allowedCatItems)){

								$errors[]="What are you doing? Don't attack .";
							}


					if(empty($errors)){

						// inserting data 
						include '../core/dataManip.php';
						require_once '../core/init.php';

						$statement=mysqli_stmt_init($connection);
						$feature=0;
						$query ="insert into product (adminID,productName,price,description,category,qnty,image,featured) values (?,?,?,?,?,?,?,?)";
						if(mysqli_stmt_prepare($statement,$query)){

								mysqli_stmt_bind_param($statement,"ssssssss",$_SESSION["userID"],$product,$price,$description,$category,$qnty,$finalfilePathDB,$feature);
								if(mysqli_stmt_execute($statement)){

									header("Location:index.php?added=1");
									
								}
								else{

									die("Error");
								}
								mysqli_stmt_close($statement);
						}
						mysqli_close($connection);
					
					}
					else

						showErrors($errors);
					}

					if(isset($_GET['added'])){

						echo"<div class='alert alert-success'>Item added Successfully !</div>";
					}
						
					 ?>
					<h2 class="text-success"><b>Add products</b></h2>
					<hr>
					<!-- form for adding a new item -->
					<form  method="POST" action="#" enctype="multipart/form-data">
						<div class="form-group">
							<div class="row">
									
								<div class="col">
									<label for="txtItemName" class="text-success">Item Name <span class="text-danger">*</span></label>
									<input type="text" name="txtItemName" class="form-control is-valid" required value="<?php if(isset($_POST['txtItemName'])){echo"".$_POST['txtItemName']."";}?>">
								</div>

									
								<div class="col">
									<label for="txtItemName" class="text-success">Item Price <span class="text-danger">*</span></label>
									<input type="number" name="txtItemPrice" class="form-control is-valid" required
									value="<?php if(isset($_POST['txtItemPrice'])){echo"".$_POST['txtItemPrice']."";}?>"
									>
								</div>
							</div>

							<div class="row pt-4">
								<div class="col-md-4">
									<label for="txtQnty" class="text-success">Quantity <span class="text-danger">*</span></label>
									<input type="number" name="txtQnty" class="form-control is-valid" required
									value="<?php if(isset($_POST['txtQnty'])){echo"".$_POST['txtQnty']."";}?>"
									>
								</div>
							</div>

					<!-- image preview  and upload input -->
					<div class="row pt-4">
						<div class="col-md-6">

							<label for="imgFile" class="text-success">Upload an image <span class="text-danger">*</span></label>
							<br><br>
							<label class="btn btn-success">
								Upload <i class="fas fa-upload"></i>
								<input type="file" name="imgFile"  class="form-control is-valid" hidden id="imageInput" required>
							</label>
							

						</div>

						<div class="col-md-6">
							<h3 class="text-success"><b>Preview Image</b></h3>
							<hr>	
							<div class="img-preview  rounded mt-4">
								<img src="<?php if(isset($_POST['imgFile'])){echo"".$file['tmp_name']."";}?>" class="img-fluid shadow" id="image">
							</div>
						</div>
					</div>
							
								

								<div class="pt-4">
									<label for="description" class="text-success">Description <span class="text-danger">*</span></label>
									<textarea rows="4" class="form-control is-valid" name="description">
										<?php if(isset($_POST['description'])){echo"".$_POST['description']."";}?>
									</textarea>
								</div>
								
								<div class="pt-4">
									<label for="category" class="text-success">Category<span class="text-danger">*</span></label>
									<select class="form-control is-valid" name="category">Type <span class="text-danger">*</span>
										<option class="text-success">Plant</option>
										<option class="text-success">Flower pot</option>
										<option class="text-success">Flower</option>
									</select>
								</div>
								

								<button class="btn btn-success mt-5 float-right" type="submit">Add</button>
								<br><br>
						</div>
					</form>
				</div>
	
	</div>
		
		
	<?php include '../src/includes/footer.php'; ?>

	<script type="text/javascript">

		//image preview function
			$(document).ready(function(){

				$("#imageInput").change(function(event){

					var path=URL.createObjectURL(event.target.files[0]);
					$("#image").attr('src',path);

				});
			});
		

	</script>
</body>
</html>