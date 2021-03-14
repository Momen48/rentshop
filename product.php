<?php 
require_once('database/config.php');
?>
<?php include('include/header.php');
  
  if(isset($_GET['id']) & !empty($_GET['id'])){
    $id = $_GET['id'];
    $prodsql = "SELECT * FROM products WHERE id=$id";
    $prodres = mysqli_query($connection, $prodsql);
    $prodr = mysqli_fetch_assoc($prodres);
  }else{
    header('location: index.php');
  }
  
?>

	
<div class="card">
  <div class="card-body">
  <h5 class="text-center text-dark">All Information About <h4 class="text-center" style="text-transform: uppercase;"> 
  <?php echo $prodr['name']; ?> </h4> </h5>

  </div>
</div>
<section class="single-product">
<div class="container">
<div class="row">
<div class="col-md-5">

<?php 

?>
    <div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="admin/<?php echo $prodr['thumb']; ?>" class="d-block">
    </div>
    <div class="carousel-item">
      <img src="admin/<?php echo $prodr['thumb']; ?>" class="d-block">
    </div>
      <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  
</div>
</div>   
    
 <div class="col-md-7">
     <p class="new-arrival text-center">NEW</p>
    

     
     <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star-half-o"></i>
        
     <p class="price">BDT <?php echo $prodr['price']; ?></p>
     <p><b>Availability:</b> In Stock</p>
     <p><b>Condition:</b> Clean</p>
     <br />

<form method="get" action="addtocart.php"> 

<div class="row">
					<h4>Choose Color :</h4>
          <br />
						<div class="col-md-3">
							<input name="payment" id="radio1" class="css-checkbox" type="radio" value="red"><span>RED</span>
							<div class="space20"></div>
            </div>
						<div class="col-md-3">
							<input name="payment" id="radio2" class="css-checkbox" type="radio"><span value="black">BLACK</span>
							<div class="space20"></div>	
            </div>
            <div class="col-md-3">
							<input name="payment" id="radio1" class="css-checkbox" type="radio" value="green"><span>GREEN</span>
							<div class="space20"></div>
            </div>
						<div class="col-md-3">
							<input name="payment" id="radio2" class="css-checkbox" type="radio"><span value="pink">PINK</span>
							<div class="space20"></div>	
            </div>
										
</div>


     <span>Rent for :</span> 
		<input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
		<input type="text" name="quant" placeholder="1"> <span>Week</span>
    <hr>
    <br />


<p># Rent for Two weeks and get 10% discount.</p>
<p class='text-info'># Rent for Three weeks and get 20% discount.</p>
<p class='text-danger'># Rent for Four or more weeks and get 30% discount.</p>

		<input style="width: 130px; height: 60px;" type="submit" class="btn btn-dark" value="Add to Cart">
</from>
    
</div>    
</div>    
</div>    
</section>
    
<!------------product-description-------------->
    
<section class="product-description">
<div class="container">
<h6>Product Description</h6>
<p><?php echo $prodr['prod_desc']; ?></p>
<hr>    
</div> 
    
<div class="container">
    <div class="title-box">
    <h2>Similar</h2>
    </div>
    <div class="row">
  <?php rand_prod();?>
    
    </div>
</div>
    
</section>

<!----------------Website features----------------->
<?php include('include/web_feature.php');?>
  
<!------------Footer----------->
<?php include('include/footer.php');?>