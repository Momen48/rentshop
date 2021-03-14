<?php
session_start();
require_once ('../database/config.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}
?>

<?php include ('inc/nav.php'); ?>

<div class="card">
  <div class="card-body">
  <h5 class="text-center text-dark">ALL Reviews & Messages!</h5>
  </div>
</div>

<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Time</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM `contact` ORDER BY id DESC";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['email']; ?></td>
						<td><?php echo $r['subject']; ?></td>
						<td><?php echo $r['message']; ?></td>
						<td><?php echo $r['timestamp']; ?></td>
						
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include ('inc/footer.php') ?>