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
  <h5 class="text-center text-dark">All Bookings</h5>
  </div>
</div>

<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Customer Name</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Payment Mode</th>
						<th>Order Placed On</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT r.id, r.totalprice, r.orderstatus, r.paymentmode, r.`timestamp`, u.firstname, u.lastname 
					FROM `rents` r JOIN `userinfo` u WHERE r.uid=u.uid ORDER BY r.id DESC";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['firstname']. " " . $r['lastname']; ?></td>
						<td><?php echo $r['totalprice']; ?></td>
						<td><?php echo $r['orderstatus']; ?></td>
						<td><?php echo $r['paymentmode']; ?></td>
						<td><?php echo $r['timestamp']; ?></td>
						<td><a href="booking-process.php?id=<?php echo $r['id']; ?>">Process Order</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
