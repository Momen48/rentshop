<?php 
session_start();
require_once ('../database/config.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}

?>

<?php include('inc/nav.php');?>

<div class="card">
  <div class="card-body">
  <h5 class="text-center text-dark">All the Categories!</h5>
  </div>
</div>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM category";
					$res = mysqli_query($connection, $sql); 
					while ($row = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $row['id']; ?></th>
						<td><?php echo $row['name']; ?></td>
						<td><a class="btn btn-info" href="editcategory.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a class="btn btn-danger" href="delcategory.php?id=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>








<?php include('inc/footer.php');?>