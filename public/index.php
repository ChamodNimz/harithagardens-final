<!DOCTYPE html>
<html>
<head>
	<title>Welcome To Haritha Gardens</title>
	<!------- bootstrap css -------------->
	<link rel="stylesheet" type="text/css" href="../src/assests/css/bootstrap.min.css">
	<!------- custom css --------------------->
	<link rel="stylesheet" type="text/css" href="../src/assests/css/main.css">
	<!------ jQuery cdn script src ----------->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!------- responsive meta tag ------------>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!------- bootstrap js ---------------->
	<script type="text/javascript" src="../src/assests/js/bootstrap.min.js"></script>
	<!--------- fontawsome cdn ------------------->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
	<!----- navigation include --->
	<?php include '../src/includes/navigation-public.php';
			require_once '../core/init.php';
	 ?>

	<!------ carousal for the home page ---------->
		<div id="carouselExampleIndicators" class="carousel slide slider" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="../src/images/carousal/garden1.jpg" alt="First slide">
		      <div class="carousel-caption d-none d-md-block">
			    <h1 class="display-2">Welcome!</h1>
			    <p class="lead">In haritha garden we have a variety of plants</p>
  			  </div>
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../src/images/carousal/image3.jpg" alt="Second slide">
		      <div class="carousel-caption d-none d-md-block">
			    <h1 class="display-2">Choose from many!</h1>
			    <p class="lead">We know your love for the beautiful garden, come see..</p>
  			  </div>
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../src/images/carousal/image5.jpg" alt="Third slide">
		      <div class="carousel-caption d-none d-md-block">
			    <h1 class="display-2">Near to your location</h1>
			    <p class="lead">look down the map too find us!</p>
  			  </div>
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../src/images/carousal/image6.jpg" alt="Third slide">
		      <div class="carousel-caption d-none d-md-block">
			    <h1 class="display-2">Check Out our gallery!</h1>
			    <p class="lead">See for your self </p>
  			  </div>
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	<!--------- map -------------->
		<div class="container-fluid">
			<div class="row p-3">
				<!----- accordian for the latest products ------>
				<div class="col-md-8">
					<div class="container info">
						<div class="accordion" id="accordionExample">
					<div class="card">
					  	<h1 class="text-success text-shadow p-4">Latest products</h1>
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					          Plants <i class="fas fa-chevron-circle-down"></i>
					        </button>
					      </h5>
					    </div>

					    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					      <div class="card-body">
					    	<div class="row p-1">
				<?php  
					
					$query="select  image from product where category='Plant' and featured=1";
					$dataSet=mysqli_query($connection,$query);
					while($row=mysqli_fetch_assoc($dataSet)):

				?>
					        	<div class="col-sm-3 p-2"><img src="..\<?=$row['image'];?>" width="180px" height="150px"></div>
					        	<?php endwhile; ?>
					        </div>
					    
					      </div>
					    </div>
					</div>
					<div class="card">
					    <div class="card-header" id="headingTwo">
					      <h5 class="mb-0">
					        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					          Flowers <i class="fas fa-chevron-circle-down"></i>
					        </button>
					      </h5>
					    </div>
					    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      <div class="card-body">
					        <div class="row p-1">
					    <?php 

					  	$query="select  image from product where category='Flower' and featured=1 ";
						$dataSet=mysqli_query($connection,$query);
						while($row=mysqli_fetch_assoc($dataSet)):

					     ?>
					        	<div class="col-sm-3 p-2"><img src="..\<?=$row['image'];?>" width="180px" height="150px"></div>
					    <?php endwhile; ?>   	
					        </div>
					      </div>
					    </div>
					</div>
					<div class="card">
					    <div class="card-header" id="headingThree">
					      <h5 class="mb-0">
					        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					          Flower pots <i class="fas fa-chevron-circle-down"></i>
					        </button>
					      </h5>
					    </div>
					    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					      <div class="card-body">
					        <div class="row p-1">

					    <?php 

						  	$query="select  image from product where category='Flower pot' and featured=1 ";
							$dataSet=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($dataSet)):

					     ?>
					        	<div class="col-sm-3 p-2"><img src="..\<?=$row['image'];?>" width="180px" height="150px"></div>
					    <?php endwhile; ?>
					        </div>
					      </div>
					    </div>
					</div>
				</div>
					</div>
				</div>
			<div class="col-md-4 pt-5 pr-3">
				<div class="map ">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.2441677328417!2d79.95529897463824!3d6.84010971564398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25048fd71a16d%3A0x32e73c44b799e282!2sSuhada+Mawatha%2C+Pannipitiya+10230!5e0!3m2!1sen!2slk!4v1531761049471" width="400" height="345" frameborder="0" style="border:0"></iframe>
				</div>
			</div>
			</div>		
		</div>
		<!----- end of map section --->
		<!------- parralx effect -------->
		<div class="parallax img-fluid">
			<div class="container-fluid">
	<div class="row p-5 mt-3">
					<div class="col-md-4"></div>
					  <div class="col-md-4 col-sm-12">
					    <div class="card p-5">
					      <div class="card-body">
					        <h5 class="card-title display-4 visit">Visit Our Gallery</h5>
					        <hr>
					        <p class="card-text">We have a gallery with price ranges of plants and flowers..</p>
					        <p class="card-text">check them out now!</p>
					        <a href="../public/gallery.php" class="btn btn-success btn-outline-success p-4">Visit</a>
					      </div>
					    </div>
					  </div>
					  <!----- accordian for latest products and  top produtcs---->
			<div class="col-md-4"></div>
	</div>
			</div>	
		</div>


<div class="container">
        	<h1 class=" display-4 p-5 text-success text-shadow">Why do you buy from us?</h1>
 
        <!-- Three columns of text below the carousel -->
        <div class="row p-5 text-center marketing">
          <div class="col-lg-4">
            <img class="rounded-circle" src="../src/images/pngs/map.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Location</h2>
            <hr>
            <p>We are located conviniece location to you. You can visit us by following the map provided above.
            We are at Suhada Mawatha, Mahalwarawa, Pannipitya. You will see our banner. Don't worry we've got your covered.</p>
            <p><a class="btn btn-success" href="#" role="button">Map &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="../src/images/pngs/doller.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Cheaper</h2>
            <hr>
            <p>We know how hard it can be to buy your loved flowers and how high price they can be. The specialty in Haritha Gardens is that we provide the best products for a cheaper price !</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="../src/images/pngs/plant.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Quality Products</h2>
            <hr>
            <p>We have a wide range of quality products you can choose from</p>
            <p><a class="btn btn-success" href="../public/gallery.php" role="button">View Gallery &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
	</div>

	<!--------------- footer --------------->
	<?php include '../src/includes/footer.php'; ?>
</body>
</html>