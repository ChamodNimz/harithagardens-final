<?php

	require_once '../core/init.php';
	require_once '../src/helpers/errors.php';
	require_once '../src/helpers/secure.php';
	if(!isLoggedIn()){

			header("Location:../public/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Remove product</title>
	<?php include '../src/includes/links.php'; ?>
</head>
<body>

	<!-- admin navigation  -->
	<?php include '../src/includes/navigation-admin.php'; ?>


	<!-- content -->
	<div class="containr-fluid p-5 p-bottom" style="padding-bottom: 300px !important;">
<?php
	if(isset($_GET['delete'])){

		$id=(int)$_GET['delete'];
		// delete the selected item
		$query="delete from product where pID='$id' ";
		
		mysqli_query($connection,$query);
		if(1==mysqli_affected_rows($connection)){

			echo"<div class='alert alert-success'>Item removed Successfully !</div>";
		}
		else{

			echo"<div class='alert alert-danger'>Error removing the selected item!</div>";
		}
	}
?>
		<h1 class="text-success p-3 mb-5 text-shadow"> Remove product</h1>

			<div class="row">
				<div class="col-md-3  border-info">
					<ul style="list-style-type: none;"  >
						<li><button class="btn btn-success btnProducts btn-lg shadow-lg "  value="Plant" id="btnPlant">Plants</button></li>
						<br>
						<li><button class="btn btn-success btnProducts btn-lg shadow-lg "  value="flower Pot">Pots</button></li>
						<br>
						<li><button class="btn btn-success btnProducts btn-lg shadow-lg "  value="Flower">Flowers</button></li>
					</ul>
				</div>
				<div class="col-md-9" id="table"></div>
			</div>
			

	</div>
		
		
	<!-- footer -->
	<?php include '../src/includes/footer.php'; ?>

<script type="text/javascript">

	//function to make the selection when the page load
	$("document").ready(function() {	
	    setTimeout(function() {
	        $("#btnPlant").trigger('click');
	    },10);
	});
		


	//ajax for  loading the removing tables
	$(document).ready(function(){

		$(".btn-lg").click(function(){

			var name=$(this).val();
			var obj={"name":name};

			$.ajax({

				url:"ajax.php?getRemove=1",
				method:"post",
				data: obj,
				success:function(data){

					$("#table").children().remove();
					$('#table').append(data).hide().fadeIn();
				},
				error:function(){}

			});
		});
	});

</script>
</body>
</html>