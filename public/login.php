<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php include '../src/includes/links.php'; ?>
</head>
<body>
	<!----- navigation include --->
	<?php include '../src/includes/navigation-public.php'; ?>
	 	<div class="jumbotron jb">
<?php 
		if(isset($_POST['txtUsername'])){

			include '../src/helpers/hashing.php';
			require_once '../core/init.php';
			require_once '../src/helpers/secure.php';

			$password=sanitizeInput($_POST['txtPassword']);
			$username=sanitizeInput($_POST['txtUsername']);
			

			$r=mysqli_query($connection,"select id,username,password from admin where username='$username' ");
			
			$row=mysqli_fetch_assoc($r);

			if(password_verify($password,$row['password'])){
				
				$_SESSION['userID']=$row['id'];
				header("Location:../admin/index.php");
			}
			else{

				$Errorflag=1;
				echo"<div class='alert alert-danger'><b>Incorrect credentials provided, Try again !</b></div>";
			}

		}

?>
			  <h1 class="display-4 text-success text-center">Login</h1>
			  
			  <hr class="my-4">
			  <form action="#" method="post">
			  	<div class="form-group">
			  		<div class="row">
			  			<div class="col-md-3">
			  			</div>
			  			<div class="col-md-6 login">
			  				<div class="input-group p-3">
						        <div class="input-group-prepend">
						          <div class="input-group-text"><span class="fas  fa-2x fa-user-tie"></span></div>
						        </div>
						        <input type="text" class="form-control <?php if(isset($Errorflag)){echo'is-invalid';}else{echo'is-valid';} ?>" name="txtUsername" id="inlineFormInputGroupUsername" placeholder="Username" required>
      						</div>

      						<div class="input-group p-3">
						        <div class="input-group-prepend">
						          <div class="input-group-text"><span class="fas  fa-2x fa-key"></span></div>
						        </div>
						        <input type="password"  name="txtPassword" class="form-control  <?php if(isset($Errorflag)){echo'is-invalid';}else{echo'is-valid';} ?>" id="inlineFormInputGroupUsername" placeholder="Password" required>
      						</div>

      						<center><button type="submit" class="btn btn-success text-center login-btn m-2"><i class="fas fa-sign-in-alt"> </i> Login</button></center>
			  			</div>
			  			<div class="col-md-3">
			  				
			  			</div>
			  		</div>
			  	</div>

			  </form>
		
		</div>
	
	<!--------------- footer --------------->
	<?php include '../src/includes/footer.php'; ?>
</body>
</html>
