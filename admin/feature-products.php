<?php

	require_once '../core/init.php';
	require_once '../src/helpers/errors.php';
	if(!isLoggedIn()){

			header("Location:../public/login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feature products</title>
	<?php include '../src/includes/links.php'; ?>
</head>
<body>

	<!-- admin navigation  -->
	<?php include '../src/includes/navigation-admin.php'; ?>
<?php 

// dynamic table creation 
$query1="SELECT productName,pID,featured FROM `product` where category='Plant' ";
$query2="SELECT productName,pID,featured FROM `product` where category='Flower pot' ";
$query3="SELECT productName,pID,featured FROM `product` where category='Flower' ";

?>
			<div class="p-5 p-bottom container-fluid">
			<?php if(isset($_GET['itemft'])){
					$pid=(int)$_GET['itemft'];
					$query="update product set featured='1' where pID='$pid' ";
					$result=mysqli_query($connection,$query);
					if($result==1){

						echo"<div class='alert alert-success'>Item featured Successfully !</div>";
					}
					else{
						echo "<div class='alert alert-danger'>Item feature Error occured try again !</div>";
					}
				}
				else if(isset($_GET['itemunft'])){

					$pid=(int)$_GET['itemunft'];
					$query="update product set featured='0' where pID='$pid' ";
					$result=mysqli_query($connection,$query);
					if($result==1){

						echo"<div class='alert alert-success'>Item featured Successfully !</div>";
					}
					else{
						echo "<div class='alert alert-danger'>Item feature Error occured try again !</div>";
					}
				}
			?>

				<h2 class="text-success"><b>Featured products</b></h2>
				<hr>
				<div class="row">
					<div class="col-md-4">
					
					<table class="table shadow table-hover table-striped">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">Plants</th>
						      <th scope="col"><i class="fas fa-pencil-alt"></i></th>
						    </tr>
						  </thead>

						  <tbody>
							<?php 
								
								$dataSet1=mysqli_query($connection,$query1); 
								while($col1=mysqli_fetch_assoc($dataSet1)):

							?>
						    <tr>
						      <th scope="row"><?php echo "".$col1['productName'].""; ?></th>
						      <td><a href="feature-products.php?<?php if($col1['featured']==1){echo'itemunft';}else{echo'itemft';}?>=<?= $col1['pID']?>" role="button" class="btn <?php if($col1['featured']==1){echo'btn-danger';}else{echo'btn-success';}?>"><i class="<?php if($col1['featured']==1){echo'fas fa-ban';}else{echo'fas fa-check';}?>"></i></a></td>
						      
						    </tr>
						<?php endwhile; ?>

						  </tbody>
					</table>

				</div>
				<div class="col-md-4">
					
					<table class="table shadow table-hover table-striped">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">Pot</th>
						      <th scope="col"><i class="fas fa-pencil-alt"></i></th>
						    </tr>
						  </thead>

						  <tbody>
							<?php 
								
								$dataSet2=mysqli_query($connection,$query2); 
								while($col2=mysqli_fetch_assoc($dataSet2)):

							?>
						    <tr>
						      <th scope="row"><?php echo "".$col2['productName'].""; ?></th>
						      <td><a href="feature-products.php?<?php if($col2['featured']==1){echo'itemunft';}else{echo'itemft';}?>=<?= $col2['pID']?>" role="button" class="btn <?php if($col2['featured']==1){echo'btn-danger';}else{echo'btn-success';}?>"><i class="<?php if($col2['featured']==1){echo'fas fa-ban';}else{echo'fas fa-check';}?>"></i></a></td>
						      
						    </tr>
						<?php endwhile; ?>

						  </tbody>
					</table>

				</div>
				<div class="col-md-4">
					
					<table class="table  shadow table-hover table-striped">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">Flower</th>
						      <th scope="col"><i class="fas fa-pencil-alt"></i></th>
						    </tr>
						  </thead>

						  <tbody>
							<?php 
								
								$dataSet3=mysqli_query($connection,$query3); 
								while($col3=mysqli_fetch_assoc($dataSet3)):

							?>
						    <tr>
						      <th scope="row"><?php echo "".$col3['productName'].""; ?></th>
						      <td><a href="feature-products.php?<?php if($col3['featured']==1){echo'itemunft';}else{echo'itemft';}?>=<?= $col3['pID']?>" role="button" class="btn <?php if($col3['featured']==1){echo'btn-danger';}else{echo'btn-success';}?>"><i class="<?php if($col3['featured']==1){echo'fas fa-ban';}else{echo'fas fa-check';}?>"></i></a></td>
						      
						    </tr>
						<?php endwhile; ?>

						  </tbody>
					</table>

				</div>
	
				</div>
								
			</div>


		<!-- footer -->
		<?php include '../src/includes/footer.php'; ?>
</body>
</html>