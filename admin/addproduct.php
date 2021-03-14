<?php
session_start();
require_once ('../database/config.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}

	if(isset($_POST) & !empty($_POST)){
		$prodname = mysqli_real_escape_string($connection, $_POST['productname']);
		$description = mysqli_real_escape_string($connection, $_POST['productdescription']);
		$category = mysqli_real_escape_string($connection, $_POST['productcategory']);
		$price = mysqli_real_escape_string($connection, $_POST['productprice']);
		$short_desc = mysqli_real_escape_string($connection, $_POST['short_desc']);


		if(isset($_FILES) & !empty($_FILES)){
			$name = $_FILES['productimage']['name'];
			$size = $_FILES['productimage']['size'];
			$type = $_FILES['productimage']['type'];
			$tmp_name = $_FILES['productimage']['tmp_name'];

			$max_size = 10000000;
			$extension = substr($name, strpos($name, '.') + 1); //first of last occurance

			if(isset($name) && !empty($name)){
				if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
					$location = "uploads/";
					if(move_uploaded_file($tmp_name, $location.$name)){
						//$smsg = "Uploaded Successfully";
						$sql = "INSERT INTO products (name, prod_desc, catid, price, short_desc, thumb) 
                        VALUES ('$prodname', '$description', '$category', '$price','$short_desc', '$location$name')";
						$res = mysqli_query($connection, $sql);
						if($res){
							//echo "Product Created";
							header('location: products.php');
						}else{
							$fmsg = "Failed to Create Product";
						}
					}else{
						$fmsg = "Failed to Upload File";
					}
				}else{
					$fmsg = "Only JPG files are allowed and should be less that 1MB";
				}
			}else{
				$fmsg = "Please Select a File";
			}
		}else{

			$sql = "INSERT INTO products (name, prod_desc, catid, price,short_desc) 
            VALUES ('$prodname', '$description', '$category', '$price', '$short_desc')";
			$res = mysqli_query($connection, $sql);
			if($res){
				header('location: products.php');
			}else{
				$fmsg =  "Failed to Create Product";
			}
		}
	}
?>
<?php //include('inc/header.php'); ?>
<?php include ('inc/nav.php'); ?>
<div class="card">
  <div class="card-body">
  <h5 class="text-center text-dark">ADD a New Product!</h5>
  </div>
</div>
<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<form method="post" enctype="multipart/form-data">
			<div class="form-group">
			  <label for="Productname">Product Name</label>
			  <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name">
			</div>

			
			<div class="form-group">
			  <label for="productprice">Rent Per day</label>
			  <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
			</div>

			<div class="form-group">
			<label for="productcategory">Product Category</label>
			<select class="form-control" id="productcategory" name="productcategory">
				<option value="">---SELECT CATEGORY---</option>
				<?php 	
					$sql = "SELECT * FROM category";
					$res = mysqli_query($connection, $sql); 
					while ($row = mysqli_fetch_assoc($res)) {
				?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
				<?php } ?>
				</select>
			</div>
			
			<div class="form-group">
			  <label for="productimage">Product Image</label>
			  <input type="file" name="productimage" id="productimage">
			  <p class="help-block text-danger">Only jpg/png are allowed.</p>
			</div>

			<div class="form-group">
			  <label for="productdescription">Product Description</label>
			  <textarea class="form-control" name="productdescription" rows="3"></textarea>
			</div>
			<div class="form-group">
			  <label for="short_desc">Short Description</label>
			  <textarea class="form-control" name="short_desc" rows="2"></textarea>
			</div>

			<button type="submit" class="btn btn-dark">Submit</button>
			</form>
			
		</div>
	</div>

</section>
<?php include ('inc/footer.php') ?>
