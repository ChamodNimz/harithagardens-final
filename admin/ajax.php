<?php 


// ajax code for  removal selection menu data provide
include '../core/init.php';


	 if(isset($_GET['getRemove'])){

		$name=$_POST['name'];
		//echo"$name";

		$statement=mysqli_stmt_init($connection);
		$query="select productName,pID,image,price from product where category=?";	

		if(mysqli_stmt_prepare($statement,$query)){

			mysqli_stmt_bind_param($statement,"s",$name);
			if(mysqli_stmt_execute($statement)){
				
				$result=mysqli_stmt_get_result($statement);
				mysqli_stmt_close($statement);
				mysqli_close($connection);
			}
			else{

				//echo"<div class='alert alert-danger'>Error retreiving data</div>";
			}
		}
	}
		

 ?>
 <?php ob_start(); ?>
<div class="container-fluid">
	<div class="row">
		 			<div class="col-md-6 border-left border-info">
 				<table class="table table-hover float-left rounded">
					  <thead>
					    <tr>

					      <th scope="col">Product Name</th>
					      <th scope="col">Action</th>
		
					    </tr>
					  </thead>
					  <tbody>
					<?php while($row=mysqli_fetch_assoc($result)): ?>
						<?php $img=$row['image']; ?>
						<?php $proName=$row['productName'];?>
						<?php $price=$row['price']; ?>
					    <tr id="<?=$row['pID']?>" class="dataRowToggle" onclick="toggleRow(<?php echo''.$row["pID"].',';echo'\''.addslashes($img).'\'';echo',\''.$proName.'\'';echo',\''.$price.'\'';?>)" >
					    <td scope="row" ><?=$row["productName"]; ?></td>
					    <td><a href="remove-product.php?delete=<?=$row['pID']?>" class="btn btn-danger">Remove <span class="far fa-trash-alt"></span></a></td>

					    </tr>
					<?php endwhile; ?>
					  </tbody>
				</table>
 			</div>
 				

			<div class="col-md-3">
				<h3 class="text-success text-center p-3 text-shadow" style="position: relative;left: 4px !important;top: -70px;"><b>Details</b></h3>

				<div class="card shadow" style="width: 18rem;position: relative;top: -80px;">
					<img src="" class="img-fluid card-img-top" id="image">
				  <div class="card-body pt-5">
				    <h5 class="card-title text-success" id="p-name"></h5>
				    <h6 class="card-subtitle mb-2 text-muted" id="p-price"></h6>
				  </div>
				</div>
				

			</div>
	</div>
</div>

				<script type="text/javascript">
					// toggle the table row when selected
					function toggleRow(id,imageLocation,productName,price){
						
						if(!$("#"+id).hasClass("table-secondary")){

							//$("#"+id).addClass("table-secondary");
							$("#image").attr("src","../"+imageLocation);
							$("#p-name").html("Name : "+productName);
							$("#p-price").html("Price : "+price);
						}
						else{

							//$("#"+id).removeClass("table-secondary");
						}
							
					
					}


				</script>

<?php echo ob_get_clean(); ?>