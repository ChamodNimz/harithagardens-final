<?php 
include '../core/init.php';

$query="select productName,price,description,image from product";
$dataSet = mysqli_query($connection,$query);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<?php include '../src/includes/links.php'; ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
</head>
<body>
	<?php include '../src/includes/navigation-public.php'; ?>
		<section class="gallery-block cards-gallery">
	    <div class="container">
	        <div class="heading">
	          <h2 class="pt-5">Flowers and Plants Gallery</h2>
	          <hr>
	        </div>
	        <div class="row">
	        <?php 
	        //dynamic gallery creation
	        while($row=mysqli_fetch_assoc($dataSet)):

	        ?>
	            <div class="col-md-4 col-lg-3">
	                <div class="card border-0 transform-on-hover">
	                	<a class="lightbox" href="..<?='/'.$row['image'];?>">
	                		<img src="..<?='/'.$row['image'];?>" alt="Card Image" class="card-img-top" width="300px" height="250px">
	                	</a>
	                    <div class="card-body">
	                        <h6><a href="#"><?=$row['productName']; ?></a></h6>
	                        <h5 class="text-left text-info"><?= $row['price']; ?></h5>
	                        <hr>
	                        <p class="text-muted card-text text-left"><?=$row['description'];?></p>
	                    </div>
	                </div>
	            </div>
			<?php endwhile; ?>
	       
	        </div>
	    </div>
    </section>
    
    <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>
    	<!--------------- footer --------------->
	<?php include '../src/includes/footer.php'; ?>
</body>
</html>