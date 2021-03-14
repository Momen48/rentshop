<?php
session_start();
require_once ('../database/config.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}

?>
<?php //include ('inc/header.php'); ?>
<?php include ('inc/nav.php'); ?>
<div class="card">
  <div class="card-body">
  <h5 class="text-center text-dark">All the products provided by us!</h5>
  </div>
</div>
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Product Name</th>
						<th>Image</th>
						<th>Category Name</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM products";
					$res = mysqli_query($connection, $sql); 
					while ($row = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $row['id']; ?></th>
						<td><?php echo $row['name']; ?></td>
						<td><?php if($row['thumb']){ echo "Yes";}else{echo "No";} ?></td>
						<td><?php echo $row['catid']; ?></td>
						<td><a class="btn btn-info" href="editproduct.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                        <a class="btn btn-danger" href="deleteprod.php?id=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include ('inc/footer.php') ?>
